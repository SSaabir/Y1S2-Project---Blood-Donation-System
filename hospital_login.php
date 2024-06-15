
<?php
include 'header.php';
include 'includes/function.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  hospitalLogin($con, $email, $password);
}
?>
<DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="css/hospital_login.css" />
  </head>

  <body>
    <main>
      <div class="wide_container">
      


        <div class="container2">
        <legend>Hospital Login</legend>
        <br>
        <hr>
        <br>
        <form id="loginForm" method="POST">
            <input type="email" name="email" placeholder="Email" required />
            <br />
            <input type="password" name="password" placeholder="Password" required />
            <div>
              <input class="login" type="submit" value="Login">
            </div>
          </form>
        
          <div>
            <label class="wo">Dont have an Account ?</label>
          </div>
          <div>
            <button class="signup" onclick="document.location='hospital_signup.php'">
              SignUp
            </button>
          </div>
        </div>
      </div>
    </main>
    <?php include 'footer.php' ?>
  </body>

  </html>
</DOCTYPE>