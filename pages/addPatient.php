<?php
  include("../pages/login.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("../phpFiles/dbConnect.php");


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
        $conn->close();
        header('location: patientRecord.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <!-- <link rel="stylesheet" href="../styles/addPatient.css" /> -->
      <link rel="stylesheet" href="../styles/requestUpdate.css">
      <?php include('header.php'); ?>
    </head>
    <body>
      <div class="am-container">
            <div class="am-body">
              <div class="am-head">
                <h1 class="form-title">Add Patient</h1>
              </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="add-form" class="am-body-box" >
            <a href="patientRecord.php"><i class="fas fa-arrow-alt-circle-left"></i></a>

              <div class="am-row">
                <div class="am-col-6">
                  <label for="firstName">First Name: </label>
                  <input type="text"
                          id="firstName"
                          name="firstName"
                          placeholder="Enter First Name"/>
                </div>

                <div class="am-col-6">
                  <label for="lastName">Last Name: </label>
                  <input type="text"
                          id="lastName"
                          name="lastName"
                          placeholder="Enter Last Name"/>
                </div>
              </div>

              <div class="am-row">
                <div class="am-col-6">
                  <label for="mobileNumber">Mobile Number: </label>
                  <input type="text"
                          id="mobileNumber"
                          name="mobileNumber"
                          placeholder="Enter Mobile Number"/>
                </div>

                <div class="am-col-6">
                  <label for="Age">Age: </label>
                  <input type="number"
                          id="Age"
                          name="Age"
                          placeholder="Enter Age"/>
                </div>
              </div>

              <div class="am-row">
                <div class="sex-selection am-col-6">
                  <label for="sex">Sex: </label>
                          <select name="s-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                          </select>
                </div>

                <div class="am-col-6">
                  <label for="occupation">Occupation: </label>
                  <input type="text"
                          id="occupation"
                          name="occupation"
                          placeholder="Enter Occupation"/>
                </div>
              </div>

              <div class="am-row">
                <div class="am-col-6">
                  <label for="email">Email: </label>
                  <input type="text"
                          id="email"
                          name="email"
                          placeholder="Enter Email"/>
                </div>
                
                <div class="am-col-6">
                  <label for="homeAddress">Home Address: </label>
                  <input type="text"
                          id="homeAddress"
                          name="homeAddress"
                          placeholder="Enter Home Address"/>
                </div>
              </div>

              <div class="am-row">
                <div class="am-col-6">
                  <label for="patientBalance">Balance: </label>
                  <input type="number"
                          id="patientBalance"
                          name="patientBalance"
                          placeholder="Enter Balance"
                          value="0.00" readonly/>
                </div>
              </div>

              <div class="am-row">
                <div class="form-submit-btn am-col-3">
                  <button type="submit" id="submit-btn">Add Patient Record</button>
                </div>
              </div>
            </form>
            <script>
                insertAlert('submit-btn', 'add-form');
            </script>
            
            <div class="am-footer">
                    <p>Dra. Ruth Luneta-Alolod Dental Clinic</p>
            </div>
        </div>
    </body>
  </html>
