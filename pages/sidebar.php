<head>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" type="text/css" href="../styles/sidebar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../scripts/activeSidebar.js" defer></script> 
</head>

<nav>
    <div class="logo">
        <img src="../images/logoDashboard.png">
        <span class="nav-item">Dra. Ruth Luneta-Alolod<br>Dental Clinic</span>
    </div>
    <b></b>
    <ul class="menu">
        <li>
            <a href="dashboard.php" class="dashboard" >
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="appointmentRequest.php" class="app_request">
                <i class="fas fa-calendar-check"></i>
                <span>Appointment Request</span>
            </a>
        </li>
        <li>
            <a href="patientRecord.php" class="patient_record">
                <i class="fa-solid fa-file-medical"></i>
                <span>Patient Record</span>
            </a>
        </li>
        <li>
            <a href="#" class="treatment_record">
                <i class="fas fa-clipboard"></i>
                <span>Treatment Record</span>
            </a>
    </li>
        <li>

            <a href="calendarAppointment.php" class="display_calendar">
                <i class="fas fa-calendar"></i>
                <span>Calendar</span>
            </a>
        </li>
        <li class="logout">
            <a href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</nav>
