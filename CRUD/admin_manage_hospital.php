<?php
require 'dbh.crud.php';

$ID = $_SESSION["userID"];

if (isset($_POST["Approved"]) && isset($_POST['HospitalID'])) {
    $HospitalID = $_POST['HospitalID'];
    $query = "UPDATE hospital SET hospital.Status='1',H_Admin_id='$ID' WHERE Hospital_id=$HospitalID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Hospital Approved Successfully!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else if (isset($_POST["Declined"]) && isset($_POST['HospitalID'])) {
    $HospitalID = $_POST['HospitalID'];
    $query = "UPDATE hospital SET hospital.Status='0',H_Admin_id='$ID' WHERE Hospital_id=$HospitalID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Hospital is Cancelled!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT *,
CONCAT(hospital.Line1,', ',hospital.City,', ',hospital.Postal_Code,', ',hospital.Country) AS Adds
          FROM hospital
          WHERE hospital.Status is NULL";
$result_hospitals = mysqli_query($conn, $query);

if (!$result_hospitals) {
     die('Error: ' . mysqli_error($conn));
}
