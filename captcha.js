var captchaText = generateCaptcha();
var captchaInput = document.getElementById('captchaInput');
function generateCaptcha() {
    var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_-';
    var captcha = '';
    for (var i = 0; i < 6; i++) {
        captcha += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return captcha;
}
function refreshCaptcha() {
    captchaText = generateCaptcha();
    document.getElementById('captchaImage').innerText = captchaText;
    captchaInput.value = '';
}
function verifyCaptcha() {
    var inputText = captchaInput.value;
    if (inputText === captchaText) {
        window.location.href = 'create_account.html'; 
    } else {
        alert('CAPTCHA Verification Failed! Please try again.');
    }
}
