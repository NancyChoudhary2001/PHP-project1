

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    if (checkInputs()){
        this.submit();
    }

});
       
const inputname = document.getElementById('inputName3')
const email = document.getElementById('inputEmail3')
const password =document.getElementById('inputPassword3')
    
function checkInputs(){

    const username = inputname.value.trim();
    const useremail = email.value.trim();
    const userPassword = password.value.trim();    

    const namePattern = /^[a-zA-Z ]+$/; 
    let isValid = true;   

    if (username === ""){
        setErrorFor(inputname, 'Username required');
        isValid = false;
    }
    else if(!namePattern.test(username)){
        // alert('Name must contain only characters');
        setErrorFor(inputname, 'Name must contain only characters');
        isValid = false;
    }
    else{
        setSuccesFor(inputname);
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (useremail === ""){
        setErrorFor(email, 'Email required');
        isValid = false;6
    }
    else if(!emailPattern.test(useremail)){
        setErrorFor( email, 'Please enter a valid email address.');
        isValid = false;
    }
    else{
        setSuccesFor(email);
    }

    const passwordPattern = /^(?=(.*[a-z]){1,})(?=(.*[A-Z]){1,})(?=(.*[0-9]){1,})(?=(.*[!@#$%^&*()\-__+.]){1,}).{8,}$/;
    if(userPassword === ""){
        setErrorFor(password, 'Password required');
        isValid = false;
    }
    else if(!passwordPattern.test(userPassword)){
        setErrorFor(password, 'Password must have 1 uppercase, 1 lowercase, 1 number, 1 special character, and be 8+ characters long.');
        isValid = false;
    }
    else{
        setSuccesFor(password);
    }
    
    return isValid;
}   

function setErrorFor(input, message){
    const formControl = input.parentElement;
    const lineBreak = document.createElement('br');
    formControl.insertBefore(lineBreak, formControl.querySelector('small'));

    const small = formControl.querySelector('small');
    small.innerText = message;
    formControl.className = 'col-sm-10 error';

}
 
function setSuccesFor(input){
    const formControl = input.parentElement;
    formControl.className = 'col-sm-10 succes';
}

    

