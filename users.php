<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
  <script>(function(w, d) { w.CollectId = "606b2a09cc6de004cacdb443"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style media="screen">
.button {
  border-radius: 7px;
  background-color: yellow;
  border: none;
  color: black;
  text-align: center;
  font-size: 24px;
  padding: 13px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 15px;
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
  transition: 0.25s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.edit{
  background: blue;
  padding: 5px;
  color: white;
}
.edit:hover{
  background: white;
  padding: 5px;
  color: blue;
}
</style>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="" style="width:120px; height: 120px;">
          <div class="details">
              <br>
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p>Email : <?php echo $row['email']; ?></p>
            <a href="" class="edit fas fa-user-edit"><span>Edit</span></a>
          </div>
        </div>
      </header>

      <br>
      <a href="chat.php?user_id=<?php echo $row['unique_id']; ?>" class="button fas fa-comments"><span>  Chat</span></a>
      <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="button fas fa-sign-out-alt"><span> Logout</span></a>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
