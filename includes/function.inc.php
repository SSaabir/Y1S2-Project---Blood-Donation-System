<?php
include 'dbh.inc.php';


function donorLogin($con, $email, $password)
{
    $query = "SELECT * FROM donor WHERE Email='$email' AND D_Password='$password'";
    $result = $con->query($query);

    if ($result && $result->num_rows == 1) {
        $row =  $result->fetch_assoc();
        $_SESSION["userType"] = "donor";
        $_SESSION["userID"] = $row["Donor_id"];
        $_SESSION["username"] = $row["Salutation"] . " " . $row["F_name"] . " " . $row["L_name"];
        $_SESSION["email"] = $row["Email"];
        header("Location: donor_panel.php");
        exit();
    } else {
        echo '<script>';
        echo 'alert("Invalid Login Credentials")';
        echo '</script>';
        return false;
    }
}


function hospitalLogin($con, $email, $password)
{

    $query = "SELECT * FROM hospital WHERE Email='$email' AND H_Password='$password' AND Status=1";
    $result = $con->query($query);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["userType"] = "hospital";
        $_SESSION["userID"] = $row["Hospital_id"];
        $_SESSION["username"] = $row["H_Name"];
        $_SESSION["email"] = $row["Email"];
        header("Location: hospital_panel.php");
        exit();
    } else {
        echo '<script>';
        echo 'alert("Invalid Login Credentials")';
        echo '</script>';
        return false;
    }
}



function adminLogin($con, $UName, $password, $passKey)
{
    $query = "SELECT * FROM admin WHERE Username='$UName' AND Passkey='$passKey' AND A_Password='$password'";
    $result = $con->query($query);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["userType"] = "admin";
        $_SESSION["userID"] = $row["Admin_id"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["email"] = $row["Email"];
        header("Location: admin_panel.php");
        exit();
    } else {
        echo '<script>';
        echo 'alert("Invalid Login Credentials")';
        echo '</script>';
        return false;
    }
}
