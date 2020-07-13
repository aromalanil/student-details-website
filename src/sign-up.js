let isPasswordError = false;
let isEmailError = false;
let isRePasswordError = false;
let signUpForm = document.getElementById('sign-up-form');
let emailInput = document.getElementById('email-input');
let passwordInput = document.getElementById('password-input');
let rePasswordInput = document.getElementById('re-password-input');

signUpForm.addEventListener('submit', (e) => {
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

rePasswordInput.addEventListener('input', () => {
    if (isRePasswordError) {
        validateRePassword();
    }
});


let validateForm = () => {
    let isEmailValid = validateEmail();
    let isPasswordValid = validatePassword();
    let isRePasswordValid = validateRePassword();
    return (isEmailValid && isPasswordValid && isRePasswordValid);
};

let validateEmail = () => {
    let emailErrorMessage = document.getElementById('email-error');
    let email = emailInput.value;
    if (email === '') {
        isEmailError = true;
        disableSignUpButton();
        showErrorMessage(emailErrorMessage, "Email cannot be empty");
        return false;
    }
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        isEmailError = true;
        disableSignUpButton();
        showErrorMessage(emailErrorMessage, "Enter a valid email");
        return false;
    }
    hideErrorMessage(emailErrorMessage);
    isEmailError = false;
    if (!isPasswordError && !isRePasswordError) {
        enableSignUpButton();
    }
    return true;
};

let validatePassword = () => {
    let passwordErrorMessage = document.getElementById('password-error');
    let password = passwordInput.value;
    if (password === '') {
        isPasswordError = true;
        disableSignUpButton();
        showErrorMessage(passwordErrorMessage, "Password cannot be empty");
        return false;
    }
    if (password.length < 6) {
        isPasswordError = true;
        disableSignUpButton();
        showErrorMessage(passwordErrorMessage, "Password must contain 6 characters");
        return false;
    }
    hideErrorMessage(passwordErrorMessage);
    isPasswordError = false;
    if (!isEmailError && !isRePasswordError) {
        enableSignUpButton();
    }
    return true;
};

let validateRePassword = () => {
    let rePasswordErrorMessage = document.getElementById('re-password-error');
    let password = passwordInput.value;
    let rePassword = rePasswordInput.value;
    if (!isPasswordError) {
        if (password !== rePassword) {
            disableSignUpButton();
            showErrorMessage(rePasswordErrorMessage, "Password mismatch");
            return false;
        }
        hideErrorMessage(rePasswordErrorMessage);
        isRePasswordError = false;
        if (!isPasswordError && !isRePasswordError) {
            enableSignUpButton();
        }
        return true;
    }
};


let disableSignUpButton = () => {
    let signUpButton = document.getElementById("sign-up-btn");
    signUpButton.disabled = true;
}
let enableSignUpButton = () => {
    let signUpButton = document.getElementById("sign-up-btn");
    signUpButton.disabled = false;
}

let showErrorMessage = (element, message) => {
    element.innerText = message;
    element.style.display = "block";
}

let hideErrorMessage = (element) => {
    element.style.display = "none";
}