<?php

$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($conn->connect_error) {
    die("Connection falied" . $conn->connect_error);
} else {
    }
