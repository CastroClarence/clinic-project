<?php
  include("../phpFiles/dbConnect.php");
  session_start();
  
 // Initialize variables to store search criteria
  $searchKeyword = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Handle form submission
      $searchKeyword = $_POST["searchKeyword"];
  }

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //normal function
  $sql = "SELECT requests.requestID, requests.patientID, patients.patientFirstName, patients.patientLastName, requests.serviceID, requests.requestDate, requests.requestTime, requests.requestStatus
          FROM requests
          LEFT JOIN patients ON requests.patientID = patients.patientID";

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
    <link rel="stylesheet" href="../styles/nav&header.css">

</head>
<body>

  <div class="container">

    <nav>

      <ul>

        <li>
          <a href="#" class="logo">
          <img src="../images/logoDashboard.png">
            <span class="nav-item">Dra. Ruth Luneta-Alolod
            <br>Dental Clinic</span>
          </a>
        </li>

        <li>
          <a href="staffDashboard.html">
            <i class="fas fa-house-user"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>

        <li>
          <a href="addPatient.html">
            <i class="fas fa-user-plus"></i>
            <span class="nav-item">Add Patient</span>
          </a>
        </li>

        <li>
          <a href="appointmentRequest.html">
            <i class="fas fa-calendar-check"></i>
            <span class="nav-item">Appointment Request </span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fas fa-laptop-medical"></i>
            <span class="nav-item">Patient Record</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fas fa-clipboard"></i>
            <span class="nav-item">Treatment Record</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fas fa-calendar"></i>
            <span class="nav-item">Calendar</span>
          </a>
        </li>
    
        <li>
          <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>

      </ul>

      </nav>
      
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
                echo "<tr><th>Request ID</th><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Service ID</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["requestID"] . "</td>";
                  echo "<td>" . $row["patientID"] . "</td>";
                  echo "<td>" . $row["patientFirstName"] . "</td>";
                  echo "<td>" . $row["patientLastName"] . "</td>";
                  echo "<td>" . $row["serviceID"] . "</td>";
                  echo "<td>" . $row["requestDate"] . "</td>";
                  echo "<td>" . $row["requestTime"] . "</td>";
                  echo "<td>" . $row["requestStatus"] . "</td>";

                  //update and delete buttons
                  echo "<td>";
                  echo "<a href='update.php?requestID=" . $row["requestID"] . "'>Update</a>";
                  echo " ";
                  echo "<a href='delete.php?requestID=" . $row["requestID"] . "'>Delete</a>";
                  echo "</td>";
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