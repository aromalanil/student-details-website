let emailInput = document.getElementById('email-input');
let passwordInput = document.getElementById('password-input');
let loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(validateForm()){
        e.target.submit();
    }
});

let validateForm = () => {
   let isEmailValid= validateEmail();
   let isPasswordValid =validatePassword();
   return isEmailValid && isPasswordValid;
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
    if(password.length<6){
        showErrorMessage(passwordErrorMessage, "Password must contain 6 characters");
        return false;
    }
    hideErrorMessage(passwordErrorMessage);
    return true;
};


let showErrorMessage = (element, message) => {
    element.innerText = message;
    element.style.display = "block";
}

let hideErrorMessage = (element) => {
    element.style.display = "none";
}