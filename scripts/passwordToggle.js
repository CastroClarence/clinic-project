document.getElementById("passImageLog").addEventListener("click", function(){
    let imgPass = document.getElementById("passImageLog");
    let passwordLog = document.getElementById("passwordLogin");
    if(passwordLog.type == "password"){
        passwordLog.type = "text";
        imgPass.src = "../images/showPass.png";
    }else{
        passwordLog.type = "password";
        imgPass.src = "../images/hidePass.png";
    }
});