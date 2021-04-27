<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM groups WHERE groups.group_unique_id=(SELECT grp_id FROM group_members WHERE member_id={$outgoing_id})";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "group_data.php";
    }
    echo $output;
?>
