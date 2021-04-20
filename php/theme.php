<?php
    include_once "config.php";
    $sql = mysqli_query($conn, "UPDATE users SET theme='{$_GET['code']}' WHERE unique_id='{$_GET['unique_id']}'");
    header("location: ..");
?>
