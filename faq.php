<?php
require 'header.php';
?>

<head>
  <link rel="stylesheet" href="css/faq.css">
</head>

<div class="wrapper">
  <h1>Frequently Asked Questions</h1>


  <div class="faq">
    <button class="accordion">
    Who can donate blood?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      Individuals who are generally healthy, weigh at least 110 pounds, and are 17 years of age or older (16 with parental consent in some regions) can usually donate blood. Specific eligibility criteria may vary by country or donation center, so it's best to check with your local blood donation organization.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
    How often can I donate blood?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      The rules of your neighbourhood blood donation facility and your health state usually determine how frequently you donate blood. Donors of whole blood can typically give every eight to twelve weeks. For some donation types, like double red cell or platelet donations, the interval could change.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
    Is it safe to donate blood?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      Yes, for the majority of healthy people, giving blood is safe. Blood donation facilities follow stringent procedures to guarantee the security of both donors and receivers. To ascertain your eligibility before donating, a health test will be performed. Trained personnel will supervise the donation procedure to reduce any potential hazards.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
    Does blood donation hurt?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      Although there is a chance that some individuals will feel a slight pinch or slight discomfort when the needle is inserted, most blood donation procedures are painless. You can experience small side effects like bruising or dizziness after donation, but these are often transient.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
    Can I donate blood if I have a medical condition or take medication?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      The use of some drugs or medical conditions may limit your ability to donate blood. During the pre-donation screening procedure, it is imperative that you provide any pertinent information on your medical history and current medications. The personnel will evaluate your eligibility in light of this data as well as any applicable policies.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
    How will my donated blood be used?
      <i style="font-size:24px" class="fa">&#xf107;</i>
    </button>
    <div class="pannel">
      <p>
      Donated blood can be used for various medical purposes, including surgeries, treatments for medical conditions, and emergencies such as accidents or trauma. Blood donation centers work closely with hospitals and healthcare providers to ensure that donated blood is allocated where it's needed most.
      </p>
    </div>
  </div>
</div>
<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      this.parentElement.classList.toggle("active");

      var pannel = this.nextElementSibling;

      if (pannel.style.display === "block") {
        pannel.style.display = "none";
      } else {
        pannel.style.display = "block";
      }
    });
  }
</script>

<?php
require 'footer.php';
?>