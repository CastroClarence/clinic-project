<?php
include("../phpFiles/dbConnect.php");
session_start();

$accountID = "";
$accFirstName = "";
$accLastName = "";
$accEmail = "";
$accPassword = "";
$accRole = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET['accountID'])){
        header("location: ./accountManagement.php");
        exit;
    }

    $accountID = $_GET['accountID'];

    $sql = "SELECT * FROM accounts WHERE accountID = $accountID";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

        $accountID = $row["accountID"];
        $accFirstName = $row["accFirstName"];
        $accLastName = $row["accLastName"];
        $accEmail = $row["accEmail"];
        $accPassword = $row["accPassword"];
        $accRole = $row["accRole"];
    
}else{

        $accountID = $_POST["accountID"];
        $accFirstName = $_POST["accFirstName"];
        $accLastName = $_POST["accLastName"];
        $accEmail = $_POST["accEmail"];
        $accPassword = $_POST["accPassword"];
        $accRole = $_POST["s-select"];


    $sql = "UPDATE accounts SET accFirstName = '$accFirstName', accLastName= '$accLastName' , accPassword='$accPassword', accRole= '$accRole'  WHERE accountID = $accountID";
    $result = $conn->query($sql);
    if (!$result) {
        echo  " <script>
            alert('Edit Not Success !');
        </script> ";
        die();
    }

    header("location: ./accountManagement.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/requestUpdate.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="am-container">
        <div class="am-body">
            <div class="am-head">
                <h1>Account Management</h1>
            </div>

            <form class="am-body-box" method="post" action="editAccount.php">
                <a href="accountManagement.php"><i class="fas fa-arrow-alt-circle-left"></i></a>

                <?php if (!empty($updateMessage)): ?>
                    <div class="message <?php echo (strpos($updateMessage, 'Error') !== false) ? 'error-message' : ''; ?>"><?php echo $updateMessage; ?></div>
                <?php endif; ?>

                <div class="am-row">
                    <div class="am-col-6">
                        <p>Account ID: </p>
                        <input type="text" name="accountID" id="accountID" value="<?php echo $accountID; ?>" readonly>
                    </div>
                    <div class="am-col-6">
                        <p>Email: </p>
                        <input type="text" name="accEmail" id="accEmail" value="<?php echo $accEmail; ?>" readonly>
                    </div>
                     </div>
                    
                
                <div class="am-row">
                    <div class="am-col-6">
                        <p>Last Name: </p>
                        <input type="text" name="accLastName" id="accLastName" value="<?php echo $accLastName; ?>"required>
                    </div>
                    <div class="am-col-6">
                        <p>First Name: </p>
                        <input type="text" name="accFirstName" id="accFirstName" value="<?php echo $accFirstName; ?>" required>
                    </div>
                </div>

                <div class="am-row">
                    <div class="am-col-6">
                        <p>Password: </p>
                        <input type="password" name="accPassword" id="accPassword" placeholder="Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?_&])[A-Za-z\d@$!%*?_&]{8,}$"
                        title="Password must be at least 8 characters with a mix of uppercase and lowercase letters, numbers, and special characters." value="<?php echo $accPassword; ?>" required>
                    </div>
                    <div class="am-col-6">
                        <p>Select Role: </p>
                        <select name="s-select">
                            <option value="Admin" <?php echo ($accRole == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="Employee" <?php echo ($accRole == 'Employee') ? 'selected' : ''; ?>>Employee</option>
                        </select>
                    </div>
                </div>

                <div class="am-row">
                    <div class="am-col-3">
                        <button type="submit" name="submit"> Update Account</button>
                    </div>
                </div>
            </form>
            <div class="am-footer">
                    <p>Dra. Ruth Luneta-Alolod Dental Clinic</p>
                </div>
        </div>
    </div>
</body>
</html>