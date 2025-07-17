<?php
//session_start();
include 'headerindex.php';
 $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "dbphpprojechflower";

// Connect to the database
            $c = mysqli_connect($hostname, $username, $password, $database);

            if (!$c) {
                die("Connection failed: " . mysqli_connect_error());
            }
//  session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
       
            
        <style>
           
            .register-area {
                padding-top: 80px;
                padding-bottom: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;

            }

         
            #RecoverPasswordForm {
                background-color: #f7f9fc; 
                border-radius: 12px;
                box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
                padding: 50px;
                max-width: 600px;
                margin: auto;
                font-family: 'Arial', sans-serif;
                transition: transform 0.3s ease-in-out;
            }

            #RecoverPasswordForm:hover {
                transform: translateY(-5px); 
            }

            .login-text h2 {
                font-size: 28px;
                color: #4169e1; 
                text-align: center;
                margin-bottom: 10px;
                font-weight: 700;
            }

            .login-text span {
                display: block;
                text-align: center;
                color: #666;
                margin-bottom: 30px;
                font-size: 16px;
            }

           
            .login-form input[type="email"],
            .login-form input[type="password"],
            .login-form input[type="del"] {
                width: 100%;
                padding: 15px;
                margin-bottom: 20px;
                border: 2px solid #ddd;
                border-radius: 8px; 
                background-color: #f9f9f9;
                color: #333;
                font-size: 16px;
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            .login-form input[type="email"]:focus,
            .login-form input[type="password"]:focus,
            .login-form input[type="del"]:focus {
                outline: none;
                border-color: lightblue; 
                box-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
            }

            /* Button styling */
            .section-button {
                width: 100%;
                padding: 15px;
                background-color: #ff69b4; 
                color: #fff;
                font-size: 18px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                display: block;
                margin: auto;
                transition: background-color 0.3s ease, box-shadow 0.3s ease;
                margin-bottom: 15px;
            }

            .section-button:hover {
                background-color: #4169e1;
                box-shadow: 0 10px 20px rgba(65, 105, 225, 0.3);
            }

            .button-box a {
                text-align: center;
                display: block;
                color: #ff69b4;
                text-decoration: none;
                font-size: 16px;
                margin-top: 15px;
            }

            .button-box a:hover {
                color: #4169e1;
            }

            /* Form layout */
            .login-toggle-btn {
                text-align: center;
            }

            
            @media (max-width: 768px) {
                #RecoverPasswordForm {
                    padding: 25px;
                }

                .login-text h2 {
                    font-size: 22px;
                }

                .login-form input[type="email"],
                .login-form input[type="password"],
                .login-form input[type="del"] {
                    padding: 12px;
                    font-size: 14px;
                }

                .section-button {
                    font-size: 16px;
                }
            }

        </style>
            
         <script>
                                    {
                                    var form=document.getElementById("formid");
                                    function submitForm(event){

                                     //Preventing page refresh
                                        event.preventDefault();
                                        }
                                        </script>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'C:\xampp\htdocs\Phpprojectflower\PHPMailer-master\src\PHPMailer.php';
        require 'C:\xampp\htdocs\Phpprojectflower\PHPMailer-master\src\Exception.php';
        require 'C:\xampp\htdocs\Phpprojectflower\PHPMailer-master\src\SMTP.php';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        
         if (isset($_POST['btnotp'])) {
            sendotp();
        } else if (isset($_POST['btnver'])) {
            verifyOTP();
        }
         else if (isset($_POST['btnchange'])) {
            store_data();
        }
        
        function sendotp() {
            if (isset($_POST['txtemail'])) {
                sendEmail($_POST['txtemail']);
                $_SESSION['vemail'] = $_POST['txtemail'];
                
            }
        }
        
        if (isset($_POST['btnver'])) {
            $_SESSION['vstatus'] = 1;
        }
        
        function verifyOTP() {
            if (isset($_POST['verify'])) {

                $enteredOTP = $_POST['verify'];
                $storedOTP = $_SESSION['otp'];
                $email = $_SESSION['email'];

                if ($enteredOTP == null) {
                    echo '<script>alert("Enter OTP First");</script>';
                }
                if ($enteredOTP == $storedOTP) {
//                    header("location: newpw.php");
                    echo '<script>alert("OTP verification successful for email: ' . $email . '");</script>';
                    $_SESSION['verifiystatus'] = 1;
                    
                } else {
                    echo '<script>alert("OTP verification failed.Please again send OTP.");</script>';
                    $_SESSION['verifiystatus'] = 0;
                }
            }
        }
 if (isset($_POST['btnoptt'])) 
         {
           $pw = $_POST['repassword'];
           $cpw = $_POST['confopw'];
           if($pw==$cpw)
           {
               store_data();
            header('location: login.php');
           
           } else 
        {
              echo "<script>alert('not match')</script>";
        }
         }

        function store_data() {
            

            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "dbphpprojechflower";

// Connect to the database
            $c = mysqli_connect($hostname, $username, $password, $database);

            if (!$c) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                
                if ($_SESSION['vstatus'] == 1 and $_SESSION['verifiystatus'] == 1) {
                    // Retrieve and sanitize user inputs
                    $email = mysqli_real_escape_string($c, $_POST['txtemail']);
                    $pass = password_hash($_POST['confopw'], PASSWORD_DEFAULT);

                    // Create the update query
                    $qu = "UPDATE tblregistration_customer SET password='$pass' WHERE EMAILID='$email'";

                    // Execute the query
                    $q = mysqli_query($c, $qu);

                    if (!$q)
                    {
                        // Display the error if the query failed
                        $e = mysqli_error($c);
                        die("Error: " . $e);
                    } else 
                    {
                    
                        // Display success message and redirect
                        echo '<script>alert("Password Change Successful")</script>';
                        echo '<script>location.replace("login.php")</script>';
                    }
                } else {
                    echo '<script>alert("Something Wrong to verify")</script>';
                }
                // Close the database connection
//             mysqli_close($c);
                }
        }

       
        function sendEmail($recipient_email) {
            try {

 $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "dbphpprojechflower";

// Connect to the database
            $c = mysqli_connect($hostname, $username, $password, $database);

            if (!$c) {
                die("Connection failed: " . mysqli_connect_error());
            }
                $recipient_email = $_POST['txtemail'];
//                $recipient_email="22bmiit061@gmail.com";
                $otp = mt_rand(100000, 999999);

                $mail = new PHPMailer(true);

// SMTP settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'divyaghori29@gmail.com'; //enter email adddress
                $mail->Password = 'qojzkvrjwikguqmk'; // Remove space at the end Enter email password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

// Sender and recipient
                $mail->setFrom('divyaghori29@gmail.com', 'divya');
                $mail->addAddress($recipient_email);

// Email content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body = getEmailTemplate($otp);
                
                
                
                //$conn= mysqli_connect("localhost","root","","dbphpprojechflower");

                
                $email=$_POST['txtemail'];

    // Query to check if the season already exists
    
    $dis="select * from tblregistration_customer where EMAILID='$email'";
            $dq= mysqli_query($c, $dis);

    if (mysqli_num_rows($dq) > 0) {
        // If any rows are returned, the season already exists
        echo '<script>alert("email registered!")</script>';
        $mail->send();

               
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $recipient_email;
                echo "<script>alert('OTP send successfully')</script>";
        
    } else {
        echo '<script>alert("email not registered!")</script>';
    }


// Send email
//                $mail->send();
//
//               
//                $_SESSION['otp'] = $otp;
//                $_SESSION['email'] = $recipient_email;
//                echo "<script>alert('OTP send successfully')</script>";
                //header("Location: OTPVerification.php");
                // exit();
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
        
        function getEmailTemplate($otp) {
            return '
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                        }
                        .header {
                            background-color: pink;
                            color: #ffffff;
                            padding: 10px;
                            text-align: center;
                        }
                        .content {
                            margin-top: 20px;
                            text-align: center;
                        }
                        .footer {
                            background-color: #f4f4f4;
                            color: #666666;
                            padding: 10px;
                            text-align: center;
                            font-size: 12px;
                            border-top: 1px solid #ddd;
                        }
                        .otp-code {
                            font-size: 24px;
                            font-weight: bold;
                            margin: 20px 0;
                        }
                    </style>
                </head>
                <body>
                 <div class="container">
                        <div class="header">
                            <h1>Flower Premium Florist</h1>
                        </div>
                        <div class="content">
                            <p>Dear User,</p>
                            <p>Your One-Time OTP for email verification is:</p>
                            <h2>New OTP</h2>
                            <div class="otp-code">' . $otp . '</div>
                            <p>Use this OTP for verify email address.</p>
                            <p>If you did not request this OTP, please ignore this email.</p>
                        </div>
                        <div class="footer">
                            <p>© 2024 E-Auction System. All rights reserved.</p>
                            <p><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></p>
                        </div>
                    </div>
                    </body>
                </html>';
        }

        ?>
       
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- BREADCRUMBS SETCTION START -->

        <div class="breadcrumbs-section">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumbs-inner ptb-20">

                                <nav class="" role="navigation" aria-label="breadcrumbs">
                                    <ul class="breadcrumb-list">

                                        <li>
                                            <a href="index.php" title="Back to the home page">Home</a>
                                        </li>
                                        <li>



                                            <span>Account</span>


                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BREADCRUMBS SETCTION END -->
<!--meet-->
        <main role="main">

            <div class="register-area pt-80 pb-80 login-form-section">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8 col-md-12 col-12">


                            <div id="RecoverPasswordForm" class="login">
                                <form method="post" id='formid' >

                                    <div class="login-text">
                                        <h2>Reset your password</h2>
                                        <span>We will send you an otp for reset your password.</span>
                                    </div>
                                    <div class="login-form">

                                        <input type="email" value="" name="txtemail" id="RecoverEmail" class="input-full" placeholder="Email" 
                                               <?php if (isset($_POST['txtemail'])) echo 'value="' . htmlspecialchars($_POST['txtemail']) . '"'; ?> required>

                                        <input type="submit" name="btnotp" value="send otp" style="width:200px; background-color:lightgrey;" class="section-button">

                                        <input type="del" maxlength="6" value="" name="verify"  class="input-full" placeholder="Enter otp" 
                                               <?php if (isset($_POST['verify'])) echo 'value="' . htmlspecialchars($_POST['verify']) . '"'; ?>>
                                        <input type="submit" name="btnver" value="Verify otp"  style="width:200px; background-color:lightgrey;" class="section-button">


<!--pattern="(?=.[!@#$%^&]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)"-->
                                        <input type="password" value="" name="repassword"   class="input-full" placeholder="Enter a new password" >
                                        <input type="password" value="" name="confopw"  class="input-full" placeholder="Conform password" >


                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="submit" value="submit" name="btnchange" style="width:200px; background-color:lightgrey;" class="section-button">
                                                <a href="#" >Cancel</a>  
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>



                            <div class="note form-success" id="ResetSuccess" style="display: none;">
                                We&#39;ve sent you an email with a link to update your password.
                            </div>


                            <div id="RecoverPasswordForm" style="display: none;" class="login">



                                <form method="post" action="register.php"  >
                                    <input type="hidden" name="form_type" value="recover_customer_password" />
                                    <input type="hidden" name="utf8" value="✓" />





                                    <div class="login-form-container">
                                        <div class="login-text">
                                            <h2>Reset your password</h2>
                                            <span>ReEnter your password and conform your password.</span>
                                        </div>
                                        <div class="login-form">
                                            <input type="password" value="" name="repassword"  pattern="(?=.[!@#$%^&]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" class="input-full" placeholder="Enter a new password" >
                                            <input type="password" value="" name="confopw"  pattern="(?=.[!@#$%^&]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" class="input-full" placeholder="Conform password" >
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <button type="submit" name="btnoptt">Submit</button>
                                                    <a href="#" id="HideRecoverPasswordLink">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>


     

<?php
 
include 'aboutusfooter.php';

?>
    </body>
</html>