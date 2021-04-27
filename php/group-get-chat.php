<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $iv = '60dbd63e8d8967a09110d2caef6e6aab';
        $key = "19BCS407719BCS407519BCS407419BCS408519BCS4076";
        $sql = "SELECT * FROM messages WHERE incoming_msg_id={$incoming_id} ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id)
                {
                    $decryption=openssl_decrypt ($row['msg'], $ciphering, $key, $options, $iv);
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $decryption .'</p>
                                </div>
                                </div>';
                }else
                {
                    $decryption=openssl_decrypt ($row['msg'], $ciphering, $key, $options, $iv);
                    $name = "SELECT fname FROM users WHERE unique_id={$row['outgoing_msg_id']}";
                    $name_query = mysqli_query($conn, $name);
                    $row_name = mysqli_fetch_assoc($name_query);
                    $output .= '<div class="chat incoming">
                                <img src="php/images/default.png" alt="">
                                <div class="details">
                                    <p>'. $decryption .'</p>
                                    '.$row_name['fname'].'
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>
