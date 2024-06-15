<?php
include 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $AdminID = $_SESSION['userID'];
    $Email = $_POST["email"];
    $Phone = $_POST["number"];


    $sql = "UPDATE admin SET Email='$Email', Phone_no='$Phone' WHERE Admin_id = $AdminID  ";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "../admin_panel.php";';
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function validatePassword($Password)
{
     return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $Password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {


    $HospitalID = $_SESSION['userID'];
    $Password = $_POST["password"];
    $cPassword = $_POST["cPassword"];

    if (!validatePassword($Password)) {
        die("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
    }

    if ($Password !== $cPassword) {
        die("Passwords do not match.");
    }

    $sql = "UPDATE admin SET A_Password='$Password' WHERE Admin_id='$AdminID'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "../admin_panel.php";';
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
