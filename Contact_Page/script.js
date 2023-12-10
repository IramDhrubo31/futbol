function openPopup() {
    document.getElementById('contact-popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('contact-popup').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('contact-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 
        var confirmationMessage = document.getElementById('confirmation-message');
        confirmationMessage.innerText = 'Your Form is Submitted';
        confirmationMessage.style.display = 'block';

        
        closePopup();
    });
});


