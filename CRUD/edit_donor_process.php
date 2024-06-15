<?php
include 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $DonorID = $_SESSION['userID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Line1 = $_POST['line1'];
    $city = $_POST['city'];
    $postalCode = $_POST['pcode'];
    $country = $_POST['country'];



    $sql = "UPDATE donor SET F_name='$Fname',L_name='$Lname',  Email='$Email', Phone_no='$Phone', Line1='$Line1', City='$city',Postal_Code='$postalCode',Country='$country' WHERE Donor_id = $DonorID  ";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "../Donor_panel.php";';
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function validatePassword($Password)
{
    // Password must contain at least 8 characters including one uppercase letter, one special character, and one digit
    return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $Password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {


    $DonorID = $_SESSION['userID'];
    $Password = $_POST["password"];
    $cPassword = $_POST["cPassword"];

    if (!validatePassword($Password)) {
        die("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
    }

    if ($Password !== $cPassword) {
        die("Passwords do not match.");
    }

    $sql = "UPDATE donor SET D_Password='$Password' WHERE Donor_id='$DonorID'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "../Donor_panel.php";';
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
