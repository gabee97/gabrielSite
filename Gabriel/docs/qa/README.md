# Evidências de QA

- `phpunit.xml`: resultado real PHPUnit, 11 testes / 162 asserções, sem falhas.
- `tests/browser/whatsapp.cjs`: teste isolado de JavaScript, sem navegador e sem envio real.
- `tests/browser/portfolio.cjs`: roteiro Playwright + axe para 72 combinações (seis larguras, seis páginas e dois idiomas), menus, idiomas e codificação WhatsApp. **Não executado com sucesso neste ambiente.**

## Limitação visual observada

O Chromium foi baixado em `/tmp/gbr-browsers`. Tentativas dentro e fora do sandbox falharam antes da abertura de qualquer página:

```text
error while loading shared libraries: libnspr4.so: cannot open shared object file: No such file or directory
```

A tentativa autorizada `playwright install-deps chromium` também falhou:

```text
sudo: a terminal is required to read the password
sudo: a password is required
```

Não existem screenshots antes/depois, resultados axe ou medidas Lighthouse/Core Web Vitals gerados por esta execução. A existência do roteiro não comprova aprovação visual nem conformidade WCAG.

## Executar em uma máquina com suporte a Chromium

Na raiz `Gabriel/`, com Node disponível:

```bash
npm install --prefix /tmp/gbr-qa playwright @axe-core/playwright
PLAYWRIGHT_BROWSERS_PATH=/tmp/gbr-browsers /tmp/gbr-qa/node_modules/.bin/playwright install --with-deps chromium
php artisan serve --host=127.0.0.1 --port=8011
```

Em outro terminal, na mesma pasta:

```bash
NODE_PATH=/tmp/gbr-qa/node_modules PLAYWRIGHT_BROWSERS_PATH=/tmp/gbr-browsers node tests/browser/portfolio.cjs
```

A instalação de bibliotecas do sistema pode solicitar senha. Não é necessária em produção. O roteiro cria `docs/qa/browser-results.json` e seis screenshots da home em português. Falhas de console, overflow e violações axe fazem o processo terminar com erro. Ele usa a aplicação real, mas não submete mensagens. Depende de acesso aos CDNs existentes. As capturas serão posteriores às alterações; não há baseline visual anterior.

Faça também a revisão humana: Tab/Shift+Tab, foco visível, menu com Enter/Espaço/Escape quando aplicável, formulários com leitor de tela, zoom de 200%/400%, currículo na prévia de impressão e aparelho móvel real. Use DevTools/Lighthouse para medições locais, registrando versão, perfil de rede e hardware; INP real requer interações e dados de campo apropriados.
