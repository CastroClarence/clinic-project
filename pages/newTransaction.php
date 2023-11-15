<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Record</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href="#">
</head>
<body>
    <div class="main">
        <div class="header">
            <h1>New Transaction</h1>
        </div>
        <div class="button">
            <a href="transaction.php">Back</a>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-container">
            <div>
                <span>Patient ID</span>
                <input type="number" id="patientid" name="patientid" placeholder="Enter Patient ID">
            </div>
            <div>
                <span>Charge Amount</span>
                <input type="number" id="chargeamount" name="chargeamount" placeholder="Enter Charge Amount">
            </div>
            <div>
                <span>Amount Paid</span>
                <input type="number" id="amountpaid" name="amountpaid" placeholder="Enter Amount Paid">
            </div>
            <div>
                <span>Notes</span>
                <textarea id="notes" name="notes" rows="4" cols="50" placeholder="Enter your Notes"></textarea>
            </div>
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>


<?php 
    include("../phpFiles/dbConnect.php");
    session_start();  

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientid = $_POST['patientid'];
        $chargeamount = $_POST['chargeamount'];
        $amountpaid = $_POST['amountpaid'];
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $notes = $_POST['notes'];

        $query = "SELECT patientID, patientBalance FROM patients WHERE patientID = '$patientid';";

        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $prev_balance = $row["patientBalance"];
        }

        $calculate = (float)$chargeamount - (float)$amountpaid;
        $balance = (float)$prev_balance + (float)$calculate;

        
        $sql="INSERT INTO transactions (patientID, transChargeAmount, transAmountPaid, transDate, transTime, transNotes) VALUES ('$patientid', '$chargeamount', '$amountpaid', '$date', '$time', '$notes');";
        $sql_update="UPDATE patients SET patientBalance = '$balance' WHERE patientID = '$patientid';";
    
        if ($conn->query($sql) === TRUE) {
            if ($conn->query($sql_update) === TRUE) {
                $balance = "0";
                $result -> free_result();
                $conn->close();
                header("Location: transaction.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>