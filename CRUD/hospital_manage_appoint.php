<?php
require 'dbh.crud.php';

if (isset($_POST["Approved"])) {
    $AppointmentID = $_POST['AppointmentID'];
    $query = "UPDATE appointment SET appointment.Status='1' WHERE Appointment_id=$AppointmentID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Appointment Approved Successfully!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else if (isset($_POST["Declined"])) {
    $AppointmentID = $_POST['AppointmentID'];
    $query = "UPDATE appointment SET appointment.Status='0' WHERE Appointment_id=$AppointmentID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Appointment is Cancelled!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT appointment.Appointment_id, 
                 appointment.A_Date, 
                 CONCAT(appointment.A_Time, ' ', appointment.A_meridiem) AS ATM, 
                 appointment.A_Guest_id,
                 appointment.A_Hospital_id,
                 appointment.Status,
                 CONCAT(donor.Salutation, ' ', donor.F_name, ' ', donor.L_name) AS DonorName, 
                 donor.NIC AS DonorNIC, 
                 donor.Blood_Group AS DonorBloodgroup,  
                 donor.Email AS DonorEmail,
                 CONCAT(guest.Salutation, ' ', guest.F_name, ' ', guest.L_name) AS GuestName, 
                 guest.NIC AS GuestNIC, 
                 guest.Blood_Group AS GuestBloodgroup,  
                 guest.Email AS GuestEmail
          FROM appointment
          LEFT JOIN donor ON appointment.A_Donor_id = donor.Donor_id
          LEFT JOIN guest ON appointment.A_Guest_id = guest.Guest_id
          WHERE A_Hospital_id=$_SESSION[userID] AND appointment.Status is NULL";
$result_appointments = mysqli_query($conn, $query);

if (!$result_appointments) {
    
    die('Error: ' . mysqli_error($conn));
}
