<?php
require 'header.php';
include 'CRUD/edit_donor_process.php';


$query = "SELECT *
     FROM donor
     WHERE Donor_id='$_SESSION[userID]'";
$result_donor = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result_donor);
$Fname = $row['F_name'];
$Lname = $row['L_name'];
$Email = $row['Email'];
$Phone = $row['Phone_no'];
$Line1 = $row['Line1'];
$city = $row['City'];
$postalCode = $row['Postal_Code'];
$country = $row['Country'];
$Password = $row['D_Password'];

if (!$result_donor) {
    die('Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/donor_edit.css" />
</head>

<body>
    <main class="frame">
        <div class="sec1">
            <div class="row1">
                <div class="blue">
                    <?php
                    echo "<h2 class=\"blue\">" . $_SESSION['username'] . "</h2>";
                    ?></div>
                <div class="head">
                    <?php echo "<h5 class=\"head\">" . $_SESSION['email'] . "</h5>"; ?>
                </div>

            </div>
        </div>
        <br />
        <hr />
        <form method="post">
            <div class="sec1">
                <div class="one">
                    <label for="fname">First Name: </label>
                    <input type="text" name="fname" value="<?php echo $Fname; ?>">
                </div>
                <div class="one">
                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" value="<?php echo $Lname; ?>">
                </div>
            </div>
            <div class="sec2">
                <div class="two">
                    <label for="email">Email: </label>
                    <input type="text" name="email" value="<?php echo $Email; ?>">
                </div>
                <div class="two">
                    <label for="phone">Phone Number: </label>
                    <input type="text" name="phone" value="<?php echo $Phone; ?>">
                </div>
            </div>
            <div class="sec3">
                <div class="three">
                    <label for="email">Address <br> Line 1: </label>
                    <input type="text" name="line1" value="<?php echo $Line1; ?>">
                </div>
                <div class="three">
                    <label for="city">City: </label>
                    <input type="text" name="city" value="<?php echo $city; ?>">
                </div>
            </div>
            <div class="sec4">
                <div class="four">
                    <label for="pcode">Postal Code: </label>
                    <input type="text" name="pcode" value="<?php echo $postalCode; ?>">
                </div>
                <div class="four">
                    <label for="country">Country: </label>
                    <input type="text" name="country" value="<?php echo $country; ?>">
                </div>
            </div>

            <input type="hidden" name="DonorID" value="<?php echo $_SESSION['userID'] ?>">
            <input class="update" type="submit" name="update" value="Update">
        </form>
        <br>
        <hr>
        <br>
        <form method="post" onsubmit="return validateForm()">
            <div class="sec5">
                <div class="five">
                    <label for="password">New Password: </label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="five">
                    <label for="cPassword">Confirm Password: </label>
                    <input type="password" name="cPassword" id="cPassword">
                </div>
            </div>
            <input class="change" type="submit" name="change" value="Change">
        </form>
    </main>

    <script>
        function validateForm() {

            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("cPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                alert("Password must contain at least 8 characters including one uppercase letter, one special character, and one digit.");
                return false;
            }

            return true;
        }
    </script>
</body>
<?php
require 'footer.php';
?>

</html>