<?php
include("../phpFiles/dbConnect.php");

$requestID = "";
$patientID = "";
$requestStatus = "";
$date = "";
$time = "";
$updateMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $requestID = isset($_POST["requestID"]) ? $_POST["requestID"] : "";
    $patientID = isset($_POST["patientID"]) ? $_POST["patientID"] : "";
    $date = isset($_POST["date"]) ? $_POST["date"] : "";
    $time = isset($_POST["time"]) ? $_POST["time"] : "";
    $requestStatus = isset($_POST["requestStatus"]) ? $_POST["requestStatus"] : "";
    $patientStatus = isset($_POST["patientStatus"]) ? $_POST["patientStatus"] : "";

    if (isset($_POST["approve"])) {
        $requestStatus = "Approved";
    }

    if (isset($_POST["decline"])) {
        $requestStatus = "Declined";
    }

    $updateQuery = "UPDATE requests SET patientID = '$patientID', requestDate = '$date', requestTime = '$time', requestStatus = '$requestStatus' WHERE requestID = $requestID";
    
    if ($conn->query($updateQuery) === TRUE) {
        $updateMessage = "Record updated successfully";
    } else {
        $updateMessage = "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    $requestID = isset($_POST["requestID"]) ? $_POST["requestID"] : "";

    $selectQuery = "SELECT * FROM requests WHERE requestID = $requestID";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $patientID = $row["patientID"];
        $date = $row["requestDate"];
        $time = $row["requestTime"];
        $requestStatus = $row["requestStatus"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/requestUpdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/appointmentRequestUpdate.css">
</head>
<body>
    <div class="am-container">
        <div class="am-body">
            <div class="am-head">
                <h1>Appointment Request Update</h1>
            </div>

            <form class="am-body-box" method="post" action="appointmentRequestUpdate.php">
                <a href="appointmentRequest.php"><i class="fas fa-arrow-alt-circle-left"></i></a>


                <div class="am-row">
                    <div class="am-col-6">
                        <p>Appointment Request ID: </p>
                        <input type="number" name="requestID" id="requestID" value="<?php echo $requestID; ?>" readonly>
                    </div>
                    <div class="am-col-6">
                        <p>Patient ID: </p>
                        <input type="number" name="patientID" id="patientID" placeholder="Enter New Patient ID" value="<?php echo $patientID; ?>">
                    </div>
                </div>
                <div class="am-row">
                    <div class="am-col-6">
                        <p>Request Status: </p>
                        <input type="text" name="requestStatus" id="requestStatus" placeholder="Enter New Request Status" value="<?php echo isset($_POST['newStatus']) ? htmlspecialchars($_POST['newStatus']) : $requestStatus; ?>" readonly>
                    </div>
                    <div class="am-col-6">
                        <p>Patient Status: </p>
                        <input type="text" name="patientStatus" id="patientStatus" placeholder="Enter New Patient Status" value="<?php echo $patientStatus; ?>" readonly>
                    </div>

                </div>

                <div class="am-row">
                <div class="am-col-6">
                            <p>Select Date: </p>
                            <input type="date" name="date" id="date" value="<?php echo $date; ?>">
                        </div>
                        <div class="am-col-6">
                            <p>Select Time: </p>
                            <input type="time" name="time" id="time" value="<?php echo $time; ?>">
                        </div>
                        
                </div>

                <div class="am-row">
                    <div class="am-col-3">
                        <button type="submit" name="submit">Update Appointment</button>
                    </div>
                </div>
            </form>
            <div class="update-message">
                <?php echo $updateMessage; ?>
            </div>

            <div class="am-footer">
                    <p>Dra. Ruth Luneta-Alolod Dental Clinic</p>
                </div>
        </div>
    </div>
</body>
</html>