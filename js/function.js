function appoint(userType) {
    var action;

    switch (userType) {
        case "donor":
            action = "donor_appointment.php";
            break;
        case "hospital":
            alert("Hospitals Cannot Make Appointment !!!");
            break;
        case "admin":
            alert("Hospitals Cannot Make Appointment !!!");
            break;
        default:
            action = "guest_appointment.php";
            break;
    }

    window.location.href = action;
}

function panel(userType) {
    var profileLink;

    switch (userType) {
        case "donor":
            profileLink = "donor_panel.php";
            break;
        case "hospital":
            profileLink = "hospital_panel.php";
            break;
        case "admin":
            profileLink = "admin_panel.php";
            break;
        default:
            profileLink = "donor_login.php";
            break;
    }

      window.location.href = profileLink;
}

function verifyAgeOnChange() {
    var dob = new Date(document.getElementById("dob").value);
    var today = new Date();
    var minDob = new Date();
    minDob.setFullYear(minDob.getFullYear() - 18);

    if (dob > minDob) {
      alert("Age verification failed. User must be at least 18 years old.");
      document.getElementById("dob").value = ""; 
    } else {
      alert("Age verified. User is 18 years or older.");
    }
  }

  function validateAppointment() {
    var howLong = parseInt(document.getElementById("how-long").value);
    
    if (howLong < 120) {
      alert("Cannot make appointment. Duration must be at least 120 days.");
      document.getElementById("how-long").value = ''; 
    }
  }
  function validateDate() {
    var selectedDate = new Date(document.getElementById("date").value);
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1); 
    if (selectedDate < tomorrow) {
      alert("Cannot make appointment for today or past dates. Please select a date from tomorrow onwards.");
      document.getElementById("date").value = ''; 
    }
  }