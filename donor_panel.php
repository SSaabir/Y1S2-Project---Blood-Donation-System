<?php
require 'header.php';
require 'CRUD/donor_manage_Appoint.php';
require 'includes/function.inc.php';

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/donor_panel.css" />
</head>

<body>
  <main class="frame">
    <div class="sec1">
      <div class="row1">
        <?php
        echo "<h2 class=\"title\">Welcome Back, " . $_SESSION['username'] . "</h2>";
        ?>
        <div>
          <?php echo "<h5 class=\"head\">" . $_SESSION['email'] . "</h5>"; ?>
        </div>
        <div class="but1">
          <button class="editB" onclick="document.location='donor_edit.php'">
            Edit Profile
          </button>
        </div>

        <div class="but3">
          <button class="logout" name='logout' onclick="document.location='logout.php' ">Log Out</button>
        </div>
      </div>
    </div>
    <br />
    <hr />
    <br>
    <!-- MANAGING APPOINTMENTS SECTION -->
    <!----------------------------------------------------------------------------------------------------->
    <div class="sec2">
      <div class="container">
        <h4>Manage Appointments</h4>
        <div class="hyperL">
          <label>New</label>
          <a href="donor_appointment_history.php">History</a>
        </div>


        <?php
        while ($row = mysqli_fetch_assoc($result_appointments)) {
          $AppointmentID = $row['Appointment_id'];
          $AppointmentDate = $row['A_Date'];
          $AppointmentTime = $row['ATM'];
          $HospitalName = $row['HospitalName'];

        ?>
          <div class="temp">
            <div class="info">
              <label> Appointment#<?php echo $AppointmentID ?></label>
              <hr>
              <br>
              <label>Hospital: <?php echo $HospitalName ?></label>
              <br>
              <label>Date: <?php echo $AppointmentDate ?></label>
              <br>
              <label>Time: <?php echo $AppointmentTime ?></label>
              <br>

              <form method="post">
                <input type="hidden" name="AppointmentID" value="<?php echo $AppointmentID ?>">
                <button class="Cancelled" name="Cancel" type="submit" onclick="return confirm('Are You Sure ?')">Cancel</button>
              </form>
            </div>
          <?php
        }
          ?>
          </div>

  </main>

</body>

</html>
<?php
require 'footer.php';
?>