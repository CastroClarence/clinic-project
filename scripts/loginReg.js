function showReg(){
    let rightS = document.getElementById("right");
    let leftS = document.getElementById("left");
    let rImg = document.getElementById("rightPic");
    const newImg = document.createElement("img");
    newImg.src = "../images/hero2.png";

    if(rightS.className == "rightSide" && leftS.className == "leftSide"){
        rightS.className = "rightSideNew";
        leftS.className = "leftSideNew";
        
    }else{
        rightS.className = "rightSide";
        leftS.className = "leftSide";
    }

    rImg.parentNode.removeChild(rImg);
    newImg.id = "leftPic";
    newImg.className = "heroClinicImg";
    document.getElementById("left").insertBefore(newImg, leftS.firstChild);
}

function showLog(){
    let rightS = document.getElementById("right");
    let leftS = document.getElementById("left");
    let lImg = document.getElementById("leftPic");
    let newImg = document.createElement("img");
    newImg.src = "../images/heroClinic.png";

    if(rightS.className == "rightSideNew" && leftS.className == "leftSideNew"){
        rightS.className = "rightSide";
        leftS.className = "leftSide";
        
    }else{
        rightS.className = "rightSideNew";
        leftS.className = "leftSideNew";
    }

    lImg.parentNode.removeChild(lImg);
    newImg.id = "rightPic";
    newImg.className = "heroClinicImg";
    document.getElementById("right").insertBefore(newImg, rightS.firstChild);
}