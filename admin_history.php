<?php
require 'includes/dbh.inc.php';
require 'header.php';
require 'includes/function.inc.php';

$sql_hospital = "SELECT * ,
CONCAT(Line1,', ',City,', ',Postal_Code,', ',Country) AS Adress
FROM hospital";
$result_hospital = $con->query($sql_hospital);

$sql_feedback = "SELECT * FROM feedback";
$result_feedback = $con->query($sql_feedback);

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Data</title>
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
    .logout{
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
.logout{
    display: inline;
}

.logout:hover
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

    <a href="admin_panel.php">Back</a>
    <br>
    <br>
  <h2>Hospital Data</h2>
  <table>
    <tr>
      <th>Hospital ID</th>
      <th>Name</th>
      <th>Telephone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Status</th>
    </tr>
    <?php
    if ($result_hospital->num_rows > 0) {
      while($row = $result_hospital->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Hospital_id"] . "</td>";
        echo "<td>" . $row["H_Name"] . "</td>";
        echo "<td>" . $row["Tel_no"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Adress"] . "</td>";
        echo "<td>" . ($row["Status"] ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No hospitals found</td></tr>";
    }
    ?>
  </table>
<br>
<br>
<br>
  <h2>Feedback Data</h2>
  <table>
    <tr>
      <th>Feedback ID</th>
      <th>Comment</th>
      <th>Status</th>
      <th>Admin ID</th>
    </tr>
    <?php
    if ($result_feedback->num_rows > 0) {
      while($row = $result_feedback->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Feedback_id"] . "</td>";
        echo "<td>" . $row["Comment"] . "</td>";
        echo "<td>" . ($row["Status"] ? 'Active' : 'Inactive') . "</td>";
        echo "<td>" . $row["F_Admin_id"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No feedback found</td></tr>";
    }
    ?>
  </table>
</body>
</html>
<?php
require 'footer.php';
?>