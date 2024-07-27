function sendWhatsAppMessage(){
    let message = document.getElementById('message').value;
    let name = document.getElementById('name').value;

    let completeMessage = `Me chamo ${name}, ${message}`;

    let url = 'https://api.whatsapp.com/send?phone=5541987694868&text='+completeMessage;

    window.open(url)
}

