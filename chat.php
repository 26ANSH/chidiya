<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<?php
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>
<style media="screen">
body{
  background: <?php echo $row['theme']; ?>;
  margin: 20px;
}
.indent{
  float: left;
}
.wrapper_my
{
  margin: 20px;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
<!-- User Chat -->
<body>
  <div class="wrapper_my">
    <section class="users">
      <header>
        <h1 class="fas fa-address-book" >  Users</h1>
      </header>
      <div class="search">
        <span class="text">Search for Users to chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
</div>
  <!-- <script src="javascript/users.js"></script> -->

<!-- Group Chat -->
<div class="wrapper_my">
  <section class="users">
    <header>
      <h1 class="fas fa-address-book" >  Groups</h1>
    </header>
    <div class="search">
      <span class="text">Search for Groups to chat</span>
      <input type="text" placeholder="Enter name to search...">
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="groups-list">

    </div>
  </section>
</div>

<!-- Chat Screen -->
<div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/groups.js"></script>
  <script src="javascript/chat.js"></script>
</body>
</html>
