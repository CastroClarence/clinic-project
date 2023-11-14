<?php
  include("../phpFiles/dbConnect.php");
  session_start();
  
  $searchKeyword = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $searchKeyword = $_POST["searchKeyword"];
  }

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //normal function
  $sql = "SELECT * FROM patients";

  //search if search not empty
  if (!empty($searchKeyword)) {
      $sql .= " WHERE patients.patientFirstName LIKE '%$searchKeyword%' OR patients.patientLastName LIKE '%$searchKeyword%'";
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/appointmentRequest.css">
</head>
<body>
    <div class="container">
        <?php include('sidebar.php'); ?> 
        <div class="table-container">
            <h1 class="header">Appointment Request</h1>

            <div id="reqTbl">

                <div id="search-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="text" name="searchKeyword" value="<?php echo $searchKeyword; ?>">
                    </form>
                </div>

                <?php
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Sex</th><th>Mobile Number</th><th>Email</th><th>Address</th><th>Occupation</th><th>Balance</th><th>Action</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["patientID"] . "</td>";
                    echo "<td>" . $row["patientFirstName"] . "</td>";
                    echo "<td>" . $row["patientLastName"] . "</td>";
                    echo "<td>" . $row["patientAge"] . "</td>";
                    echo "<td>" . $row["patientSex"] . "</td>";
                    echo "<td>" . $row["patientMobileNo"] . "</td>";
                    echo "<td>" . $row["patientEmail"] . "</td>";
                    echo "<td>" . $row["patientAddress"] . "</td>";
                    echo "<td>" . $row["patientOccupation"] . "</td>";
                    echo "<td>" . $row["patientBalance"] . "</td>";

                    //update and delete buttons
                    echo "<td>
                                <form action='appointmentRequestUpdate.php' method='post'>
                                    <input type='hidden' name='requestID' value='{$row['patientID']}'>
                                    <button type='submit'>Update</button>
                                </form>

                                <form action='delete.php' method='post'>
                                    <input type='hidden' name='requestID' value='{$row['patientID']}'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>";
                    echo "</tr>";
                    
                    }
                    
                    echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
