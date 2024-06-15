<?php
require 'header.php';
include 'CRUD/edit_camp_process.php';

if (isset($_GET['Camp_id'])) {

    $CampID = $_GET['Camp_id'];

    $query = "SELECT *,
    CONCAT(camp.C_Time,' ',C_Meridiem) AS ATM
     FROM camp WHERE Camp_id='$CampID'";
    $result_camp = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result_camp);

    $CampName = $row['C_Name'];
    $LedBy = $row['Led_By'];
    $line1 = $row['Line1'];
    $city = $row['City'];
    $postalCode = $row['Postal_Code'];
    $country = $row['Country'];
    $Date = $row['C_Date'];
    $Time = $row['ATM'];


    if (!$result_camp) {

        die('Error: ' . mysqli_error($conn));
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/edit_camp.css">

    </head>

    <body>
        <center>
            <div class="Camp">
                <h1 class="form-title"> <?php echo $CampName; ?></h1><br>
                <h1 class="form-title"> <?php echo $Date . ' ' . $Time; ?> </h1>
                <br>
                <hr>
                <form method="post" action="CRUD/edit_camp_process.php">
                    <div class="main-user-info">
                        <div class="user-input-box">
                            <label for="full name">Full Name</label>
                            <input type="text" id="fullName" name="name" value="<?php echo $CampName; ?>" />
                        </div>
                        <div class="user-input-box">
                            <label for="led by dr.">Led by Dr.</label>
                            <input type="text" id="led by dr." name="ledby" value="<?php echo $LedBy; ?>" />
                        </div>
                        <div class="user-input-box">
                            <label for="address">Line 1</label>
                            <input type="text" id="address" name="line1" value="<?php echo $line1; ?>" />
                        </div>
                        <div class="user-input-box">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="<?php echo $city; ?>" />
                        </div>
                        <div class="user-input-box">
                            <label for="postel code">Postel Code</label>
                            <input type="text" id="postel code" name="postal_code" value="<?php echo $postalCode; ?>" />
                        </div>

                        <div class="user-input-box">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" value="<?php echo $country; ?>" placeholder="Enter your country" />



                        </div>
                        <div class="form-submit-btn">
                            <input type="hidden" name="Camp_id" value="<?php echo $CampID ?>">
                            <input type="submit" name="submit" value="Update">
                        </div>
                </form>

            </div>
        </center>

    </body>
<?php
} else {
    echo "Camp ID not provided in the URL";
}
require 'footer.php';
?>

    </html>