<?php
include("../phpFiles/dbConnect.php");

$patientID = "";
$patientFirstName = "";
$patientLastName = "";
$patientAge = "";
$patientSex = "";
$patientMobileNo = "";
$patientEmail = "";
$patientAddress = "";
$patientOccupation = "";
//$patientBalance = "";
$updateMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
    $patientID = isset($_POST["patientID"]) ? $_POST["patientID"] : "";
    $patientFirstName = isset($_POST["patientFirstName"]) ? $_POST["patientFirstName"] : "";
    $patientLastName = isset($_POST["patientLastName"]) ? $_POST["patientLastName"] : "";
    $patientAge = isset($_POST["patientAge"]) ? $_POST["patientAge"] : "";
    $patientSex = isset($_POST["patientSex"]) ? $_POST["patientSex"] : "";
    $patientMobileNo = isset($_POST["patientMobileNo"]) ? $_POST["patientMobileNo"] : "";
    $patientEmail = isset($_POST["patientEmail"]) ? $_POST["patientEmail"] : "";
    $patientAddress = isset($_POST["patientAddress"]) ? $_POST["patientAddress"] : "";
    $patientOccupation = isset($_POST["patientOccupation"]) ? $_POST["patientOccupation"] : "";
    //$patientBalance = isset($_POST["patientBalance"]) ? $_POST["patientBalance"] : "";


    $updateQuery = "UPDATE patients SET patientFirstName = '$patientFirstName', patientFirstName = '$patientLastName', patientAge = '$patientAge', patientSex = '$patientSex', patientMobileNo = '$patientMobileNo', patientEmail = '$patientEmail', patientAddress = '$patientAddress', patientOccupation = '$patientOccupation', patientBalance = '$patientBalance' WHERE patientID ='$patientID'";
    
    if ($conn->query($updateQuery) === TRUE) {
        $updateMessage = "Record updated successfully";
    } else {
        $updateMessage = "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $patientID = isset($_POST["patientID"]) ? $_POST["patientID"] : "";

    $selectQuery = "SELECT * FROM patients WHERE patientID = $patientID";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $patientID = $row["patientID"];
        $patientFirstName = $row["patientFirstName"];
        $patientLastName = $row["patientLastName"];
        $patientAge = $row["patientAge"];
        $patientSex = $row["patientSex"];
        $patientMobileNo = $row["patientMobileNo"];
        $patientEmail = $row["patientEmail"];
        $patientAddress = $row["patientAddress"];
        $patientOccupation = $row["patientOccupation"];
        //$patientBalance = $row["patientBalance"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/patientForm.css">
</head>
<body>

<div class="am-container">
    <div class="am-body">
        <div class="am-head">
            <h1>Patient Record Update</h1>
        </div>

        <form class="am-body-box" method="post" action="patientRecordUpdate.php">
            <a href="patientRecord.php">Back</a>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Patient ID</p>
                    <input type="number" name="patientID" id="patientID" value="<?php echo $patientID; ?>" readonly>
                </div>

            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>First Name</p>
                    <input type="text" name="patientFirstName" id="patientFirstName" placeholder="Enter New First Name" value="<?php echo $patientFirstName; ?>">
                </div>

                <div class="am-col-6">
                    <p>Last Name</p>
                    <input type="text" name="patientLastName" id="patientLastName" placeholder="Enter New Last Name" value="<?php echo $patientLastName; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Age</p>
                    <input type="number" name="patientAge" id="patientAge" placeholder="Enter New Age" value="<?php echo $patientAge; ?>">
                </div>

                <div class="am-col-6">
                    <p>Sex</p>
                    <input type="text" name="patientSex" id="patientSex" placeholder="Enter New Sex" value="<?php echo $patientSex; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Mobile Number</p>
                    <input type="text" name="patientMobileNo" id="patientMobileNo" placeholder="Enter New Mobile Number" value="<?php echo $patientMobileNo; ?>">
                </div>

                <div class="am-col-6">
                    <p>Email</p>
                    <input type="text" name="patientEmail" id="patientEmail" placeholder="Enter New Email" value="<?php echo $patientEmail; ?>">
                </div>
            </div>

            <div class="am-row">
                <div class="am-col-6">
                    <p>Address</p>
                    <input type="text" name="patientAddress" id="patientAddress" placeholder="Enter New Address" value="<?php echo $patientAddress; ?>">
                </div>

                <div class="am-col-6">
                    <p>Occupation</p>
                    <input type="text" name="patientOccupation" id="patientOccupation" placeholder="Enter New Occupation" value="<?php echo $patientOccupation; ?>">
                </div>
            </div>

                <div class="am-row">
                    <div class="am-col-12">
                        <button type="submit" name="submit">Update Record</button>
                    </div>
                </div>

        </form>

        <div class="update-message">
            <?php echo $updateMessage; ?>
        </div>

    </div>
</div>

</body>
</html>