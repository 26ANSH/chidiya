<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<style media="screen">
#messagee {
display:none;
color: #000;
position: relative;

margin-top: 10px;
}
#messagee p{
  padding: 4px
  font-size: 14px;
  margin-left: 40px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
color: green;
}

.valid:before {
position: relative;
left: -35px;
content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
color: red;
}

.invalid:before {
position: relative;
left: -35px;
content: "✖";;
}
</style>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header align="center">
        <h3 class="fas fa-file-signature">  Create Account</h3>
      </header>
      <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_wd1udlcz.json"  background="transparent"  speed="1"  style="width: 375px; height: 300px;"  loop  autoplay></lottie-player>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label class="fas fa-user-circle">First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label class="fas fa-user-circle">Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label class="fas fa-envelope">Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <i class="fas fa-eye"></i>
          <label class="fas fa-key">Password</label>
          <input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter new password" required>
          <div id="messagee" >
            <h3 class="fas fa-lock">Password must contain the following:</h3>
              <p id="letter" class="invalid">A Lowercase letter</p>
              <p id="capital" class="invalid">A Uppercase letter</p>
              <p id="number" class="invalid">A number </p>
              <p id="length" class="invalid">Minimum 8 characters</p>
            </div>
        </div>
        <div class="field image">
          <label class="fas fa-camera-retro">Select display Picture</label>
          <input type="file" id="image" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
      <div class="link fas fa-check-circle">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  <script>
  var myInput = document.getElementById("psw");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");
  // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("messagee").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("messagee").style.display = "none";
  }

  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
  }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }
</script>
</body>
</html>
