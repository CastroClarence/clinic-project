<?php
    include("../phpFiles/dbConnect.php");
    include("../pages/login.php");

    // get the date today
    function getCurrentDate() {
        return date('Y-m-d');
      }

    $currentDate = getCurrentDate();

    $sqlRequestsToday = "SELECT requests.requestID, requests.patientID, patients.patientFirstName, patients.patientLastName, patients.patientMobileNo, requests.requestServices, requests.requestTime, requests.requestNotes, requests.requestStatus
    FROM requests
    LEFT JOIN patients ON requests.patientID = patients.patientID
    WHERE requests.requestDate ='$currentDate' AND requests.requestStatus = 'Approved'";
    $resultRequestsToday = $conn->query($sqlRequestsToday);
    
    $sqlTotalTransactions = "SELECT COUNT(transactionID) AS totalTransactions FROM transactions";
    $resultTotalTransactions = $conn->query($sqlTotalTransactions);


    $sqlVerifiedPatients = "SELECT COUNT(patientID) AS verifiedPatients FROM patients WHERE patientStatus='Verified'";
    $resultVerifiedPatients = $conn->query($sqlVerifiedPatients);

    $sqlPendingRequests = "SELECT COUNT(requestID) AS pendingRequests FROM `requests` WHERE requestStatus='Pending'";
    $resultPendingRequests = $conn->query($sqlPendingRequests);
    

    $sqlAmountCharged = "SELECT SUM(transChargeAmount) AS amountCharged FROM transactions";
    $resultAmountCharged = $conn->query($sqlAmountCharged);

    $sql = "SELECT transDate, transChargeAmount, transAmountPaid, transTime FROM transactions ORDER BY transactions.transDate ASC, transactions.transTime ASC";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $sql = "SELECT transDate, transChargeAmount, transAmountPaid, transTime FROM transactions ORDER BY transactions.transDate ASC, transactions.transTime ASC";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $serviceCheck = "SELECT requestServices FROM requests WHERE requestStatus = 'Approved'";
    $services = $conn->query($serviceCheck);

    $allService = array();

    if ($services && mysqli_num_rows($services) > 0) {
        while ($row = mysqli_fetch_assoc($services)) {
            $serviceChosen = explode(", ", $row['requestServices']);
            $allService = array_merge($allService, $serviceChosen);
        }
    }
        // Count the occurrences of each service
    $serviceCounts = array_count_values($allService);

    // Sort the services by count in descending order
    arsort($serviceCounts);

    // Take only the top 5 services
    $top5Services = array_slice($serviceCounts, 0, 5);


    if (!empty($allService)) {
        $serviceCounts = array_count_values($allService);
    }

    $dataPoints = array();
    foreach ($serviceCounts as $service => $count) {
        $dataPoints[] = array("label" => $service, "y" => $count);
    }


    $dataPointsJson = json_encode($dataPoints);

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Dashboard</title>
        <?php include("../pages/header.php");?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/KrwHSqkcS59mzxz2Lspz71bM7wQTtC1U6NhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../styles/dashboard.css" />
        <script type="text/javascript" src ="../scripts/dashboard.js"></script>
        <script>
            var chartData = <?php echo json_encode($data); ?>;
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
        
        <script>
            var dataPoints = <?php echo $dataPointsJson; ?>;
        </script>
    </head>

    <body>
        <div class="container">
            <?php 
            if($_SESSION["accRole"] == "Admin"){
                include('adminSidebar.php'); 
            }else{
                include('sidebar.php'); 
            } 
            ?>
            <section class="main">
                <div class="main-top">
                    <h1>Dashboard</h1>
                </div>
                <div class="grid-container">
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
                            <p>Gross Income</p>
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
                    <div id="chartContainer"></div>

                    <div id="pieContainer"></div>

                    <?php
                        if ($resultRequestsToday->num_rows > 0) {
                            echo '<table>';
                            echo "<tr><th>Request ID</th><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Mobile Number</th><th>Services</th><th>Time</th><th>Notes</th><th>Appointment Status</th>";

                            while ($row = $resultRequestsToday->fetch_assoc()) {
                            echo '<tr>';
                            foreach ($row as $value) {
                                echo '<td>' . $value . '</td>';
                            }
                            echo '</tr>';
                            }
                            echo '</table>';
                        } else {
                            echo '<p class="no-result">No requests for today.</p>';
                        }

                    ?>

                    <div class="bar">
                        <p>Bar</p>
                    </div>
                </div>

            </section>
        </div>
    </body>
</html>

