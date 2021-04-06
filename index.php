<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<style media="screen">
.button {
  border-radius: 4px;
  background-color: red;
  border: none;
  color: white;
  text-align: center;
  font-size: 21px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  font-weight: bold;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header align="center">
      <h1 class="fas fa-dove">  Chidiya</h1>
    </header>
      <br>
      <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_TBKozE.json"  background="#FF0000"  speed="1"  style="width: 375px; height: 300px;"  loop  autoplay></lottie-player>
      <header align="center">
        <br>
        <h1 class="fas fa-hand-holding-heart">  Welcome</h1>
      </header>
      <br>
      Chidiya is a free open source safe chatting interface developed by Group-2
      <div class="" align="center">
        <button class="button fas fa-user-plus" onclick="window.location.href='signup.php'"><span>SignUp</span></button>
        <button class="button fas fa-sign-in-alt" onclick="window.location.href='login.php'"><span>LogIn</span></button>
      </div>
      ©️ Copyright 2021 Group-2 19AITCC1-B
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
