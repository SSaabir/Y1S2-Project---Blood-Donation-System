<?php
require 'header.php';
include 'CRUD/edit_admin_process.php';


$query = "SELECT *
     FROM admin 
     WHERE Admin_id='$_SESSION[userID]'";
$result_admin = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result_admin);
$Email = $row['Email'];
$Phone = $row['Phone_no'];
$Password = $row['A_Password'];

if (!$result_admin) {
    die('Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/admin_edit.css" />
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
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $Email; ?>">
                </div>
                <div class="one">
                    <label for="phone">Phone Number: </label>
                    <input type="text" name="number" value="<?php echo $Phone; ?>">
                </div>
            </div>

            <input type="hidden" name="AdminID" value="<?php echo $_SESSION['userID'] ?>">
            <input class="update" type="submit" name="update" value="Update">
        </form>
        <br>
        <hr>
        <br>
        <form method="post" onsubmit="return validateForm()">
            <div class="sec2">
                <div class="sec">
                    <label for="password">New Password: </label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="sec">
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