const fs = require('node:fs');
const vm = require('node:vm');
const assert = require('node:assert/strict');
let opened;
const context = {
    window: {open: (...args) => {opened = args;}, addEventListener: () => {}},
    document: {querySelectorAll: () => []},
};
vm.createContext(context);
vm.runInContext(fs.readFileSync('public/js/app.js', 'utf8'), context);
const form = {elements: {
    name: {value: ' QA & ação ', reportValidity: () => true},
    message: {value: ' Olá + teste? & 100% ', reportValidity: () => true},
}};
context.sendWhatsAppMessage({closest: () => form, dataset: {messagePrefix: 'Me chamo'}});
assert.equal(new URL(opened[0]).searchParams.get('text'), 'Me chamo QA & ação, Olá + teste? & 100%');
assert.equal(new URL(opened[0]).pathname, '/5541987694868');
assert.equal(opened[2], 'noopener,noreferrer');
opened = null;
form.elements.name.reportValidity = () => false;
context.sendWhatsAppMessage({closest: () => form, dataset: {messagePrefix: 'Me chamo'}});
assert.equal(opened, null);
console.log('WhatsApp: encoding, target, window isolation and required fields passed (4 assertions).');
