<?php
    include("../phpFiles/dbConnect.php");
    session_start();   

    $searchterm = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchterm = $_POST["searchterm"];
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT transactions.transactionID, transactions.patientID, patients.patientFirstName, patients.patientLastName, transactions.transChargeAmount, transactions.transAmountPaid, transactions.transTime, transactions.transDate, transactions.transNotes, patients.patientBalance
            FROM transactions
            JOIN patients on patients.patientID = transactions.patientID";

    if (!empty($searchterm)) {
        $sql .= " WHERE transactions.transactionID LIKE '%$searchterm%' OR transactions.patientID LIKE '%$searchterm%' OR patients.patientFirstName LIKE '%$searchterm%' OR patients.patientLastName LIKE '%$searchterm%' OR transactions.transDate LIKE '%$searchterm%' OR transactions.transNotes LIKE '%$searchterm%'";
    }

    $sql .= ";";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Record</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href="../styles/transaction.css">
</head>
<body>
    <div class="container">
        <?php include('sidebar.php'); ?>
        <main>
            <h1>Transaction Record</h1>
            <div class="main-content">
                <div class="contain">
                    <div class="button">
                        <a href="addTransaction.php"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="search">
                        <input type="text" placeholder="Search" name="searchterm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
                <?php 
                    if ($result->num_rows > 0){
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Transaction ID</th>";
                        echo "<th>Patient ID</th>";
                        echo "<th>First Name</th>";
                        echo "<th>Last Name</th>";
                        echo "<th>Charge Amount</th>";
                        echo "<th>Amount Paid</th>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "<th>Notes</th>";
                        echo "</tr>";
                        
                        while ($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row["transactionID"] . "</td>";
                            echo "<td>" . $row["patientID"] . "</td>";
                            echo "<td>" . $row["patientFirstName"] . "</td>";
                            echo "<td>" . $row["patientLastName"] . "</td>";
                            echo "<td>" . $row["transChargeAmount"] . "</td>";
                            echo "<td>" . $row["transAmountPaid"] . "</td>";
                            echo "<td>" . $row["transDate"] . "</td>";
                            echo "<td>" . $row["transTime"] . "</td>";
                            echo "<td>" . $row["transNotes"] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }else{
                        echo "0 results";
                    }

                    $conn->close();
                ?>
            </div>
        </main>
    </div>
</body>
</html>
