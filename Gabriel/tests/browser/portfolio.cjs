// Optional QA dependencies: playwright and @axe-core/playwright (see audit report).
const { chromium } = require('playwright');
const { AxeBuilder } = require('@axe-core/playwright');
const fs = require('node:fs');
const assert = require('node:assert/strict');
const base = process.env.QA_BASE_URL || 'http://127.0.0.1:8011';
(async () => {
    const browser = await chromium.launch({headless: true});
    const results = [];
    fs.mkdirSync('docs/qa', {recursive: true});
    try {
        for (const width of [320, 375, 430, 768, 1366, 1920]) {
            const page = await browser.newPage({viewport: {width, height: 900}});
            const errors = [];
            page.on('pageerror', error => errors.push(error.message));
            page.on('console', message => { if (message.type() === 'error') errors.push(message.text()); });
            for (const locale of ['pt', 'en']) {
                for (const path of ['', '/skills', '/experiences', '/about', '/contacts', '/resume']) {
                    const response = await page.goto(`${base}/${locale}${path}`, {waitUntil: 'networkidle'});
                    assert.equal(response.status(), 200);
                    const layout = await page.evaluate(() => ({width: innerWidth, scrollWidth: document.documentElement.scrollWidth}));
                    const axe = await new AxeBuilder({page}).withTags(['wcag2a', 'wcag2aa', 'wcag21a', 'wcag21aa', 'wcag22aa']).analyze();
                    results.push({width, locale, path: path || '/', ...layout, violations: axe.violations.map(v => ({id:v.id, impact:v.impact, nodes:v.nodes.map(n => n.target)}))});
                    if (path === '' && locale === 'pt') await page.screenshot({path: `docs/qa/home-pt-${width}.png`, fullPage: true});
                    if (path === '' && width < 992) {
                        await page.locator('.navbar-toggler').click();
                        await page.waitForTimeout(400);
                        assert.equal(await page.locator('.navbar-toggler').getAttribute('aria-expanded'), 'true');
                        assert(await page.locator('#navbarContent').isVisible());
                    }
                }
            }
            results.push({width, consoleErrors: errors});
            await page.close();
        }
        const page = await browser.newPage();
        await page.goto(`${base}/en/contacts`);
        await page.getByLabel('Name:', {exact:true}).fill('QA & Test');
        await page.getByLabel('Message:', {exact:true}).fill('Hello + accents: ação & question?');
        await page.evaluate(() => {window.open = url => {window.qaWhatsApp = url;};});
        await page.getByRole('button', {name: 'Send Message via WhatsApp'}).click();
        const whatsapp = new URL(await page.evaluate(() => window.qaWhatsApp));
        assert.equal(whatsapp.searchParams.get('text'), 'My name is QA & Test, Hello + accents: ação & question?');
        await page.getByRole('link', {name:'Português', exact:true}).click();
        assert.equal(new URL(page.url()).pathname, '/pt/contacts');
        await page.keyboard.press('Tab');
        results.push({interaction: 'WhatsApp encoding, mobile menus, locale switch', passed: true});
    } finally {
        fs.writeFileSync('docs/qa/browser-results.json', JSON.stringify(results, null, 2));
        await browser.close();
    }
    const failures = results.filter(r => r.scrollWidth > r.width || r.violations?.length || r.consoleErrors?.length);
    console.log(JSON.stringify({pages: results.filter(r => r.path).length, failures}, null, 2));
    if (failures.length) process.exitCode = 1;
})().catch(error => { console.error(error); process.exitCode = 1; });
