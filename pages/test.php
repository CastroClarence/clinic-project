<?php
    include("../phpFiles/dbConnect.php");
    session_start();
    $allTime = array("08:00:00", "08:30:00", "09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "13:00:00", "13:30:00", "14:00:00", "14:30:00", "15:00:00", "16:00:00");
    $availableTime = $allTime;
    if(isset($_POST["submitSelectDate"])){
        unset($_SESSION["firstName"]);
        $_SESSION["firstName"] = $_POST["firstName"];
        $_SESSION["selectedDate"] = $_POST["selectedDate"];

        $firstName = $_POST["firstName"];
        $selectedDate = $_POST["selectedDate"];
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

    if(isset($_POST["finalSubmit"])){
        $_SESSION["selectOption"] = $_POST["selectOption"];

        echo $_SESSION["firstName"] . "<br>";
        echo $_SESSION["selectedDate"] . "<br>";
        echo $_SESSION["selectOption"] . "<br>";

        if(empty($_SESSION["firstName"])){
            echo "no laman fname";
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
    <form action = "test.php" method = "post" autocomplete="off">
        <label for= "firstName">Enter First Name:</label>
        <input type = "text" id = "firstName" name = "firstName" required>
        <label for= "selectDate">Choose Date:</label>
        <input type = "date" id = "selectDate" name = "selectedDate" required>
        <input type = "submit" name = "submitSelectDate"  id = "submitSelectDate" value = "SEND" onclick = "e.preventDefault()">
    </form>

    <form action = "test.php" method = "post" autocomplete="off">
        <?php
            if(!empty($_POST["submitSelectDate"])){
                echo "<script>document.getElementById('firstName').value = '$firstName'</script>";
                echo "<script>document.getElementById('selectDate').value = '$selectedDate'</script>";
            }
        ?>
        <label for = "dateSelect"> Choose Time: </label>
        <?php
            if(!empty($_POST["submitSelectDate"])){
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
        
        <?php 
            if(!empty($_POST["submitSelectDate"])){
            echo"<input type ='submit' name = 'finalSubmit'  id = 'finalSubmit' value = 'FINAL SUBMIT' onclick = 'confirmSubmit()'>";
            }
        ?>
    </form>

    <script>
        function confirmSubmit(){
            let subRes = confirm("Submit?");
            if(subRes == true){
                return true;
            }else{
                event.preventDefault()
            }
        }
    </script>
</body>
</html>