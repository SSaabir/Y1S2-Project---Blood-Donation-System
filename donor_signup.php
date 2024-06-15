
<?php
require 'header.php';
include 'CRUD/donor_signup_process.php';
?>
<DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="css/donor_signup.css">
    <script src="js/function.js"></script>
  </head>

  <body>
    <main>
      <br>


      <form id="create-new-account" class="signup" method="post" action="CRUD/donor_signup_process.php" onsubmit="return validateForm()">
        <fieldset>
          <legend>
            <h1>Create New Account</h1>
          </legend>
          <div class="first_line">
            <div id="Salutation">
              <label for="salutation">Salutation:</label>
              <select id="salutation" name="sal">
                <option value="MR">Mr.</option>
                <option value="MS">Ms.</option>
                <option value="MRS">Mrs.</option>
              </select>
            </div>
            <br><br>
            <div id="firstname">
              <label for="firstName">First Name:</label>
              <input type="text" id="firstName" name="fname" required>
            </div>

            <div id="lastname">
              <label for="lastName">Last Name:</label>
              <input type="text" id="lastName" name="lname" required>
            </div>
          </div>
          <div class="sec-line">
            <div class="second">
              <label for="nic">NIC:</label>
              <input type="text" id="nic" name="nic" required>
            </div>

            <div class="sec-line">
              <div class="second">
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" onchange="verifyAgeOnChange()" required>
              </div>
            </div>

            <div class="third-line">
              <div class="third">
                <label for="gender">Gender:</label>
                <input type="radio" id="gender-male" name="gender" value="MALE">
                <label for="gender-male">Male</label>
                <input type="radio" id="gender-female" name="gender" value="FEMALE">
                <label for="gender-female">Female</label>
              </div>

              <div class="third">
                <label for="phoneNumber">Phone Number:</label>
                <input type="number" id="phoneNumber" name="phone" placeholder="+9477xxxxxxxx" required>
              </div>
            </div>

            <div class="fourth-line">
              <div class="fouth">
                <label for="bloodGroup">Blood Group:</label>
                <select id="bloodGroup" name="blood-group">
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="g">g</option>
                </select>
              </div>

              <div class="fouth">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="example@email.com" required>
              </div>
            </div>

            <div class="fifth-line">
              <div class="fifth">
                <label for="addressLine1">Address Line 1:</label>
                <input type="text" id="addressLine1" name="line1" required>
              </div>

              <div class="fifth">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
              </div>
            </div>

            <div class="sixth-line">
              <div class="six">
                <label for="postalCode">Postal Code:</label>
                <input type="text" id="postalCode" name="postal_code" required>
              </div>

              <div class="six">
                <label for="country">Country:</label>
                <input type="text" name="country" />
              </div>
            </div>

            <div class="seventh-line">
              <div class="seven">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
              </div>

              <div class="seven">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="cPassword" required>
              </div>
            </div>
            <br>
            <p>
            <div class="eight"></div>
            <input type="checkbox" name="terms">I agree to the lifeline <a href="terms.php">Terms</a> & <a href="privacy.php">Priavcy policy</a></input>
            </p>
            <br>
            <div class="right">
              <div class="reset">
                <input type="reset" value="Reset">
              </div>
              <div class="reset">
                <input type="submit" value="Submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')" >
              </div>
            </div>
            <br />
            <br />
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
  require 'footer.php';
  ?>