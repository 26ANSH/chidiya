<?php
    include_once "config.php";
    $ran_id = rand(1000, 10000);
    $person = $_GET['unique_id'];
    $check = mysqli_query($conn, "SELECT * FROM mygrps WHERE group_unique_id={$_GET['q']}");
    $row = mysqli_fetch_assoc($check);
    if($row['group_admin'] == $person)
    {
      $add_grp = mysqli_query($conn, "UPDATE mygrps SET joinkey={$ran_id} WHERE group_unique_id={$_GET['q']}");
      echo "Activation key is ".$ran_id;
    }
    else
    {
      echo "YOU ARE NOT ADMIN";
    }
?>
