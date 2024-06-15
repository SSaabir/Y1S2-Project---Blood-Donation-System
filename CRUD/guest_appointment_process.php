<?php
require 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Salutation = $_POST["people"];
    $F_name = $_POST["firstName"];
    $L_name = $_POST["lastName"];
    $NIC = $_POST["Nic"];
    $DOB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $Blood_Group = $_POST["bloodgroup"];
    $Email = $_POST["Email"];

    $sql = "INSERT INTO guest (Salutation, F_name, L_name, NIC, DOB, Gender, Blood_Group, Email) VALUES ('$Salutation', '$F_name', '$L_name', '$NIC', '$DOB', '$Gender', '$Blood_Group', '$Email')";


    if ($conn->query($sql) === TRUE) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $HospitalName = $_POST["hname"];
            $Date = $_POST["date"];
            $Time = $_POST["time"];
            $Meridiem = $_POST["meridiem"];

            $stmt2 = $conn->query("SELECT Hospital_id FROM hospital WHERE H_Name = '$HospitalName'");
            if ($stmt2) {
                $row = $stmt2->fetch_assoc();
                $H_id = $row["Hospital_id"];

               
                $result3 = $conn->query("SELECT MAX(Guest_id) AS max_guest_id FROM guest");
                $row3 = $result3->fetch_assoc();
                $G_id = $row3["max_guest_id"];

               
                $sql = "INSERT INTO appointment (A_Guest_id, A_Date, A_Time, A_Meridiem, A_Hospital_id) VALUES ('$G_id', '$Date', '$Time', '$Meridiem', '$H_id')";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Hospital not found.";
            }
        }
        echo '<script>';
        echo 'alert("Appointment Successfully !!");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
        exit();
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
