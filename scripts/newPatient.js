function confirmSubmit(){
    let subRes = confirm("Submit?");
    if(subRes == true){
        return true;
    }else{
        event.preventDefault()
    }
}
function infoSubmit(){
    let subRes = confirm("Are your information correct? No changes after checking time.");
    if(subRes == true){
        if(document.getElementById('sex').disabled =true){
            document.getElementById('sex').disabled =false;
        }
        return true;
    }else{
        event.preventDefault()
    }
}

function showButtonSubmit(){
    let chkbx = document.getElementById("confirmCheckbox");
    let btn = document.getElementById("submitInfo");
  
    if(chkbx.checked){
        btn.disabled =false;
    }else{
        btn.disabled =true;
    }
}