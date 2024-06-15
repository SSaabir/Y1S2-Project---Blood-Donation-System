<?php
require 'header.php';
require 'includes/dbh.inc.php';

$query = "SELECT *, CONCAT(donor.Salutation, ' ', donor.F_name, ' ', donor.L_name) AS DonorName,
hospital.H_Name
FROM feedback
LEFT JOIN donor ON feedback.F_Donor_id = donor.Donor_id
LEFT JOIN hospital ON feedback.F_Hospital_id=hospital.Hospital_id
 WHERE feedback.Status = 1";
$result = mysqli_query($con, $query);

if (!$result) {

  die('Error: ' . mysqli_error($con));
}
?>


<head>
  <link rel="stylesheet" href="css/feedback.css">
  <script src="js/function.js"></script>
</head>

<div class="title">
  <h1>Feedbacks</h1>
  <br><br>
</div>

<?php
while ($row = mysqli_fetch_assoc($result)) {

  $Comment = $row['Comment'];
  $FDonerID = $row['F_Donor_id'];

  if ($row['F_Donor_id'] == null) {
    $UserName = $row['H_Name'];
  } else {
    $UserName = $row['DonorName'];
  }

?>
  <div class="temp">
    <div class="info">
      <label><?php echo $UserName ?></label>
      <hr>
      <label><?php echo $Comment ?></label>
      <br>
    </div>
  </div>
<?php
}
?>
<?php
if (isset($_SESSION["userID"])) {
  $userType = $_SESSION["userType"];
}
?>

<div class="getFeedback">
  <form method="post">
    <input type="text" name="feedback" placeholder="Let us know your feedback" required>
    <div class="SubmitButton"><button id="myButton" <?php echo ($userType === 'admin' || $userType === 'guest') ? 'disabled' : ''; ?> onclick="return confirm('Are You Sure ?')"><h4>Submit</h4></button></div>
  </form>

</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_SESSION["userID"]) && isset($_SESSION["userType"])) {
    $userID = $_SESSION["userID"];
    $userType = $_SESSION["userType"];

    $feedback = $_POST['feedback'];

    if ($userType === 'hospital') {
      $sql = "INSERT INTO feedback (F_Hospital_id, Comment) VALUES ('$userID','$feedback')";
    } else {
      $sql = "INSERT INTO feedback (F_Doner_id, Comment) VALUES ('$userID','$feedback')";
    }

    if (mysqli_query($con, $sql)) {
      header("location:feedback.php?posted=true");
      exit;
    } else {
      echo "Error: " . mysqli_error($con);
    }
  } else {
    echo "Please log in to submit feedback.";
  }
}

if (isset($_GET['posted']) && $_GET['posted'] === 'true') {
  echo '<script>alert("Thank you for your Feedback.")</script>';
}
?>

<?php
require 'footer.php';
?>