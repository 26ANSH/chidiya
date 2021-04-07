<?php
  // session_start();
  include_once "config.php";
    $user_id = $_GET['unique_id'];
    $theme = $_GET['code'];
    // echo "UPDATE users SET theme='{$theme}' WHERE unique_id=$user_id";
    $sql = mysqli_query($conn, "UPDATE users SET theme='{$theme}' WHERE unique_id=$user_id");
    header("location: ../users.php");
?>
