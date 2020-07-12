let isPasswordError = false;
let isEmailError = false;
let loginForm = document.getElementById('login-form');
let emailInput = document.getElementById('email-input');
let passwordInput = document.getElementById('password-input');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validateForm()) {
        e.target.submit();
    }
});

emailInput.addEventListener('input', () => {
    if (isEmailError) {
        validateEmail();
    }
});

passwordInput.addEventListener('input', () => {
    if (isPasswordError) {
        validatePassword();
    }
});


let validateForm = () => {
    let isEmailValid = validateEmail();
    let isPasswordValid = validatePassword();
    return (isEmailValid && isPasswordValid);
};

let validateEmail = () => {
    let emailErrorMessage = document.getElementById('email-error');
    let email = emailInput.value;
    if (email === '') {
        isEmailError = true;
        disableLoginButton();
        showErrorMessage(emailErrorMessage, "Email cannot be empty");
        return false;
    }
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        isEmailError = true;
        disableLoginButton();
        showErrorMessage(emailErrorMessage, "Enter a valid email");
        return false;
    }
    hideErrorMessage(emailErrorMessage);
    isEmailError = false;
    if (!isPasswordError) {
        enableLoginButton();
    }
    return true;
};

let validatePassword = () => {
    let passwordErrorMessage = document.getElementById('password-error');
    let password = passwordInput.value;
    if (password === '') {
        isPasswordError = true;
        disableLoginButton();
        showErrorMessage(passwordErrorMessage, "Password cannot be empty");
        return false;
    }
    if(password.length<6){
        isPasswordError = true;
        disableLoginButton();
        showErrorMessage(passwordErrorMessage, "Password must contain 6 characters");
        return false;
    }
    hideErrorMessage(passwordErrorMessage);
    isPasswordError = false;
    if (!isEmailError) {
        enableLoginButton();
    }
    return true;
};


let disableLoginButton = () => {
    let loginButton = document.getElementById("login-btn");
    loginButton.disabled = true;
}
let enableLoginButton = () => {
    let loginButton = document.getElementById("login-btn");
    loginButton.disabled = false;
}

let showErrorMessage = (element, message) => {
    element.innerText = message;
    element.style.display = "block";
}

let hideErrorMessage = (element) => {
    element.style.display = "none";
}