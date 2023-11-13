<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Calendar</title>
      <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
      <link rel="stylesheet" href="../styles/staffDashboard.css" />
      <link rel="stylesheet" href="../styles/calendarAppointment.css" />
      <link rel="stylesheet" href="../styles/calendarDisplay.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
      <div class="container">
        <nav>
          <ul>
            <li><a href="#" class="logo">
              <img src="../images/logoDashboard.png">
              <span class="nav-item">Dra. Ruth Luneta-Alolod
                <br>Dental Clinic</span>
            </a></li>
            <li><a href="staffDashboard.html">
                <i class="fas fa-house-user"></i>
              <span class="nav-item">Home</span>
            </a></li>
            <li><a href="addPatient.html">
                <i class="fas fa-user-plus"></i>
              <span class="nav-item">Add Patient</span>
            </a></li>
            <li><a href="#">
                <i class="fas fa-calendar-check"></i>
              <span class="nav-item">Appointment 
                Request </span>
            </a></li>
            <li><a href="#">
                <i class="fas fa-laptop-medical"></i>
              <span class="nav-item">Patient Record</span>
            </a></li>
            <li><a href="#">
                <i class="fas fa-clipboard"></i>
              <span class="nav-item">Treatment Record</span>
            </a></li>
            <li><a href="#">
                <i class="fas fa-calendar"></i>
                <span class="nav-item">Calendar</span>
              </a></li>

            <li><a href="#" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>
        <div class="main">
          <div class = "titleCont">
            <h1>Calendar</h1>
          </div>  
          <div class = "mainCont">
              <div class = "contianer">
                <div class="calendar">
                  <div class="calendar-header">
                    <span class="month-picker" id="month-picker"> May </span>
                    <div class="year-picker" id="year-picker">
                      <span class="year-change" id="pre-year">
                        <pre><</pre>
                      </span>
                      <span id="year">2020 </span>
                      <span class="year-change" id="next-year">
                        <pre>></pre>
                      </span>
                    </div>
                  </div>
          
                  <div class="calendar-body">
                    <div class="calendar-week-days">
                      <div>Sun</div>
                      <div>Mon</div>
                      <div>Tue</div>
                      <div>Wed</div>
                      <div>Thu</div>
                      <div>Fri</div>
                      <div>Sat</div>
                    </div>
                    <div class="calendar-days">
                    </div>
                  </div>
                  <div class="calendar-footer">
                  </div>
                  <div class="date-time-formate">
                    <div class="day-text-formate">TODAY</div>
                    <div class="date-time-value">
                      <div class="time-formate"></div>
                      <div class="date-formate"></div>
                    </div>
                  </div>
                  <div class="month-list"></div>
                </div>
              </div>

            <div class = "appointmentCont">
              <div class = "searchCont">
                <form action = "calendarAppointment.php" class = "datePicker" name = "datePicker" method = "post">
                  <label for = "inputDate" class = "labelDatePick">Choose Date:</label><br>
                  <input type = "date" min = "" id = "inputDate" name = "inputDate">
                  <input type = "submit" name = "dateSubmit" class = "dateSubmit" value = "SEARCH">
                </form>
              </div>
              <div class = "searchResult">
                <table class = "mainTbl" cellspacing = "0">
                  <tr>
                    <th class="head">Request ID</th>
                    <th class="head">Patient ID</th>
                    <th class="head">Service ID</th>
                    <th class="head">Appointment Date</th>
                    <th class="head">Appointment Time</th>
                   </tr>
                </table>
              </div>
            </div>
          </div>  
        </div>
      </div>

      <script src ="../scripts/calendarDisplay.js"></script>
      <script src ="../scripts/dateToday.js"></script>
    </body>
   
  </html>
    