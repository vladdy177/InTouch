let form = document.querySelector(".js-form"),
    formInputs = document.querySelectorAll(".js-input"),
    inputName = document.querySelector(".js-input-name"),
    inputEmail = document.querySelector(".js-input-email"),
    inputPassword = document.querySelector(".js-input-password"),
    inputCheckbox = document.querySelector(".js-input-checkbox");

form.onsubmit = function(){
    let emailVal = inputEmail.value,
        nameVal = inputName.value,
        checkboxVal = inputCheckbox.value,
        passwordVal = inputPassword.value,
        emptyInputs = Array.from(formInputs).filter(input => input.value === "");

        formInputs.forEach(function(input){
            if(input.value === ""){
                input.classList.add("error");
            } else {
                input.classList.remove("error");
            }
        });

    if (emptyInputs.length !== 0){
        alert('Červená pole musí být vyplněna!');
        return false;
    }

    if (!inputCheckbox.checked){
        inputCheckbox.classList.add("error");
        alert("Souhlasíte se zpracováním osobních údajů")
        return false;
    }else{
        inputCheckbox.classList.remove("error");
    }
    
}

// function answer(e){
//     let passwords = e.target.responseText.split("\n")
//     if (passwords.includes(input.value)) {
//         alert("Slabé heslo")
//     } else {
//         alert("Heslo je fajn")
//     }
// }

// function control(){
//     let xhr = new XMLHttpRequest()
//     xhr.open("GET", "https://wa.toad.cz/passwords.txt", true)
//     xhr.send()
//     xhr.addEventListener("load", answer)
// }

// let input = document.querySelector("name=heslo")
// input.addEventListener("blur", control)
