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
            <form action="#">
              <div class="main-user-info">
                <div class="user-input-box">
                  <label for="fullName">Full Name: </label>
                  <input type="text"
                          id="fullName"
                          name="fullName"
placeholder="Enter Full Name"/>
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
                  <input type="Age"
                          id="Age"
                          name="Age"
                          placeholder="Enter Age"/>
                </div>
                <div class="user-input-box">
                  <label for="sex">Sex: </label>
                  <input type="text"
                          id="sex"
                          name="sex"
                          placeholder="Enter Sex (Male/Female)"/>
                </div>
                <div class="user-input-box">
                  <label for="birthDate">Birth Date: </label>
                  <input type="text"
                          id="birthDate"
                          name="birthDate"
                          placeholder="Enter Birth Date"/>
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
            </form>
            <div class="form-submit-btn">
              <input type="submit" value="Add">
            </div>
          </div>
        </div>
    </body>
  </html>
