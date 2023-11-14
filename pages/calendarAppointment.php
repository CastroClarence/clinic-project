<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Calendar</title>
      <link rel="stylesheet" href="../styles/calendarAppointment.css" />
      <link rel="stylesheet" href="../styles/calendarDisplay.css" />
    </head>
    <body>
        <div class="container">
            <?php include('sidebar.php'); ?>
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
    
