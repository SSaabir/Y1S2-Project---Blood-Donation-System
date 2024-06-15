<?php
include 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $CampName = $_POST["name"];
    $LedBy = $_POST["ledby"];
    $line1 = $_POST["line1"];
    $city = $_POST["city"];
    $postalCode = $_POST["postal_code"];
    $country = $_POST["country"];
    $Date = $_POST["date"];
    $Time = $_POST["time"];
    $Meridiem = $_POST["meridiem"];
    $H_ID = $_SESSION["userID"];

    $sql = "INSERT INTO camp (C_Name, C_Date, C_Time, C_Meridiem, Led_By, Line1, City, Postal_Code, Country, C_Hospital_id) values ('$CampName','$Date','$Time','$Meridiem','$LedBy','$line1','$city','$postalCode','$Country','$H_ID')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Camp Added Successfully !!");';
        echo 'window.location.href = "../hospital_panel.php";'; 
        echo '</script>';
        exit();
    } else {

        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
