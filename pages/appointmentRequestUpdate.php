<?php
    session_start();

    include("../phpFiles/dbConnect.php");

    $requestID = "";
    $patientID = "";
    $requestStatus = "";
    $patientStatus = "";
    $date = "";
    $time = "";
    $updateMessage = "";
    $allTime = array("08:00:00", "08:30:00", "09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "13:00:00", "13:30:00", "14:00:00", "14:30:00", "15:00:00", "16:00:00");
    $availableTime = $allTime;

    //php of selected date
    if(isset($_POST["submitSelectDate"])){
        $_SESSION["selectedDate"] = $_POST["selectedDate"];
        $selectedDate = $_POST["selectedDate"];
        echo "<script>document.getElementById('date').value = '$selectedDate'</script>";
        $checkDates = "SELECT requestTime FROM requests WHERE requestDate = '$selectedDate'";
        try{
            $results = mysqli_query($conn, $checkDates);
        }catch(mysqli_sql_exception){
            echo "Error Searching";
        }
        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){
                foreach($availableTime as $content){
                    if($row["requestTime"] == $content){
                        $indexNumber = array_search($content, $availableTime);
                        unset($availableTime[$indexNumber]);
                    }       
                }
            }
        }else{
            $availableTime = $allTime;
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalSubmit"])) {
        $requestID = isset($_POST["requestID"]) ? $_POST["requestID"] : "";
        $patientID = isset($_POST["patientID"]) ? $_POST["patientID"] : "";
        $date = isset($_POST["date"]) ? $_POST["date"] : "";
        $time = isset($_POST["time"]) ? $_POST["time"] : "";
        $requestStatus = isset($_POST["requestStatus"]) ? $_POST["requestStatus"] : "";
        $patientStatus = isset($_POST["patientStatus"]) ? $_POST["patientStatus"] : "";
        $_SESSION["selectOption"] = $_POST["selectOption"];

        if ($requestStatus == "Declined" && $patientStatus == "Not Verified") {

            $deleteRequestsQuery = "DELETE FROM requests WHERE patientID = '$patientID'";
            $deletePatientsQuery = "DELETE FROM patients WHERE patientID = '$patientID'";

            $conn->query($deleteRequestsQuery);
            $conn->query($deletePatientsQuery);

            $conn->close();

            $deleteMessage = "Records deleted successfully";

            header("Location: appointmentRequest.php");
            exit;
        }

        $updateQuery = "UPDATE requests SET patientID = '$patientID', requestDate = '{$_SESSION["selectedDate"]}', requestTime = '{$_SESSION["selectOption"]}', requestStatus = '$requestStatus' WHERE requestID = $requestID";
        
        if ($conn->query($updateQuery) === TRUE) {
            $updateMessage = "Record updated successfully";

            $updatePatientStatusQuery = "UPDATE patients SET patientStatus = '$patientStatus' WHERE patientID = $patientID";
            $conn->query($updatePatientStatusQuery);
        } else {
            $updateMessage = "Error updating record: " . $conn->error;
        }

        $conn->close();

        
    } else {
        $requestID = isset($_POST["requestID"]) ? $_POST["requestID"] : "";

        $selectQuery = "SELECT requests.requestID, requests.patientID, patients.patientFirstName, patients.patientLastName, patients.patientStatus, requests.requestDate, requests.requestTime, requests.requestStatus
                    FROM requests
                    LEFT JOIN patients ON requests.patientID = patients.patientID
                    WHERE requests.requestID = $requestID";

        $result = $conn->query($selectQuery);


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $patientID = $row["patientID"];
            $date = $row["requestDate"];
            $time = $row["requestTime"];
            $requestStatus = $row["requestStatus"];

            if (isset($_POST["approve"]) && $row["patientStatus"] != "Verified") {
                $patientStatus = "Verified";
            }
            else {
                $patientStatus = $row["patientStatus"];
            }
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
    <link rel="stylesheet" href="../styles/appointmentRequestUpdate.css">
    <?php include('header.php'); ?>
</head>
<body>
    <div class="am-container">
        <div class="am-body">
            <div class="am-head">
                <h1>Appointment Request Update</h1>
            </div>

            <form class="am-body-box" method="post" action="appointmentRequestUpdate.php" id="upd-form">
                <a href="appointmentRequest.php"><i class="fas fa-arrow-alt-circle-left"></i></a>


                <div class="am-row">
                    <div class="am-col-6">
                        <p>Appointment Request ID: </p>
                        <input type="number" name="requestID" id="requestID" value="<?php echo $requestID; ?>" readonly>
                    </div>
                    <div class="am-col-6">
                        <p>Patient ID: </p>
                        <input type="number" name="patientID" id="patientID" placeholder="Enter New Patient ID" value="<?php echo $patientID; ?>" readonly>
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
                        <input type='date' name='selectedDate' id='date' class = 'dateLay' required>
                        <input type ='submit' name = 'submitSelectDate'  id = 'submitSelectDate' class = 'dateLay' value = 'CHECK AVAILABLE TIME' onclick = 'e.preventDefault()'>
                    </div>
                    
                    <!-- Time -->
                    <div class="am-col-6">
                        <div>
                            <label for = "dateSelect"> Choose Time: </label>
                            <?php
                                if((!empty($_POST["submitSelectDate"]))){
                                    echo "<script>document.getElementById('date').value = '$selectedDate'</script>";
                                    echo '<select name="selectOption" id = "dateSelect">?';    
                                }else{
                                    echo '<select name="selectOption" id = "dateSelect" disabled>';
                                }

                                foreach($availableTime as $content){
                                    $displayTime = strtotime($content);
                                    $finalTime = date("h:i A", $displayTime);
                                    echo "<option value= '$content'> $finalTime </option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                    </div>
                        
                </div>

                <div class="am-row">
                    <div class="am-col-3">
                    <?php
                                if((!empty($_POST["submitSelectDate"]))){
                                    echo '<button type="submit" name="finalSubmit" id ="finalSubmit" value = "SUBMIT APPOINTMENT" onclick = "confirmSubmit()">Update Appointment</button>'; 
                                }else{
                                    echo '<button type="submit" name="finalSubmit" id ="finalSubmit" value = "SUBMIT APPOINTMENT" onclick = "confirmSubmit()" disabled>Update Appointment</button>';
                                }
                            ?>
                    </div>
                </div>
            </form>
                <!-- d pa naganaaaaaaaaaaa -->
                <!-- <script> -->
                <!--     updateAlert('upd-btn', 'upd-form'); -->
                <!-- </script> -->

            <div class="am-footer">
                    <p>Dra. Ruth Luneta-Alolod Dental Clinic</p>
                </div>
        </div>
    </div>

    <script src ="../scripts/dateToday.js"></script>
    <script src ="../scripts/newPatient.js"></script>
</body>
</html>
