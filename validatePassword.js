

document.getElementById('passwordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    if (checkInputs()){
        this.submit();
    }

});
       
const email = document.getElementById('inputEmail3')
    
function checkInputs(){

    const useremail = email.value.trim();
        
    let isValid = true;   

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (useremail === ""){
        setErrorFor(email, 'Email required');
        isValid = false;
    }
    else if(!emailPattern.test(useremail)){
        setErrorFor( email, 'Please enter a valid email address.');
        isValid = false;
    }
    else{
        setSuccesFor(email);
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