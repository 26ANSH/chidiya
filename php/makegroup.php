<?php
    include_once "config.php";
    $ran_id = rand(time(), 100000000);
    $add_grp = mysqli_query($conn, "INSERT INTO groups(group_unique_id, group_name, group_admin) VALUES({$ran_id},'{$_GET['code']}', {$_GET['unique_id']})");
    $add_grp = mysqli_query($conn, "INSERT INTO group_members VALUES({$ran_id}, {$_GET['unique_id']})");
?>
