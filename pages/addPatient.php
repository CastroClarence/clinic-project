<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("../phpFiles/dbConnect.php");
  session_start();


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  // Collect form data
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $mobileNumber = $_POST["mobileNumber"];
  $age = $_POST["Age"];
  $sex = $_POST["s-select"];
  $occupation = $_POST["occupation"];
  $email = $_POST["email"];
  $homeAddress = $_POST["homeAddress"];
  $patientBalance = $_POST["patientBalance"];

  $sql = "INSERT INTO patients (patientFirstName, patientLastName, patientMobileNo, patientAge, patientSex, patientOccupation, patientEmail, patientAddress, patientBalance)
            VALUES ('$firstName', '$lastName', '$mobileNumber', '$age', '$sex', '$occupation', '$email', '$homeAddress', '$patientBalance')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
  }
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Dashboard</title>
      <link rel="stylesheet" href="../styles/addPatient.css" />
    </head>
    <body>
      <div class="container">
            <?php include('sidebar.php'); ?>
            <div class="form_container">
            <h1 class="form-title">Add Patient</h1>
            <form method="post" action="#">
              <div class="main-user-info">
                <div class="user-input-box">
                  <label for="firstName">First Name: </label>
                  <input type="text"
                          id="firstName"
                          name="firstName"
                          placeholder="Enter First Name"/>
                </div>

                <div class="user-input-box">
                  <label for="lastName">Last Name: </label>
                  <input type="text"
                          id="lastName"
                          name="lastName"
                          placeholder="Enter Last Name"/>
                </div>

                <div class="user-input-box">
                  <label for="mobileNumber">Mobile Number: </label>
                  <input type="text"
                          id="mobileNumber"
                          name="mobileNumber"
                          placeholder="Enter Mobile Number"/>
                </div>

                <div class="user-input-box">
                  <label for="Age">Age: </label>
                  <input type="number"
                          id="Age"
                          name="Age"
                          placeholder="Enter Age"/>
                </div>

                <div class="sex-selection">
                  <label for="sex">Sex: </label>
                          <select name="s-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                          </select>
                </div>

                <div class="user-input-box">
                  <label for="occupation">Occupation: </label>
                  <input type="text"
                          id="occupation"
                          name="occupation"
                          placeholder="Enter Occupation"/>
                </div>

                <div class="user-input-box">
                  <label for="email">Email: </label>
                  <input type="text"
                          id="email"
                          name="email"
                          placeholder="Enter Email"/>
                </div>
                
                <div class="user-input-box">
                  <label for="homeAddress">Home Address: </label>
                  <input type="text"
                          id="homeAddress"
                          name="homeAddress"
                          placeholder="Enter Home Address"/>
                </div>

                <div class="user-input-box">
                  <label for="patientBalance">Balance: </label>
                  <input type="number"
                          id="patientBalance"
                          name="patientBalance"
                          placeholder="Enter Balance"
                          value="0.00" readonly/>
                </div>
            </form>
            <div class="form-submit-btn">
              <input type="submit" value="Add">
            </div>
          </div>
        </div>
    </body>
  </html>
