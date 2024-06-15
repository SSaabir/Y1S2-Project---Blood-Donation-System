<?php
include 'header.php';
include 'CRUD/hospital_signup_process.php';
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/hospital_signup.css" />
</head>

<body>

  <main>
    <form class="signup" method="post" action="CRUD/hospital_signup_process.php" onsubmit="return validateForm()">
      <fieldset class="frame">
        <legend class="legend">Create New Account</legend>
        <div class="first_line">
          <div class="first">
            <label for="name">Hospital Name </label><input id="name" type="text" name="name" required />
          </div>
        </div>
        <div class="second_line">
          <div class="second">
            <label for="tel_no">Telephone Number </label><input id="tel_no" type="tel" name="tel_no" required />
          </div>
          <div class="second">
            <label for="email">Email &nbsp;</label><input id="email" type="email" name="email" required />
          </div>
        </div>
        <hr />
        <div class="random">
          <label>Address</label>
        </div>
        <div class="third_line">
          <div class="third">
            <label for="line1">Address Line 1 </label><input id="line1" type="text" name="line1" required />
          </div>
          <div class="third">
            <label for="city">City </label><input id="city" type="text" name="city" required />
          </div>
        </div>
        <div class="fourth_line">
          <div class="fourth">
            <label for="postal_code">Postal Code &nbsp;</label><input id="postal_code" type="text" name="postal_code" required />
          </div>
          <div class="fourth">
            <label for="country">Country </label><input id="country" type="text" name="country" required />
          </div>
        </div>
        <hr />
        <div class="fifth_line">
          <div class="fifth">
            <label for="password">Password </label><input id="password" type="password" name="password" required />
          </div>
          <div class="fifth">
            <label for="cPassword">Confirm Password </label><input id="cPassword" type="password" name="cPassword" required />
          </div>
        </div>
        <hr />
        <div class="seventh-line">
          <div class="seventh">
            <input type="checkbox" name="terms" id="terms" required /><label for="terms">I agree to the Lifeline <a href="terms.php">Terms</a> & <a href="privacy.php ">Privacy Policy</a></label>
          </div>
        </div>
        <hr />
        <div class="sixth-line">
          <div class="sixth">
            <input type="reset" name="reset" />
          </div>
          <div class="sixth">
            <input type="submit" name="submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')" />
          </div>
        </div>
      </fieldset>
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

     
      var termsCheckbox = document.getElementById("terms");
      if (!termsCheckbox.checked) {
        alert("Please agree to the Terms & Privacy Policy.");
        return false;
      }

      return true;
    }
  </script>

</body>

</html>
<?php
include 'footer.php';
?>