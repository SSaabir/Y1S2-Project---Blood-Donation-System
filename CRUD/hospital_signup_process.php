<?php
include 'dbh.crud.php';

function validatePassword($password)
{
      return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hospitalName = $_POST["name"];
    $number = $_POST["tel_no"];
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

    $sql = "INSERT INTO hospital (H_Name, Tel_no, Email, Line1, City, Postal_Code, Country, H_Password) VALUES ('$hospitalName', '$number', '$email', '$line1', '$city', '$postalCode', '$country', '$password')";


    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Profile Created Successfully !!")</script>';
        header("Location: ../hospital_login.php");
        exit();
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
