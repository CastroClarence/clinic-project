<?php
include("../phpFiles/dbConnect.php");

$requestID = "";
$patientID = "";
$serviceID = "";
$date = "";
$time = "";
$updateMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $requestID = isset($_POST["requestID"]) ? $_POST["requestID"] : "";
    $patientID = isset($_POST["patientID"]) ? $_POST["patientID"] : "";
    $serviceID = isset($_POST["serviceID"]) ? $_POST["serviceID"] : "";
    $date = isset($_POST["date"]) ? $_POST["date"] : "";
    $time = isset($_POST["time"]) ? $_POST["time"] : "";


    $updateQuery = "UPDATE requests SET patientID = '$patientID', serviceID = '$serviceID', requestDate = '$date', requestTime = '$time' WHERE requestID = $requestID";
    
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
        $serviceID = $row["serviceID"];
        $date = $row["requestDate"];
        $time = $row["requestTime"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/oldPatient.css">
    <link rel="stylesheet" href="../styles/appointmentRequestUpdate.css">
</head>
<body>
    <div class="am-container">
        <div class="am-body">
            <div class="am-head">
                <h1>Appointment Request Update</h1>
            </div>

            <form class="am-body-box" method="post" action="appointmentRequestUpdate.php">
                <a href="appointmentRequest.php">Back</a>

                <div class="am-row">
                    <div class="am-col-6">
                        <p>Appointment Request ID</p>
                        <input type="number" name="requestID" id="requestID" value="<?php echo $requestID; ?>" readonly>
                    </div>
                </div>
                <div class="am-row">
                    <div class="am-col-6">
                        <p>Patient ID</p>
                        <input type="number" name="patientID" id="patientID" placeholder="Enter New Patient ID" value="<?php echo $patientID; ?>">
                    </div>

                    <div class="am-col-6">
                        <p>Service ID</p>
                        <input type="number" name="serviceID" id="serviceID" placeholder="Enter New Service ID" value="<?php echo $serviceID; ?>">
                    </div>
                </div>

                <div class="am-row">
                        <div class="am-col-6">
                            <p>Select Date</p>
                            <input type="date" name="date" id="date" value="<?php echo $date; ?>">
                        </div>
                        <div class="am-col-6">
                            <p>Select Time</p>
                            <input type="time" name="time" id="time" value="<?php echo $time; ?>">
                        </div>
                    </div>

                <div class="am-row">
                    <div class="am-col-12">
                        <button type="submit" name="submit">Update Appointment</button>
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