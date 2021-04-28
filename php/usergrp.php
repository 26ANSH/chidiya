<?php
    include_once "config.php";
    $data = mysqli_query($conn, "SELECT * FROM groups WHERE joinkey='{$_GET['code']}'");
    $row = mysqli_fetch_assoc($data);
    $add_grp = mysqli_query($conn, "INSERT INTO group_members VALUES({$row['group_unique_id']}, {$_GET['unique_id']})");
    $add_grp = mysqli_query($conn, "UPDATE groups SET group_members=group_members+1 WHERE group_unique_id={$row['group_unique_id']}");
?>
