
<?php
include 'dbh.crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Cancel'])) {
        $CampID = $_POST['Camp_id'];


        $sql = "DELETE FROM camp WHERE Camp_id = $CampID";

        if (mysqli_query($conn, $sql)) {
            echo 'Record Deleted Successfully !!';
            header("location:hospital_panel.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
            header("location:hospital_panel.php");
            exit();
        }
    }
}
?>