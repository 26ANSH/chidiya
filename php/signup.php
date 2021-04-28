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
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, activationcode, verify)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}','{$activationcode}','{$verify}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0)
                                    {
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";

                                        $add_grp = mysqli_query($conn, "INSERT INTO group_members VALUES('1001', {$result['unique_id']})");
                                        $add_grp = mysqli_query($conn, "UPDATE groups SET group_members=group_members+1 WHERE group_unique_id=1001");
                                        // $to=$email;s
                                        // $msg= "Thank you for new Registration.";
                                        // $subject="Email verification @ Chidiya | chatting Website";
                                        // $headers = "From: project_mitron@yahoo.com \r\n";
                                        // $headers .= "MIME-Version: 1.0" . "\r\n";
                                        // $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                                        // $ms ="<a href='http://localhost:2000/chidiya/php/email_verification.php?code=$activationcode'>Verify Your Account</a>";
                                        //
                                        // //header('location:chidiya/index.php')
                                        //
                                        // mail($to,$subject,$ms,$headers);
                                        // <script>alert('Registration successful, please verify your account from the link given in your Email-Id');</script>;
                                        // <script>window.location = 'login.php';</script>;
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
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
