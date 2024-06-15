<?php
require 'header.php';
require 'includes/dbh.inc.php';

$query = "SELECT *, CONCAT(line1, ', ', city, ', ', postal_Code, ', ', country) AS H_Address FROM hospital WHERE hospital.Status=1";
$result = mysqli_query($con, $query);

if (!$result) {

  die('Error: ' . mysqli_error($con));
}
?>

<head>
  <link rel="stylesheet" href="css/locations.css">
</head>

<div class="title">
  <br>
  <h1>Location Details</h1>
</div>
<br><br>

<br>
<div class="container">
  <div class="row">
    <?php
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $HospitalName = $row['H_Name'];
      $HospitalNo = $row['Tel_no'];
      $Email = $row['Email'];
      $Address = $row['H_Address'];
    ?>
      <div>
        <div class="info">

          <label><?php echo $HospitalName ?></label>
          <hr>
          <br>
          <label>Address: <?php echo $Address ?></label>
          <br>
          <label>Telephone Number: <?php echo $HospitalNo ?></label>
          <br>
          <label>Email: <?php echo $Email ?></label>
        </div>
      </div>
    <?php
      $count++;

      if ($count % 2 == 0) {
        echo '</div><div class="row">';
      }
    }
    ?>
  </div>
</div>
<?php
require 'footer.php';
?>