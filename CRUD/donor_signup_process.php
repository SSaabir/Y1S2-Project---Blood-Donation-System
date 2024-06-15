<?php
include 'dbh.crud.php';

function validatePassword($password)
{
     return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Salutation = $_POST["sal"];
    $F_name = $_POST["fname"];
    $L_name = $_POST["lname"];
    $NIC = $_POST["nic"];
    $DOB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $number = $_POST["phone"];
    $Blood_Group = $_POST["blood-group"];
    $email = $_POST["email"];
    $line1 = $_POST["line1"];
    $city = $_POST["city"];
    $postalCode = $_POST["postal_code"];
    $country = $_POST["country"];
    $password = $_POST["password"];
    $cPassword = $_POST["cPassword"];
    $terms = isset($_POST["terms"]) ? $_POST["terms"] : '';


    if (!validatePassword($password)) {
        die("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
    }

    if ($password !== $cPassword) {
        die("Passwords do not match.");
    }


    if (!$terms) {
        die("Please agree to the Terms & Privacy Policy.");
    }

    $sql = "INSERT INTO donor (Salutation, F_Name, L_Name, NIC, DOB, Gender, Phone_no, Blood_Group, Email, Line1, City, Postal_Code, Country, D_Password) VALUES ('$Salutation', '$F_name', '$L_name', '$NIC', '$DOB', '$Gender', '$number', '$Blood_Group', '$email', '$line1', '$city', '$postalCode', '$country', '$password')";


    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Profile Created Successfully !!")</script>';
        header("Location: ../donor_login.php");
        exit();
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
