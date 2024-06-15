<?php
require 'header.php';
require 'CRUD/hospital_manage_appoint.php';
require 'CRUD/hospital_manage_camp.php';
require 'CRUD/hospital_manage_Requests.php';
require 'includes/function.inc.php';

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/hospital_panel.css" />
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
          <button class="editB" onclick="document.location='hospital_edit.php'">
            Edit Profile
          </button>
        </div>
        <div class="but2">
          <button class="campB" onclick="document.location='add_camp.php'">
            Add a Camp
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
          <a href="hospital_appointment_history.php">History</a>
        </div>


        <?php
        while ($row = mysqli_fetch_assoc($result_appointments)) {
          $AppointmentID = $row['Appointment_id'];
          $AppointmentDate = $row['A_Date'];
          $AppointmentTime = $row['ATM'];
          $AGuestID = $row['A_Guest_id'];

          if ($row['A_Guest_id'] == null) {
            $UserName = $row['DonorName'];
            $UserNIC = $row['DonorNIC'];
            $UserBloodgroup = $row['DonorBloodgroup'];
            $UserEmail = $row['DonorEmail'];
          } else {
            $UserName = $row['GuestName'];
            $UserNIC = $row['GuestNIC'];
            $UserBloodgroup = $row['GuestBloodgroup'];
            $UserEmail = $row['GuestEmail'];
          }

        ?>
          <div class="temp">
            <div class="info">
              <label> Appointment#<?php echo $AppointmentID ?></label>
              <hr>
              <br>
              <label>Name: <?php echo $UserName ?></label>
              <br>
              <label>Blood Group: <?php echo $UserBloodgroup ?></label>
              <br>
              <label>NIC: <?php echo $UserNIC ?></label>
              <br>
              <label>Date: <?php echo $AppointmentDate ?></label>
              <br>
              <label>Time: <?php echo $AppointmentTime ?></label>
              <br>
              <label>Email: <?php echo $UserEmail ?></label>
            </div>
            <form method="post">
              <input type="hidden" name="AppointmentID" value="<?php echo $AppointmentID ?>">
              <button class="Approved" name="Approved" type="submit">Approve</button>
              <button class="Cancelled" name="Declined" type="submit" onclick="return confirm('Are You Sure ?')">Decline</button>
            </form>
          </div>
        <?php
        }
        ?>
      </div>

      <!-- MANAGING CAMP SECTION -->
      <!--------------------------------------------------------------------------------------------------->
      <div class="sec2">
        <div class="container-camps">
          <h4>Manage Camps</h4>

          <label>Live</label>


          <?php
          while ($row = mysqli_fetch_assoc($result_camp)) {
          
            $CampID = $row['Camp_id'];
            $CampName = $row['C_Name'];
            $LedBy = $row['Led_By'];
            $Address = $row['Address'];
            $Date = $row['C_Date'];
            $Time = $row['ATM'];
          ?>
            <div class="temp">
              <div class="info">
                <label> Camp#<?php echo $CampID ?></label>
                <hr>
                <br>
                <label>Name: <?php echo $CampName ?></label>&nbsp;&nbsp;
                <label>Led By: <?php echo $LedBy ?></label>
                <br>
                <label>Address: <?php echo $Address ?></label>
                <br>
                <label>Date: <?php echo $Date ?></label>&nbsp;&nbsp;
                <label>Time: <?php echo $Time ?></label>
              </div>
              <button class="edit" name='Edit' onclick="document.location='edit_camp.php?Camp_id=<?php echo $CampID ?>'">Edit</button>
              <form method="post">
                <input type="hidden" name="Camp_id" value="<?php echo $CampID ?>">

                <input type="submit" class="Cancel" name="Cancel" value="Cancel" onclick="return confirm('Are You Sure ?')">
              </form>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

      <!-- Manage Requests -->
      <!----------------------------------------------------------------------------------------------------->
      <div class="sec2">
        <div class="container-wonder">
          <h4>Manage Requests</h4>
          <label>Live</label>


          <?php
          while ($row = mysqli_fetch_assoc($result_requests)) {
            
            $EB_id = $row['EB_id'];
            $BG = $row['Blood_Group'];

          ?>
            <div class="temp">
              <div class="info">
                <label>Request#<?php echo $EB_id ?></label>
                <br>
                <label>Blood Group: <?php echo $BG ?></label>&nbsp;&nbsp;

              </div>
              <form method="post">
                <input type="hidden" name="EB_id" value="<?php echo $EB_id ?>">
                <input type="submit" class="Cancel" name="Caancel" value="Cancel" onclick="return confirm('Are You Sure ?')">
              </form>
            </div>
          <?php
          }
          ?>
        </div>
        <!------------------------------------------------------------------------------------------------------->
      </div>
      <div class="sec2">
        <div class="container-post">
          <div class="info">
            <h2>Emergency Request</h2>
            <label for="bloodgroup">Blood Group: </label>
            <form method="POST">
              <div class="blood">
                <select name="bloodgroup" id="" class="bg">
                  <option value="A+">A+</option>
                  <option value="O+">O+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="A-">A-</option>
                  <option value="O-">O-</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                </select><br><br>
              </div>


              <input type="submit" class="Post" name="Post" value="Post">
            </form>

          </div>
        </div>
  </main>
  <?php
  require 'footer.php';
  ?>
</body>

</html>