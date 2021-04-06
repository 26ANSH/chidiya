<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $verify=0;
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

                                        $to=$email;
                                        $msg= "Thank you for new Registration.";
                                        $subject="Email verification @ Chidiya | chatting Website";
                                        $headers .= "MIME-Version: 1.0"."\r\n";
                                        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                                        $headers .= 'From:Chidiya | Chatting Website <info@phpgurukul.com>'."\r\n";
                                        $ms.="<html></body><div><div>Dear $fname,</div></br></br>";
                                        $ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
                                        <div style='padding-top:10px;'><a href='localhost:2000/chidiya/email_verification.php?code=$activationcode'>Click Here</a></div>
                                        <div style='padding-top:4px;'>Powered by <a href='localhost:2000/chidiya/index.html'>Chidiya</a></div></div>
                                        </body></html>";
                                        mail($to,$subject,$ms,$headers);
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
