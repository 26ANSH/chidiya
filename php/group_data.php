<?php
    while($row = mysqli_fetch_assoc($query))
    {
      $ciphering = "AES-128-CTR";
      $iv_length = openssl_cipher_iv_length($ciphering);
      $options = 0;
      $iv = '60dbd63e8d8967a09110d2caef6e6aab';
      $key = "19BCS407719BCS407519BCS407419BCS408519BCS4076";
        // $sql2 = "SELECT * FROM groups WHERE groups.group_unique_id=(SELECT grp_id FROM group_members WHERE member_id=$row['unique_id']})";
        // $query2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_assoc($query2);
        // (mysqli_num_rows($query2) > 0) ? $result = openssl_decrypt ($row2['msg'] , $ciphering, $key, $options, $iv): $result ="No message available";
        // (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        // if(isset($row2['outgoing_msg_id'])){
        //     ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        // }else{
        //     $you = "";
        // }
        // ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        // ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="group.php?grp_id='. $row['group_unique_id'] .'">
                    <div class="content">
                    <img src="php/images/default.png" alt="">
                    <div class="details">
                        <span>'. $row['group_name'].'</span>
                        <p>Members: '. $row['group_members'] .'</p>
                    </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>
