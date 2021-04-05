<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<style media="screen">
.button {
  border-radius: 4px;
  background-color: yellow;
  border: none;
  color: black;
  text-align: center;
  font-size: 24px;
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
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<body>
  <div class="wrapper">

    <button type="button" onclick="windows."name="button"></button>
    <section class="users">
      <header>
        <div class="content">
          <?php
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
      </header>
      <br>
      <a href="chat.php?user_id=<?php echo $row['unique_id']; ?>" class="button"><span>Lets's Chat</span></a>
      <a href="" class="button"><span>Edit</span></a>
      <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="button"><span>Logout</span></a>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
