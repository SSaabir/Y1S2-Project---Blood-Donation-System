
<?php
include 'header.php';
include 'CRUD/guest_appointment_process.php';
?>
<DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/guest_appointment.css">
        <script src="js/function.js"></script>
    </head>

    <body>
        <main>
            <form id="guest-appointment" method="post" action="CRUD/guest_appointment_process.php">
                <fieldset class="frame">
                    <legend>Guest Appointment</legend>
                    <div class="first_line">
                        <div id="Salutation">
                            <div class="sal">
                                <label for="salutation">Salutation:</label>
                                <select id="people" name="people">
                                    <option value="MR">MR.</option>
                                    <option value="MS">MS.</option>
                                    <option value="MRS">MRS.</option>
                                    <option value="MISS">MISS.</option>
                                    <option value="DR">DR.</option>
                                </select>
                            </div>
                        </div>
                    </div><br>

                    <div class="name-line">
                        <div class="firstname">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required />
                        </div>
                        <div class="lastname">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required />
                        </div>
                    </div><br>

                    <div class="sec-line">
                        <div class="two">
                            <label for="nic">NIC:</label>
                            <input type="text" id="Nic" name="Nic" required />
                        </div>
                    </div><br>

                    <div class="third-line">
                        <div class="three">
                            <label for="dob">DOB:</label>
                            <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" onchange="verifyAgeOnChange()">
                        </div><br>
                    </div><br>

                    <div class="blood">
                        <label for="bloodgroup">BLOODGROUP:</label>
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

                    <div class="fourth-line">
                        <div class="four">
                            <label for="gender">GENDER:</label>
                            <label>Male :</label> <input type="radio" name="gender" />
                            <label>Female :</label> <input type="radio" name="gender" />
                        </div>
                    </div><br>

                    <div class="fifth-line">
                        <div class="five">
                            <label for="email">EMAIL:</label>
                            <input type="email" id="email" name="Email" required />
                        </div>
                    </div><br>

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
                    ?>


                    <div class="sixth-line">
                        <div class="six">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" oninput="validateDate()">
                        </div>
                        <div class="six">
                            <label for="time">Time:</label>
                            <input type="text" id="time" name="time" placeholder="HH:MM">
                        </div>
                        <div class="six">
                            <select id="meridiem" name="meridiem">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>

                    </div>
                    <br>
                    <br>

                    <div class="seventh-line">
                        <div class="seven">
                            <label for="how-long">Healthy-Individual-Should-Be-Able-To-Donate-Once-Every-120-Days:</label>
                        </div>
                    </div><br>

                    <div class="eighth-line">
                        <div class="eight">
                            <label for="how-long">How-Long:</label>
                            <input type="text" id="how-long" name="how-long" onmouseleave="validateAppointment()" required />
                        </div>
                    </div><br>

                    <div class="ninth-line">
                        <div class="nine">
                            <input type="reset">
                        </div>
                        <div class="nine">
                            <input type="submit" name="submit" onclick="return confirm('Ensure that all the provided data is accurate.')">
                        </div>
                    </div><br>
                </fieldset>
            </form>
        </main>

    </body>
    <?php
    include 'footer.php'
    ?>

    </html>
</DOCTYPE>