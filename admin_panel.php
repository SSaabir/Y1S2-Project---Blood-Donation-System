<?php
require 'header.php';
require 'CRUD/admin_manage_hospital.php';
require 'CRUD/admin_manage_feedback.php';
require 'includes/function.inc.php';

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/admin_panel.css" />
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
                    <button class="editB" onclick="document.location='admin_edit.php'">
                        Edit Profile
                    </button>
                </div>
                <div class="but2">
                    <button class="campB" onclick="document.location='add_admin.php'">
                        Add an Admin
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
        <!-- MANAGING Hospital SECTION -->
        <!----------------------------------------------------------------------------------------------------->
        <div class="sec2">
            <div class="container">
                <h4>Manage Hospitals</h4>
                <div class="hyperL">
                    <label>New</label>
                    <a href="admin_history.php">History</a>
                </div>


                <?php
                while ($row = mysqli_fetch_assoc($result_hospitals)) {
                    $HospitalID = $row['Hospital_id'];
                    $Name = $row['H_Name'];
                    $Address = $row['Adds'];
                    $Phone = $row['Tel_no'];
                    $Email = $row['Email'];

                ?>
                    <div class="temp">
                        <div class="info">
                            <label> Hospital#<?php echo $HospitalID ?></label>
                            <hr>
                            <br>
                            <label>Name: <?php echo $Name ?></label>
                            <br>
                            <label>Address: <?php echo $Address ?></label>
                            <br>
                            <label>Phone: <?php echo $Phone ?></label>
                            <br>
                            <label>Email: <?php echo $Email ?></label>
                        </div>
                        <form method="post">
                            <input type="hidden" name="HospitalID" value="<?php echo $HospitalID ?>">
                            <button class="Approved" name="Approved" type="submit">Approve</button>
                            <button class="Cancelled" name="Declined" type="submit" onclick="return confirm('Are You Sure ?')">Decline</button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- MANAGING Feedback SECTION -->
            <!----------------------------------------------------------------------------------------------------->
            <div class="sec2">
                <div class="container-wonder">
                    <h4>Manage Feedbacks</h4>
                    <div class="hyperL">
                        <label>New</label>
                        <a href="admin_history.php">History</a>
                    </div>


                    <?php
                    while ($row = mysqli_fetch_assoc($result_feedbacks)) {
                        $FeedbackID = $row['Feedback_id'];
                        $Comment = $row['Comment'];
                        $DonerID = $row['F_Donor_id'];

                        if ($row['F_Donor_id'] == null) {
                            $UserName = $row['H_Name'];
                        } else {
                            $UserName = $row['DonorName'];
                        }

                    ?>
                        <div class="temp">
                            <div class="info">
                                <label> Feedback#<?php echo $FeedbackID ?></label>
                                <hr>
                                <br>
                                <label>From: <?php echo $UserName ?></label>
                                <br>
                                <label><?php echo $Comment ?></label>
                            </div>
                            <form method="post">
                                <input type="hidden" name="FeedbackID" value="<?php echo $FeedbackID ?>">
                                <button class="Approved" name="Approved" type="submit" onclick="return confirm('Are You Sure ?')">Approve</button>
                                <button class="Cancelled" name="Declined" type="submit" onclick="return confirm('Are You Sure ?')">Decline</button>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

    </main>
    <?php
    require 'footer.php';
    ?>
</body>

</html>