<?php
    include("../phpFiles/dbConnect.php");
    session_start();
    $errorPrompt = array();
    $successPrompt = array();
    if(isset($_POST["register"])){
        $fName = $_POST["fNReg"];
        $lName = $_POST["lNReg"];
        $emailReg = $_POST["emailReg"];
        $passReg = $_POST["passReg"];
        $passReg = $_POST["confirmPassReg"];
        
        $checkEmail = "SELECT * FROM accounts WHERE accEmail = '$emailReg'";
        $emailQuery = mysqli_query($conn, $checkEmail);
        if(mysqli_num_rows($emailQuery) > 0){
            unset($errorPrompt["noEmail"]);
            unset($errorPrompt["passIncorrect"]);
            $errorPrompt["emailRegExist"] = "Email Already Exists. Log in Here<br>";
            
        }else{
            $sqlInsert = "INSERT INTO accounts(accFirstName, accLastName, accEmail, accPassword) 
                    VALUES('$fName', '$lName', '$emailReg', '$passReg')";
            try{
                mysqli_query($conn, $sqlInsert);
                $successPrompt["successReg"] = "Registered Successfully!<br>";
            }catch(mysqli_sql_exception){
                echo "Registration error";
            }
        }
    }

    if(isset($_POST["login"])){
        $emailLog = $_POST["emailLogin"];
        $passLog= $_POST["passwordLogin"];
        
        $checkExistence = "SELECT * FROM accounts WHERE accEmail = '$emailLog'";
        try{
            $resultExist = mysqli_query($conn, $checkExistence);
        }catch(mysqli_sql_exception){
            echo "Login Error";
        }

        if(mysqli_num_rows($resultExist) > 0){
            $row = mysqli_fetch_assoc($resultExist);
            $dbEmail = $row["accEmail"];
            $dbPass = $row["accPassword"];

            if($dbPass != $passLog){
                $errorPrompt["passIncorrect"] = "Incorrect Password<br>";
            }else{
                $_SESSION["activeUser"] = $row["accFirstName"];
                header("Location: dashboard.php");
            }
        }else{
            $errorPrompt["noEmail"] = "Email Doesn't Exist<br>";
        }
    }
?>

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
                    <form autocomplete="off" action = "loginReg.php" id = "formLog" class = "inputFormLog" name ="formLog" method = "post">
                        <ion-icon name="mail-outline" class = "icon"></ion-icon>
                        <input type ="email" id = "emailLogin" class = "inputLogin" name = "emailLogin" placeholder="Email" required><br>
                        <ion-icon name="key-outline" class = "icon"></ion-icon>
                        <input type ="password" id = "passwordLogin" class = "inputLogin" name = "passwordLogin" placeholder="Password" required> 
                        <img src = "../images/hidePass.png" id ="passImageLog" class = "passImg"><br>
                        <p class = "errorOutput" id = "errorOutput">
                            <?php 
                                if(isset($errorPrompt["noEmail"])){
                                    echo $errorPrompt["noEmail"];
                                }elseif(isset($errorPrompt["passIncorrect"])){
                                    echo $errorPrompt["passIncorrect"];
                                }elseif(isset($errorPrompt["emailRegExist"])){
                                    echo $errorPrompt["emailRegExist"];
                                }else{
                                    echo"";
                                }
                            ?>
                        </p>
                        <p class = "successRegOutput" id = "successRegOutput">
                            <?php 
                                if(isset($successPrompt["successReg"])){
                                    echo $successPrompt["successReg"];
                                }else{
                                    echo "";
                                }
                            ?>
                        </p>
                        <input type = "submit" id ="submitBtn" class = "mainBtn" name = "login" value = "LOG IN">
                    </form><?php $POST = array()?>
                    <p>Don't have an account? </p><button onclick ="showReg()" class = "btnInquiry"> Sign Up</button> 
                </div>
                <div class = "rightSide" id ="right"> 
                    <img src = "../images/clinic_logo.png" id = "logoClinic">
                    <h1>Sign Up</h1>
                    <form autocomplete="off" action = "loginReg.php" id = "formReg" class = "inputFormReg" name ="formReg" method = "post">
                        <input type ="text" id = "fNReg" class = "inputReg" name = "fNReg" placeholder="First Name" required>
                        <input type ="text" id = "lNReg" class = "inputReg" name = "lNReg" placeholder="Last Name" required>
                        <input type ="email" id = "emailReg" class = "inputLogin" name = "emailReg" placeholder="Email" required><br>
                        <input type ="password" id = "passReg" class = "inputReg" name = "passReg" 
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?_&])[A-Za-z\d@$!%*?_&]{8,}$"
                        title="Password must be at least 8 characters with a mix of uppercase and lowercase letters, numbers, and special characters."
                        placeholder="Password" onchange="confirmPassword()"  required>
                        <input type ="password" id = "confirmPassReg" class = "inputReg" name = "confirmPassReg" placeholder="Confirm Password" onkeyup="confirmPassword()" required>
                        <img src = "../images/hidePass.png" id ="passImageReg" class = "passImg"><br>
                        <input type = "submit" id ="regBtn" class = "mainBtn" name = "register" value = "REGISTER" >
                    </form>
                    <br><p>Already have an account? </p><button onclick ="showLog()" class = "btnInquiry"> Login</button> 
                </div>
            </div>
        </section>
        
        <script src ="../scripts/loginReg.js"></script>
        <script src ="../scripts/passwordToggle.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>
