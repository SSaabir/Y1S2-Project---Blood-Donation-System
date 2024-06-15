<?php
include 'header.php';
include 'includes/function.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];


  donorLogin($con, $email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/donor_login.css">
</head>

<body>
  <div class="form-popup">
    <div class="picture">
      <img src="images\picture.jpg" alt="">
    </div>
    
    <div class="form-box">
      <div class="form-details">
        <h2>Hi, Welcome Back!!!</h2>
      </div>
      <div class="form-contet">
        <h2>LOGIN</h2>
        <hr>
        <form method="POST">
          <div class="input-field">
            <input type="text" name="email" placeholder="Email" required>
          </div>
          <div class="input-field">
            <input type="password" name="password" placeholder="Password" required>
            
          </div>
          <button type="submit" class="login"> Login</button>
        </form>
        <div class="bottom-link">
          <label class="wo">Don't have an account?</label>
        </div>
        <div class="bottom-link">
          <button type="submit" class="signup" onclick="document.location='donor_signup.php'">Signup</button>
        </div>
        
        <label class="wo">Are you a Hospital Admin ?<a href="hospital_login.php">Login Here</a></label>
      </div>
    </div>
  </div>
</body>

</html>
<?php
require 'footer.php';
?>