const pathName = window.location.pathname;
const pageName = pathName.split("/").pop();

if(pageName === "dashboard.php"){
    document.querySelector(".dashboard").classList.add("activeLink");
}

if(pageName === "addPatient.php"){
    document.querySelector(".add_patient").classList.add("activeLink");
}

if(pageName === "appointmentRequest.php"){
    document.querySelector(".app_request").classList.add("activeLink");
}

if(pageName === "patientRecord.php"){
    document.querySelector(".patient_record").classList.add("activeLink");
}

if(pageName === "#"){
    document.querySelector(".treatment_record").classList.add("activeLink");
}

if(pageName === "calendarAppointment.php"){
    document.querySelector(".display_calendar").classList.add("activeLink");
}
