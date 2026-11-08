function sendWhatsAppMessage(trigger) {
    const form = trigger.closest('form');
    const name = form.elements.name;
    const message = form.elements.message;
    if (!name.reportValidity() || !message.reportValidity()) return;
    const text = `${trigger.dataset.messagePrefix} ${name.value.trim()}, ${message.value.trim()}`;
    window.open('https://wa.me/5541987694868?text=' + encodeURIComponent(text), '_blank', 'noopener,noreferrer');
}
document.querySelectorAll('.form-contact').forEach(form => {
    form.addEventListener('submit', () => {
        form.querySelector('[type="submit"]').disabled = true;
        form.querySelector('.form-status').textContent = form.dataset.loading;
        form.setAttribute('aria-busy', 'true');
    });
});
window.addEventListener('pageshow', () => document.querySelectorAll('.form-contact').forEach(form => {
    form.querySelector('[type="submit"]').disabled = false;
    form.removeAttribute('aria-busy');
    form.querySelector('.form-status').textContent = '';
}));
