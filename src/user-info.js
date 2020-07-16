let markInputs = document.querySelectorAll('.mark-input');
let form = document.getElementById('user-info-form');
let errorMessages = document.querySelectorAll('.error-msg');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    errorMessages.forEach(msg=>{
        hideErrorMessage(msg);
    })
    if (validateForm()) {
        e.target.submit();
    }
});

let validateForm = () => {
    let isFormValid = true;
    markInputs.forEach(input => {
        let mark = input.value;
        let markInNumber = parseInt(mark);
        let regex = /[0-9]|\./;
        let errorMsg = input.nextElementSibling;
        if (mark === '') {
            isFormValid = false;
            showErrorMessage(errorMsg, "Mark cannot be empty");
        }
        else if (!regex.test(mark)) {
            isFormValid = false;
            showErrorMessage(errorMsg, "Only Numbers are allowed");
        }
        else if (markInNumber < 0 || markInNumber >100){
            isFormValid = false;
            showErrorMessage(errorMsg, "Enter a valid number");
        }
    });
    return isFormValid;
}

let showErrorMessage = (element, message) => {
    element.innerText = message;
    element.style.display = "block";
}

let hideErrorMessage = (element) => {
    element.style.display = "none";
}