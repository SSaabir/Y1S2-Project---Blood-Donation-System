<?php
session_start();


if (isset($_SESSION["userID"])) {

    $userType = $_SESSION["userType"];
} else {

    $userType = "guest";
}

?>

<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lifeline</title>
        <link rel="stylesheet" href="css/index.css" />
        <script src="js/function.js"></script>
    </head>

    <body>
        <header>
            <nav class="menu">
                <img class="logo" src="images/logo.png" alt="logo" />
                <a href="index.php" class="home">Home</a>
                <a href="feedback.php">Feedback</a>
                <a href="guide.php">Guide</a>
                <a href="locations.php">Locations</a>
                <a href="contactUs.php" class="Contact">Contact Us</a>
            </nav>
            <button class="appointment" onclick="appoint('<?php echo $userType; ?>')">
                Appointment
            </button>
            <img class="user" src="images/user.png" alt="user" onclick="panel('<?php echo $userType; ?>')" />

        </header>