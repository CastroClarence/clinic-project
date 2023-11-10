<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href = "../styles/loginReg.css">
    <script type="text/javascript" src ="../scripts/loginLoad.js"></script>
</head>
    <body>
        <section id = "mainWelcome">
            <div class = "logRegCont">
                <div class = "leftSide" id ="left">
                    <img src = "../images/clinic_logo.png" id = "logoClinic">
                    <h1>Welcome Back</h1>
                    <form autocomplete="off" class = "inputFormLog" name ="formLog">
                        <ion-icon name="mail-outline" class = "icon"></ion-icon>
                        <input type ="email" id = "emailLogin" class = "inputLogin" placeholder="Email" required><br>
                        <ion-icon name="key-outline" class = "icon"></ion-icon>
                        <input type ="password" id = "passwordLogin" class = "inputLogin" placeholder="Password" required> 
                        <img src = "../images/hidePass.png" id ="passImageLog" class = "passImg"><br>
                        <input type = "submit" id ="submitBtn" class = "mainBtn" value = "LOG IN">
                    </form>
                    <p>Don't have an account? </p><button onclick ="showReg()" class = "btnInquiry"> Sign Up</button> 
                </div>
                <div class = "rightSide" id ="right"> 
                    <img src = "../images/clinic_logo.png" id = "logoClinic">
                    <h1>Sign Up</h1>
                    <form class = "inputFormReg" name ="formReg">
                        <input type ="text" id = "fNReg" class = "inputReg" placeholder="First Name" required>
                        <input type ="text" id = "lNReg" class = "inputReg" placeholder="Last Name" required>
                        <input type ="email" id = "emailReg" class = "inputLogin" placeholder="Email" required><br>
                        <input type ="password" id = "passReg" class = "inputReg" placeholder="Password" required>
                        <input type ="password" id = "confirmPassReg" class = "inputReg" placeholder="Confirm Password" required>
                        <input type = "submit" id ="regBtn" class = "mainBtn" value = "REGISTER">
                    </form>
                    <br><p>Already have an account? </p><button onclick ="showLog()" class = "btnInquiry"> Login</button> 

                </div>
            </div>
        </section>
        
        <script src ="../scripts/loginReg.js"></script>
        <script src ="../scripts/passwordToggle.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>