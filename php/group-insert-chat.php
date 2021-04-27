<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $iv = '60dbd63e8d8967a09110d2caef6e6aab';
        $key = "19BCS407719BCS407519BCS407419BCS408519BCS4076";
        $encryption = openssl_encrypt($message, $ciphering, $key, $options, $iv);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$encryption}')") or die();
        }
    }else{
        header("location: ../login.php");
    }



?>
