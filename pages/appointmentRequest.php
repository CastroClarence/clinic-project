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
  $sql = "SELECT requests.requestID, requests.patientID, patients.patientFirstName, patients.patientLastName, patients.patientStatus, requests.requestDate, requests.requestTime, requests.requestStatus
          FROM requests
          LEFT JOIN patients ON requests.patientID = patients.patientID
          WHERE requests.requestStatus ='Pending'";

  //search if search not empty
  if (!empty($searchKeyword)) {
      $sql .= " WHERE patients.patientFirstName LIKE '%$searchKeyword%' OR patients.patientLastName LIKE '%$searchKeyword%' OR requests.requestID LIKE '%$searchKeyword%' OR requests.patientID LIKE '%$searchKeyword%' OR requests.requestDate LIKE '%$searchKeyword%' OR requests.requestTime LIKE '%$searchKeyword%'";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">
        <?php include('sidebar.php'); ?>     
      <div class="table-container">
        <h1 class="header">Appointment Request</h1>

        
        <div id="reqTbl">

          <div id="search-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <i class="fas fa-search"></i>
              <input type="text" name="searchKeyword" value="<?php echo $searchKeyword; ?>" placeholder="  Search">
            </form>
          </div>

          <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Request ID</th><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Patient Status</th><th>Date</th><th>Time</th><th>Appointment Status</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["requestID"] . "</td>";
                  echo "<td>" . $row["patientID"] . "</td>";
                  echo "<td>" . $row["patientFirstName"] . "</td>";
                  echo "<td>" . $row["patientLastName"] . "</td>";
                  echo "<td>" . $row["patientStatus"] . "</td>";
                  echo "<td>" . $row["requestDate"] . "</td>";
                  echo "<td>" . $row["requestTime"] . "</td>";

                  echo "<td>";
                  if ($row["requestStatus"] == "Pending") {
                      echo "<div class='action-buttons'>
                            <form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <input type='hidden' name='newStatus' value='Approved'>
                                <button type='submit' name='approve'><i class='fas fa-check-square'></i></button>
                            </form>";
                      if ($row["patientStatus"] != "Verified") {
                        echo "<input type='hidden' name='newPatientStatus' value='Verified'>";
                      }


                      echo "<form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <input type='hidden' name='newStatus' value='Declined'>
                                <button type='submit' name='decline'><i class='fas fa-times-circle'></i></button>
                              </form>";

                      if ($row["patientStatus"] == "Verified") {
                        echo "<input type='hidden' name='deletePatientRecord' value='true'>";
                      }
                      echo "</div>";

                  } else {
                      echo $row["requestStatus"];
                  }
                  echo "</td>";
                  //echo "<td>" . $row["requestStatus"] . "</td>";

                  //update and delete buttons
                  echo "<td>
                          <div class='action-buttons'>
                            <form action='appointmentRequestUpdate.php' method='post'>
                                <input type='hidden' name='requestID' value='{$row['requestID']}'>
                                <input type='hidden' name='requestStatus' value='{$row['requestStatus']}'>
                                <button type='submit'><i class='fas fa-edit'></i></button>
                            </form>
                        </td>";
                  echo "</tr>";
                  
                }
                echo "</div>";
                
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