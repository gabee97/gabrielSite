function sendWhatsAppMessage(trigger) {
    const message = document.getElementById('message').value.trim();
    const name = document.getElementById('name').value.trim();
    const prefix = trigger && trigger.dataset.messagePrefix ? trigger.dataset.messagePrefix : 'Me chamo';

    const completeMessage = `${prefix} ${name}, ${message}`;
    const url = 'https://api.whatsapp.com/send?phone=5541987694868&text=' + encodeURIComponent(completeMessage);

    window.open(url, '_blank', 'noopener,noreferrer');
}
