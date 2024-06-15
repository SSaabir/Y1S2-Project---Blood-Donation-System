<?php include 'header.php';
require 'includes/dbh.inc.php';

$query = "SELECT * , 
CONCAT(C_Time,' ', C_meridiem) AS CTM, 
CONCAT(camp.Line1,' ', camp.City,' ', camp.Postal_Code,' ',camp.Country) AS C_Address,
hospital.H_Name
FROM camp 
LEFT JOIN hospital ON camp.C_Hospital_id = hospital.Hospital_id";

$result = mysqli_query($con,$query);
if (!$result) {

    die('Error: ' . mysqli_error($con));
  }

  $query2 = "SELECT *,
  hospital.H_Name
  FROM emergency_blood
  LEFT JOIN hospital ON emergency_blood.EB_Hospital_id = hospital.Hospital_id";
  $result1 = mysqli_query($con,$query2);
  if (!$result1) {
  
      die('Error: ' . mysqli_error($con));
    }
  ?>
<head>
    <link rel="stylesheet" href="css/home.css">
</head>
<div class="title"> 
    <h1>Welcome to life line blood donation system </h1>
</div><br>
<div class="aims"><hr>
<h3>"Donate blood today to join the life-saving journey and help people in need by being a light of hope. Your kindness protects strength, personifies solidarity, and makes strangers into family."</h3>
<hr></div><br>  
<div class="image">
<img src="images/bg5.jpg" alt="Blood Donation">
<div class="news">
<?php
while ($row = mysqli_fetch_assoc($result)) {

$cID = $row['Camp_id'];
  $campN = $row['C_Name'];
  $hospital = $row['H_Name'];
  $address = $row['C_Address'];
  $date = $row['C_Date'];
  $time= $row['CTM'];
  $doctor = $row['Led_By'];

  ?>


<label>Camp #<?php echo $cID ?></label>
      <hr>
      <label>Name: <?php echo $campN ?></label>
      <br>
      <label>Authorized By: <?php echo $hospital ?></label>
      <br>
      <label>Doctor In Charge: <?php echo $doctor ?></label>
      <br>
      <label>Date: <?php echo $date ?></label> <label>Time: <?php echo $time ?></label>
      <br>
      <label>Address: <?php echo $address ?></label>
<br>
<hr><hr>
<br>
<?php
}
?>
</div>

<div class="news">
<?php
while ($row = mysqli_fetch_assoc($result1)) {

  $EBID = $row['EB_id'];
  $B_gr = $row['Blood_Group'];
  $hospital1 = $row['H_Name'];
    ?>


<label>Request #<?php echo $EBID ?></label>
      <hr>
      <label>Blood Group: <?php echo $B_gr ?></label>
      <br>
      <label>Requested From: <?php echo $hospital1 ?></label>
      <br>
      
<br>
<hr><hr>
<br>
<?php
}
?>
</div>
</div>

<?php include 'footer.php' ?>