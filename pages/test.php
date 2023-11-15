<?php
    include("../phpFiles/dbConnect.php");
    session_start();
    $allTime = array("08:00:00", "08:30:00", "09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "13:00:00", "13:30:00", "14:00:00", "14:30:00", "15:00:00", "16:00:00");
    $availableTime = $allTime;
    if(isset($_POST["submitSelectDate"])){
        $_SESSION["selectedDate"] = $_POST["selectedDate"];
        $_SESSION["firstName"] = $_POST["firstName"];


        $firstName = $_SESSION["firstName"];
        $selectedDate = $_SESSION["selectedDate"];
        
        $checkDates = "SELECT requestTime FROM appointments WHERE requestDate = '{$_SESSION['selectedDate']}'";
            
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "test.php" method = "post">
        <label for= "firstName">Enter First Name:</label>
        <input type = "text" id = "firstName" name = "firstName" required>
        <label for= "selectDate">Choose Date:</label>
        <input type = "date" id = "selectDate" name = "selectedDate" required>
        <input type = "submit" name = "submitSelectDate"  id = "submitSelectDate" value = "SEND">
    </form>

    <form action = "test.php" method = "post">
        <?php
            echo "<script>document.getElementById('firstName').value = '$firstName'</script>";
            echo "<script>document.getElementById('selectDate').value = '$selectedDate'</script>";
            echo "<p>Select Time:</p>
            <select name='selectOption' id = 'dateSelect'>";
            
            foreach($availableTime as $content){
                $displayTime = strtotime($content);
                $finalTime = date("h:i A", $displayTime);
                echo"<option value=$content name = '$content'> $finalTime </option>";
             }
        ?>

        <input type = "submit" name = "finalSubmit"  id = "finalSubmit" value = "Final Submit">
        <!-- <p>Select Time:</p>
        <select name="selectOption" id = "dateSelect">
            <option value="8:00:00" name = "_8">8:00 AM</option>
            <option value="8:30:00" name = "_830">9:30 AM</option>
            <option value="9:00:00" name = "_9">9:00 AM</option>
            <option value="9:30:00" name = "_930">9:30 AM</option>
            <option value="10:00:00" name = "_10">10:00 AM</option>
            <option value="10:30:00" name = "_1030">10:30 AM</option>
            <option value="11:00:00" name = "_1100">11:00 AM</option>
            <option value="13:00:00" name = "_1">1:00 PM</option>
            <option value="13:30:00" name = "_130">1:30 AM</option>
            <option value="14:00:00" name = "_2">2:00 PM</option>
            <option value="14:30:00" name = "_130">2:30 AM</option>
            <option value="15:00:00" name = "_3">3:00 PM</option>
            <option value="15:30:00" name = "_130">3:30 AM</option>
            <option value="16:00:00" name = "_4">4:00 PM</option>
        </select><br><br> -->
        
    </form>
</body>
</html>