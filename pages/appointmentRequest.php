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
  $sql = "SELECT requests.requestID, requests.patientID, patients.patientFirstName, patients.patientLastName, requests.requestDate, requests.requestTime, requests.requestStatus
          FROM requests
          LEFT JOIN patients ON requests.patientID = patients.patientID";

  //search if search not empty
  if (!empty($searchKeyword)) {
      $sql .= " WHERE patients.patientFirstName LIKE '%$searchKeyword%' OR patients.patientLastName LIKE '%$searchKeyword%' OR requests.requestID LIKE '%$searchKeyword%' OR requests.patientID LIKE '%$searchKeyword%' OR requests.requestDate LIKE '%$searchKeyword%' OR requests.requestTime LIKE '%$searchKeyword%' OR requests.requestStatus LIKE '%$searchKeyword%'";
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
                echo "<tr><th>Request ID</th><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["requestID"] . "</td>";
                  echo "<td>" . $row["patientID"] . "</td>";
                  echo "<td>" . $row["patientFirstName"] . "</td>";
                  echo "<td>" . $row["patientLastName"] . "</td>";
                  echo "<td>" . $row["requestDate"] . "</td>";
                  echo "<td>" . $row["requestTime"] . "</td>";

                  echo "<td>";
                  if ($row["requestStatus"] == "Pending") {
                      echo "<form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <button type='submit' name='approve'>Approve</button>
                              </form>";

                      echo "<form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <button type='submit' name='decline'>Decline</button>
                              </form>";
                  } else {
                      echo $row["requestStatus"];
                  }
                  echo "</td>";
                  //echo "<td>" . $row["requestStatus"] . "</td>";

                  //update and delete buttons
                  echo "<td>
                            <form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <button type='submit'>Update</button>
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
