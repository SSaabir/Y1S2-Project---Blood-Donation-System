<?php
include 'header.php';
include 'CRUD/donor_appointment_process.php';
?>
<DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="css/donor_appointment.css">
    <script src="js/function.js"></script>
  </head>

  <body>
    <main>

      <form id="doner-appointment" method="post">
        <fieldset class="frame">
          <legend>Doner Appointment</legend>
          <br><br>
          <div class="first-line">
            <div class="one">
              <label for="How long since the last donation (Days):">How long since the last donation (Days):</label>
            </div>
          </div><br><br>

          <div class="second-line">
            <div class="two">
              <label for="how-long">How-Long:</label>
              <input type="text" id="how-long" name="how-long" onmouseleave="validateAppointment()" required />
            </div>
          </div><br>

          <br>
          <?php

          $hospitalQuery = "SELECT H_Name FROM hospital";

          $hospitalResult = mysqli_query($conn, $hospitalQuery);



          if ($hospitalResult) {
            echo '<div class="selection">
            <div class="select">
                <label for="selection">Hospital: </label>
                <select name="hname" class="place">';

            while ($row = mysqli_fetch_assoc($hospitalResult)) {
              echo '<option value="' . $row['H_Name'] . '">Hospital: ' . $row['H_Name'] . '</option>';
            }
            echo '</select>
            </div>
          </div><br>';
          } else {
            echo "Error: " . mysqli_error($conn);
          }

          mysqli_close($conn);
          ?><br>
          <br>
          <div class="third-line">
            <div class="three">
              <label for="date">Date:</label>
              <input type="date" id="date" name="date" oninput="validateDate()">
            </div>
            <div class="three">
              <label for="time">Time:</label>
              <input type="text" id="time" name="time" placeholder="HH:MM">
            </div>
            <div class="three">
              <select id="meridiem" name="meridiem">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
            </div>
          </div>
          <br>
          <br>


          <div class="fourth-line">
            <div class="four">
              <input type="reset">
            </div>
            <div class="four">
              <input type="submit" onclick="return confirm('Ensure that all the provided data is accurate. Due to security reasons, editing cannot be Done.')">
            </div>
          </div><br>

        </fieldset>
      </form>
    </main>

  </body>
  <?php
  include 'footer.php';
  ?>

  </html>
</DOCTYPE>