<?php
    session_start();
    include("connection.php");
    include "mail_function.php";
            date_default_timezone_set("Asia/Kolkata");
            $success = "";
            $error_message="";
            $connect = mysqli_connect("localhost", "root","", "online-voting-system");
            if(!empty($_POST["submit_email"])){
                $result = mysqli_query($connect,"SELECT * FROM registered_users WHERE email='".$_POST["email"]."'");
                $count = mysqli_num_rows($result);
                if($count>0){
                    $otp = rand(100000,999999);
                    $mail_status = sendOTP($_POST["email"],$otp);
                    if($mail_status == 1){
                        $result=mysqli_query($connect,"INSERT INTO otp_expiry(otp,is_expired,create_at)
                        VALUES ('".$otp."',0,'".date("Y-m-d H:i:s")."')");
                        $current_id = mysqli_insert_id($connect);

                        if(!empty($current_id)){
                            $success=1;
                        }
                    }
                }   else{
                    $error_message = "Email not exists..!!!";
                }
            }
            if(!empty($_POST["submit_otp"])){
                $result = mysqli_query($connect,"SELECT * FROM otp_expiry WHERE otp='".$_POST["otp"]."' AND 
                is_expired !=1 AND NOW()<=DATE_ADD(create_at,INTERVAL 10 MINUTE" );
                $count = mysqli_num_rows($result);
                if(!empty($count)){
                    $result = mysqli_query($connect,"UPDATE otp_expiry SET is_expired = 1 WHERE otp='".$_POST["otp"]."'");
                    $success=2;
                }else{
                    $success=1;
                    $error_message="Invalid OTP..!!!";
                }
            }
            if(!empty($error_message)){

                echo $error_message;
            }
            if(!empty($success == 2)){
                ?>
                <input type="text" style="width: 15%" name="otp" placeholder="Enter OTP" required><br><br>
                <button id="loginbtn" style= "cursor:pointer; width:65px; border-radius:8px; margin-right=5px" type="submit" name="otp">SUBMIT</button>
                <?php
            }
                else if($success == 2){
                        echo '<script>
                        alert("You have successfully logged in");
                        window.location = "../routes/dashboard.php";
                    </script>';
                    }
    ?>