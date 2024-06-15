<?php
require 'header.php';
require 'includes/function.inc.php';
require 'includes/dbh.inc.php';

$sql = "SELECT * ,
hospital.H_Name,
CONCAT(A_Time, ' ', A_meridiem) AS ATM
FROM appointment 
LEFT JOIN hospital ON appointment.A_Hospital_id = hospital.Hospital_id
WHERE A_Donor_id = $_SESSION[userID]";
$result = $con->query($sql);


$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment History</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .editB,.logout{
    float:right;
    margin: 0 8px;
    width: 120px;
    height: 35px;
    border: 2px solid #000000;
    outline:none;
    border-radius: 6px;
    font-size: 1.1em;
    color: white;
	background-color: #333;
    font-weight: 500;
    transition: .5s;
}
.editB,.logout{
    display: inline;
}

.editB:hover,.logout:hover
{
	background-color: azure;
	color:blue;
}
.frame{
	background-color:azure;
	border-color: black;
	border: 2%;
	border-radius: 10px;
	width: 96%;
    height: 100%;
    padding: auto;
	margin:auto;
    z-index: 1;
}

  </style>
</head>
<body>
  <main class="frame">
    <div class="sec1">
      <div class="row1">
        <?php
        echo "<h2 class=\"title\">" . $_SESSION['username'] . "</h2>";
        ?>
        <div>
          <?php echo "<h5 class=\"head\">" . $_SESSION['email'] . "</h5>"; ?>
        </div>

        <div class="but3">
          <button class="logout" name='logout' onclick="document.location='logout.php' ">Log Out</button>
        </div>
      </div>
    </div>
    <br />
    <hr />
    <a href="donor_panel.php">Back</a>
    <br>
  <h2>Appointment Data</h2>
  <table>
    <tr>
      <th>Appointment ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>Hospital Name</th>
      <th>Status</th>
    </tr>
    <?php

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Appointment_id"] . "</td>";
        echo "<td>" . $row["A_Date"] . "</td>";
        echo "<td>" . $row["ATM"] . "</td>";
        echo "<td>" . $row["H_Name"] . "</td>";
        echo "<td>" . ($row["Status"] ? 'Booked' : 'Cancelled') . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8'>No appointments found</td></tr>";
    }
    ?>
  </table>
</body>
</html>
<?php
require 'footer.php';
?>