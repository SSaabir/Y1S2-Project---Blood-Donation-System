<?php
require 'dbh.crud.php';

$ID = $_SESSION["userID"];

if (isset($_POST["Approved"]) && isset($_POST['FeedbackID'])) {
    $FeedbackID = $_POST['FeedbackID'];
    $query = "UPDATE feedback SET feedback.Status='1',F_Admin_id='$ID' WHERE Feedback_id=$FeedbackID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Feedback Approved Successfully!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else if (isset($_POST["Declined"]) && isset($_POST['FeedbackID'])) {
    $FeedbackID = $_POST['FeedbackID'];
    $query = "UPDATE feedback SET feedback.Status='0',F_Admin_id='$ID' WHERE Feedback_id=$FeedbackID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script>alert("Feedback is Cancelled!")</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT *,
CONCAT(donor.Salutation,' ',donor.F_Name,' ',donor.L_Name) AS DonorName,
hospital.H_Name
          FROM feedback
          LEFT JOIN donor ON feedback.F_Donor_id = donor.Donor_id
          LEFT JOIN hospital ON feedback.F_Hospital_id = hospital.Hospital_id
          WHERE feedback.Status is NULL";
$result_feedbacks = mysqli_query($conn, $query);

if (!$result_feedbacks) {
    die('Error: ' . mysqli_error($conn));
}
