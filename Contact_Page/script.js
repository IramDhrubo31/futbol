function openPopup() {
    document.getElementById('contact-popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('contact-popup').style.display = 'none';
}

function calculate() {
    event.preventDefault();

    var userName = document.getElementById("userName").value;
    var userID = document.getElementById("userId").value;
    var Email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    if (userName === "" || userID === "" || Email === "" || message === "") {
        document.getElementById("content").innerHTML = "<h4>Your registration is error. Please fill in all the required fields.</h4>";

    }

    else {
        document.getElementById("content").innerHTML = `<h4>Thank you for reaching out! Your message has been received, and we'll get back to you shortly.</h4>`;
    }

}



