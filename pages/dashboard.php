<?php
    include("../phpFiles/dbConnect.php");
    session_start();
    
    $sqlTotalTransactions = "SELECT COUNT(transactionID) AS totalTransactions FROM transactions";
    $resultTotalTransactions = $conn->query($sqlTotalTransactions);


    $sqlVerifiedPatients = "SELECT COUNT(patientID) AS verifiedPatients FROM patients WHERE patientStatus='Verified'";
    $resultVerifiedPatients = $conn->query($sqlVerifiedPatients);

    $sqlPendingRequests = "SELECT COUNT(requestID) AS pendingRequests FROM `requests` WHERE requestStatus='Pending'";
    $resultPendingRequests = $conn->query($sqlPendingRequests);
    

    $sqlAmountCharged = "SELECT SUM(transChargeAmount) AS amountCharged FROM transactions";
    $resultAmountCharged = $conn->query($sqlAmountCharged);

    $sql = "SELECT transDate, transChargeAmount, transAmountPaid, transTime FROM transactions";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/KrwHSqkcS59mzxz2Lspz71bM7wQTtC1U6NhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../styles/dashboard.css" />
        <script type="text/javascript" src ="../scripts/dashboard.js"></script>
        <script>
            var chartData = <?php echo json_encode($data); ?>;
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>        
    </head>

    <body>
        <div class="container">
            <?php include('sidebar.php'); ?>
            <section class="main">
                <div class="main-top">
                    <h1>Dashboard</h1>
                </div>
                <div class="users">
                    <div class="card">
                        <div class="per">
                            <p>Total Transactions</p>
                            <?php
                            if ($resultTotalTransactions->num_rows > 0) {
                                $rowTotalTransactions = $resultTotalTransactions->fetch_assoc();
                                echo "<h2>" . $rowTotalTransactions["totalTransactions"] . "</h2>";
                            } else {
                                echo "<h2>0</h2>";
                            }
                            ?>
                        </div>

                        <i class="fa-solid fa-hand-holding-dollar fa-2xl"></i>
                    </div>
                    <div class="card">
                        <div class="per">
                            <p>Verified Patients</p>
                            <?php
                            if ($resultVerifiedPatients->num_rows > 0) {
                                $rowVerifiedPatients = $resultVerifiedPatients->fetch_assoc();
                                echo "<h2>" . $rowVerifiedPatients["verifiedPatients"] . "</h2>";
                            } else {
                                echo "<h2>0</h2>";
                            }
                            ?>
                        </div>

                        <i class="fa-solid fa-user fa-2xl"></i>
                    </div>
                    <div class="card">
                        <div class="per">
                            <p>Pending Appointments</p>
                            <?php
                            if ($resultPendingRequests->num_rows > 0) {
                                $rowPendingRequests = $resultPendingRequests->fetch_assoc();
                                echo "<h2>" . $rowPendingRequests["pendingRequests"] . "</h2>";
                            } else {
                                echo "<h2>0</h2>";
                            }
                            ?>
                        </div>

                        <i class="fa-solid fa-calendar fa-2xl"></i>
                    </div>
                    <div class="card">
                        <div class="per">
                            <p>Total Amount Charged</p>
                            <?php
                            if ($resultAmountCharged->num_rows > 0) {
                                $rowAmountCharged = $resultAmountCharged->fetch_assoc();
                                echo "<h2>₱" . $rowAmountCharged["amountCharged"] . "</h2>";
                            } else {
                                echo "<h2>₱0.00</h2>";
                            }
                            ?>
                        </div>

                        <i class="fa-solid fa-money-bill fa-2xl"></i>
                    </div>
                </div>

                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </section>
        </div>
    </body>
</html>

