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
.button {
  border-radius: 7px;
  background-color: yellow;
  border: none;
  color: black;
  text-align: center;
  font-size: 24px;
  padding: 18px;
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
  padding: 8px;
  font-size: 16px;
  color: white;
}
.edit:hover{
  background: white;
  padding: 5px;
  color: blue;
}

.dropbtn {
  background-color: blue;
  color: white;
  padding: 5px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 10px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: blue;
  color: white;

}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: white;
  color: blue;
}
</style>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <!-- php -->
          <img src="php/images/<?php echo $row['img']; ?>" alt="" style="width:120px; height: 120px;">
          <div class="details">
              <br>
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p>Email : <?php echo $row['email']; ?></p>
            <a href="" class="edit fas fa-user-edit"><span>Edit</span></a>
            <div class="dropdown">
              <button class="dropbtn"><?php echo $row['theme']; ?></button>
              <div class="dropdown-content">
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightblue">Default</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightgreen">Green</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightpink">Pink</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightskyblue">Sky Blue</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightsalmon">Orange</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=lightyellow">Yellow</a>
                <a href="php/theme.php?unique_id=<?php echo $row['unique_id']?>&code=black">Black</a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <br>
      <a href="chat.php?user_id=<?php echo $row['unique_id']; ?>" class="button fas fa-comments"><span>  Chat</span></a>
      <a href="group.php?grp_id=1001" class="button fas fa-group"><span>  Group</span></a>
      <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="button fas fa-sign-out-alt"><span> Logout</span></a>
            <!-- <a href="/group/chat.php?user_id=<?php echo $row['unique_id']; ?>" class="button fas fa-comments"><span>  Group Chat</span></a> -->
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
