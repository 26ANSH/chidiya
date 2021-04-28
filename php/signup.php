<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $verify = 0;
    $activationcode=md5($email.time());

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
              $ran_id = rand(time(), 100000000);
              $status = "Active now";
              $encrypt_pass = md5($password);
              $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, status, activationcode, verify)
              VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$status}','{$activationcode}','{$verify}')");
              if($insert_query){
                  $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                  if(mysqli_num_rows($select_sql2) > 0)
                  {
                      $result = mysqli_fetch_assoc($select_sql2);
                      $_SESSION['unique_id'] = $result['unique_id'];
                      echo "success";

                      $add_grp = mysqli_query($conn, "INSERT INTO group_members VALUES('1001', {$result['unique_id']})");
                      $add_grp = mysqli_query($conn, "UPDATE mygrps SET group_members=group_members+1 WHERE group_unique_id=1001");
                  }
                  else
                  {
                      echo "This email address not Exist!";
                  }
              }
              else{
                  echo "Something went wrong. Please try again!";
              }
                }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
