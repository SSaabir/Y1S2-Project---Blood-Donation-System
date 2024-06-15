<!--Your name-->
<?php
include 'header.php';
include 'includes/function.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UName = $_POST['username'];
    $passKey = $_POST['passkey'];
    $password = $_POST['password'];


    adminLogin($con, $UName, $password, $passKey);
}
?>
<DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/admin_login.css" />
    </head>

    <body>
        <main>
            <div class="wide_container">
                <div class="container2">
                    <legend>Admin Login</legend>
                    
                    <form id="loginForm" method="POST">
                        
                        <hr />
                        <input type="text" name="username" placeholder="Username" required />
                        <br>
                        <input type="password" name="passkey" placeholder="Passkey" required />
                        
                        <input type="password" name="password" placeholder="Password" required />
                        <div>
                            <input class="login" type="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include 'footer.php' ?>
    </body>

    </html>
</DOCTYPE>