<?php
include 'dbh.crud.php';

function validatePassword($password)
{
    return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $U_name = $_POST["Uname"];
    $NIC = $_POST["nic"];
    $DOB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $number = $_POST["phone"];
    $email = $_POST["email"];
    $Passkey = $_POST["passkey"];
    $password = $_POST["password"];
    $cPassword = $_POST["cPassword"];
    $terms = $_POST["terms"];



    if (!validatePassword($password)) {
        die("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
    }


    if ($password !== $cPassword) {
        die("Passwords do not match.");
    }


    if (!$terms) {
        die("Please agree to the Terms & Privacy Policy.");
    }

    $sql = "INSERT INTO admin (Username, NIC, DOB, Gender, Phone_no, Email, Passkey, A_Password) VALUES ('$U_name', '$NIC', '$DOB', '$Gender', '$number', '$email', '$Passkey', '$password')";

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
