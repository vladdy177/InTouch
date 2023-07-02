//getting inputs from form using document.querySelector and creating variables
let form = document.querySelector(".js-form"),
    formInputs = document.querySelectorAll(".js-input"),
    inputName = document.querySelector(".js-input-name"),
    inputEmail = document.querySelector(".js-input-email"),
    inputPassword = document.querySelector(".js-input-password"),
    inputPasswordConf = document.querySelector(".js-input-password-conf"),
    inputCheckbox = document.querySelector(".js-input-checkbox");


//getting XML request to scan and find weak passwords
function gettingPasswords(){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://wa.toad.cz/passwords.txt", true);
    xhr.send ();
    xhr.addEventListener("load", controlPassword);
}	

//controlig register field on submit button
form.onsubmit = function(){
    //array of inputs
    let emptyInputs = Array.from(formInputs).filter(input => input.value === "");
        //if input is empty coloring this input field in red
        formInputs.forEach(function(input){
            if(input.value === ""){
                input.classList.add("error");
            } else {
                input.classList.remove("error");
            }
        });
        //controling lenght of inputs and sending message to user
        if (emptyInputs.length !== 0){
            alert('Prázdná pole musí být vyplněna!');
            return false;
        }
        //controling both passwords in case of error sending message to user
        if (inputPassword.value !== inputPasswordConf.value){
            alert("Hesla se neshodují");
            return false;
        }else{
            //if password are the same, starting function to split data from wa.toad.cz/password.txt
            function controlPassword(event){
                let passwords = event.target.responseText.split("\n")
                //if password in this list sending error message to user
                if (passwords.includes(inputPassword.value)){
                    alert("Heslo je příliš slabé");
                    return false;
                }
            }//function where we are making request and getting weak passwords
            function gettingPasswords(){
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "https://wa.toad.cz/passwords.txt", true);
                xhr.send ();
                xhr.addEventListener("load", controlPassword);
            }
        
            inputPassword.addEventListener("blur", gettingPasswords)
        }
        //in the end controlling if checkbox is empty or not
        if (!inputCheckbox.checked){
            inputCheckbox.classList.add("error");
            alert("Souhlasíte se zpracováním osobních údajů");
            return false;
        }else{
            inputCheckbox.classList.remove("error");
        }
        
    }




