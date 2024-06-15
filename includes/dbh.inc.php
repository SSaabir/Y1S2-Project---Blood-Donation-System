<?php

$con = new mysqli("localhost", "root", "", "blood_donation");

if ($con->connect_error) {
    die("Connection falied" . $con->connect_error);
} else {
    
}
