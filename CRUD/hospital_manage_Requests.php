<?php
require 'dbh.crud.php';

if (isset($_POST['Caancel'])) {
    $ID = $_POST['EB_id'];
    $query = "DELETE FROM emergency_blood WHERE EB_id = $ID";
    $Requestt = mysqli_query($conn, $query);
    if ($Requestt) {
        echo '<script>alert("Request Deleted Successfully !!")</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_POST['Post'])) {
    $HID = $_SESSION["userID"];
    $BG = $_POST["bloodgroup"];
    $query = "INSERT INTO emergency_blood (Blood_Group,EB_Hospital_id) VALUES ('$BG',$HID)";
    $posed = mysqli_query($conn, $query);
    if ($posed) {
        echo '<script>alert("Request Posted Successfully !!")</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM emergency_blood WHERE EB_Hospital_id=$_SESSION[userID]";
$result_requests = mysqli_query($conn, $query);

if (!$result_requests) {
 
    die('Error: ' . mysqli_error($conn));
}
