const submitBtn=document.querySelector("#submitBtn");
const nameError=document.querySelector("#error-name");
submitBtn.addEventListener('click' , (event) => {
    event.preventDefault();


});

function validateName(){
    let name=document.querySelector("#myName").value;
    if(name.validateName == 0)
    {
        nameError.innerHTML="Name is required";
        return false;

    }
    return true;
}