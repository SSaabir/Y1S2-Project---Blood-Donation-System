<?php
require 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Cancel'])) {
    $AppointDelete = $_POST['AppointmentID'];

    $AppointDelete = "DELETE FROM appointment WHERE Appointment_id = $AppointDelete";
    if (mysqli_query($conn, $AppointDelete)) {
        echo '<script>alert("Record Deleted Successfully !!")</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$query = "SELECT *, 
          CONCAT(appointment.A_Time, ' ', appointment.A_meridiem) AS ATM, 
          hospital.H_Name AS HospitalName
          FROM appointment
          LEFT JOIN hospital ON appointment.A_Hospital_id = hospital.Hospital_id
          WHERE A_Donor_id=$_SESSION[userID] AND appointment.Status IS NULL ";
$result_appointments = mysqli_query($conn, $query);

if (!$result_appointments) {
   die('Error: ' . mysqli_error($conn));
}
