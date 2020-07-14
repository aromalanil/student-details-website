let emailInput = document.getElementById('email-input');
let passwordInput = document.getElementById('password-input');
let rePasswordInput = document.getElementById('re-password-input');
let signUpForm = document.getElementById('sign-up-form');

signUpForm.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validateForm()) {
        e.target.submit();
    }
});

let validateForm = () => {
    let isEmailValid = validateEmail();
    let isPasswordValid = validatePassword();
    let isRePasswordValid = validateRePassword();
    return isEmailValid && isPasswordValid && isRePasswordValid;
};

let validateEmail = () => {
    let emailErrorMessage = document.getElementById('email-error');
    let email = emailInput.value;
    if (email === '') {
        showErrorMessage(emailErrorMessage, "Email cannot be empty");
        return false;
    }
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        showErrorMessage(emailErrorMessage, "Enter a valid email");
        return false;
    }
    hideErrorMessage(emailErrorMessage);
    return true;
};

let validatePassword = () => {
    let passwordErrorMessage = document.getElementById('password-error');
    let password = passwordInput.value;
    if (password === '') {
        showErrorMessage(passwordErrorMessage, "Password cannot be empty");
        return false;
    }
    if (password.length < 6) {
        showErrorMessage(passwordErrorMessage, "Password must contain 6 characters");
        return false;
    }
    hideErrorMessage(passwordErrorMessage);
    return true;
};

let validateRePassword = () => {
    let rePasswordErrorMessage = document.getElementById('re-password-error');
    let password = passwordInput.value;
    let rePassword = rePasswordInput.value;
    if (rePassword === '') {
        showErrorMessage(rePasswordErrorMessage, "This field cannot be empty");
        return false;
    }
    if (validatePassword()) {
        if (password !== rePassword) {
            showErrorMessage(rePasswordErrorMessage, "Password Mismatch");
            return false;
        }
    }
    hideErrorMessage(rePasswordErrorMessage);
    return true;
}


let showErrorMessage = (element, message) => {
    element.innerText = message;
    element.style.display = "block";
}

let hideErrorMessage = (element) => {
    element.style.display = "none";
}