<?php
require 'header.php';
?>

<head>
  <link rel="stylesheet" href="css/contactUs.css">
</head>

<div class="align">
  <div class="contactSide">
    <div class="title">
      <h1>Contact Us</h1>
      <br><br><br><br>
      <h3>📧 lifeline@support.com</h3>
      <br>
      <h3>📞 +94728383848</h3>
      <br>
      <h3>You Can also try Commonly Asked Questions in <a href="faq.php">FAQ</a></h3>

    </div>
  </div>

  <div class="getin">
    <h1>Get in Touch</h1>
    <h3>Feel free to drop us a line below</h3>
    <br><br>
    <div class="inputDetails">
      <form method="post">
        <input class="inputName" type="text" placeholder="Your name:">
        <div class="emailAdjust">
          <input class="inputEmail" type="text" placeholder="Your email:">
        </div>
        <div class="messageAdjust">
          <input class="inputMessage" type="text" placeholder="Type your message here:">
        </div>
        <br>
        <div class="submitButton"><button type="submit"><h2>Submit</h2></button></div>
      </form>
    </div>

  </div>
</div>

<?php
require 'footer.php';
?>

<script>
  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var name = document.querySelector('.inputName').value;
    var email = document.querySelector('.inputEmail').value;
    var message = document.querySelector('.inputMessage').value;

    var emailBody = 'Name: ' + name + '\n';
    emailBody += 'Email: ' + email + '\n';
    emailBody += 'Message: ' + message;

    window.location.href = 'mailto:siraajsaabir@gmail.com?subject=Contact Form Submission&body=' + encodeURIComponent(emailBody);
  });
</script>
