function toggleImg(){
    let imgPass = document.getElementById("passImageLog");
    let passwordLog = document.getElementById("passwordLogin");
    if(passwordLog.type == "password"){
        passwordLog.type = "text";
        imgPass.src = "../images/showPass.png";
        console.log("yes");
    }else{
        passwordLog.type = "password";
        imgPass.src = "../images/hidePass.png";
        console.log("no");
    }
}

document.getElementById("passImage").addEventListener("click", toggleImg);