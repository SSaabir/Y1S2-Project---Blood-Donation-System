<?php
require 'header.php';
include 'CRUD/add_camp_process.php';
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="add_camp.css">
  <script src="js/function.js"></script>
</head>

<body>
  <center>
    <div class="Camp">
      <h1 class="form-title">Blood Camp</h1>
      <br>
      <hr>
      <form method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="full name">Full Name</label>
            <input type="text" id="fullName" name="name" placeholder="Enter your name" />
          </div>
          <div class="user-input-box">
            <label for="led by dr.">Led by Dr.</label>
            <input type="text" id="ledbydr." name="ledby" placeholder="Enter Dr. name" />
          </div>
          <div class="user-input-box">
            <label for="address">Line 1</label>
            <input type="text" id="address" name="line1" placeholder="Enter your address" />
          </div>

          <div class="user-input-box">
            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Enter your city" />
          </div>
          <div class="user-input-box">
            <label for="postel code">Postel Code</label>
            <input type="text" id="postel code" name="postal_code" placeholder="Enter your Postel Code" />
          </div>
          <div class="user-input-box">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" placeholder="Enter your country" />
          </div>
          <div class="sixth-line">
            <div class="six">
              <label for="date">Date:</label>
              <input type="date" name="date" id="date" oninput="validateDate()">
            </div>
            <div class="six">
              <label for="time">Time:</label>
              <input type="text" id="time" name="time" placeholder="HH:MM">
            </div>
            <div class="six">
              <select id="eridiem" name="meridiem">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
            </div>

          </div>
          <div class="form-submit-btn">
            <input type="submit" name="submit" value="Publish Camp" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing most of the data is restricted.')">
          </div>

        </div>
      </form>
    </div>
  </center>
</body>
<?php
require 'footer.php';
?>

</html>