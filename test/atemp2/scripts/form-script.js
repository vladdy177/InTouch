let form = document.querySelector(".js-form"),
    formInputs = document.querySelectorAll(".js-input"),
    inputName = document.querySelector(".js-input-name"),
    inputEmail = document.querySelector(".js-input-email"),
    inputPassword = document.querySelector(".js-input-password"),
    inputPasswordConf = document.querySelector(".js-input-password-conf"),
    inputCheckbox = document.querySelector(".js-input-checkbox");

    
function controlPassword(event){
    let passwords = event.target.responseText.split("\n")
    if (passwords.includes(inputPassword.value)){
        alert("Heslo je příliš slabé");
    }
}
function gettingPasswords(){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://wa.toad.cz/passwords.txt", true);
    xhr.send ();
    xhr.addEventListener("load", controlPassword);
}	

form.onsubmit = function(){
    let emptyInputs = Array.from(formInputs).filter(input => input.value === "");

        formInputs.forEach(function(input){
            if(input.value === ""){
                input.classList.add("error");
            } else {
                input.classList.remove("error");
            }
        });

        if (emptyInputs.length !== 0){
            alert('Prázdná pole musí být vyplněna!');
            return false;
        }

        if (inputPassword.value !== inputPasswordConf.value){
            alert("Hesla se neshodují");
            return false;
        }else{
            function controlPassword(event){
                let passwords = event.target.responseText.split("\n")
                if (passwords.includes(inputPassword.value)){
                    alert("Heslo je příliš slabé");
                    return false;
                }
            }
            function gettingPasswords(){
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "https://wa.toad.cz/passwords.txt", true);
                xhr.send ();
                xhr.addEventListener("load", controlPassword);
            }
        
            inputPassword.addEventListener("blur", gettingPasswords)
        }

        if (!inputCheckbox.checked){
            inputCheckbox.classList.add("error");
            alert("Souhlasíte se zpracováním osobních údajů");
            return false;
        }else{
            inputCheckbox.classList.remove("error");
        }
        
    }




