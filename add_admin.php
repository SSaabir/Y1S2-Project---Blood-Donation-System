<?php
require 'header.php';
include 'CRUD/add_admin_process.php';

?>


<DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/add_admin.css">
        <script src="js/function.js"></script>
    </head>

    <body>
        <main>
            <br>
            <form id="create-new-account" class="signup" method="post" action="CRUD/add_admin_process.php" onsubmit="return validateForm()">
                <fieldset>
                    <legend>
                        <h1>Create New Account</h1>
                    </legend>
                    <div class="first_line">
                        <br><br>
                        <div id="firstname">
                            <label for="firstName">Username:</label>
                            <input type="text" id="UserName" name="Uname" required>
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
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" placeholder="example@email.com" required>
                            </div>
                        </div>
                        <div class="pass">
                            <div class="seven">
                                <label for="password">Passkey:</label>
                                <input type="text" id="passkey" name="passkey" required>
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
                        <input type="checkbox" name="terms">I agree to the Lifeline <a href="terms.php">Terms</a> & <a href="privacy.php ">Privacy Policy</a></input>
                        </p>
                        <br>
                        <div class="right">
                            <div class="reset">
                                <input type="reset" value="Reset">
                            </div>
                            <div class="reset">
                                <input type="submit" value="Submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')">
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