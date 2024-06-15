<?php
include 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $CampIDtoUpdate = $_POST["Camp_id"];
    $CampName = $_POST["name"];
    $LedBy = $_POST["ledby"];
    $line1 = $_POST["line1"];
    $city = $_POST["city"];
    $postalCode = $_POST["postal_code"];
    $country = $_POST["country"];

    $sql = "UPDATE camp SET C_Name='$CampName', Led_By='$LedBy', Line1='$line1', City='$city', Postal_Code='$postalCode', Country='$country' WHERE Camp_id='$CampIDtoUpdate'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record Updated Successfully !!");';
        echo 'window.location.href = "../hospital_panel.php";'; 
        echo '</script>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
