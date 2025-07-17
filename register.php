<?php
//session_start();
include 'headerindex.php';
//  session_start();
?>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "dbphpprojechflower";

$c = mysqli_connect($hostname, $username, $password, $database);
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
} 
//else {
//echo '<script>alert("Connection Succesfully");</script>';}
  
    if (isset($_POST["btnsubmit"])) {
        
         $gender = isset($_POST['rbgender']) ? $_POST['rbgender'] : '';
         $errors = [];
        $username = $_POST["user_name"];
        $fname = $_POST["first_name"];
        $mname = $_POST["middle_name"];
        $lname = $_POST["last_name"];
        $DOB = $_POST["dob"];
//        $gender = $_POST["rbgender"];
        $cno = $_POST["cno"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $pincode = $_POST["pin"];
        $email = $_POST["email"];
        
         if (empty($gender)) {
        $errors[] = 'Gender selection is required.';
    }

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//        $dateadded = $_POST["dateadded"];
        
//        $_SESSION['first_name']=$fname;
//       
//        $_SESSION['middle_name']=$mname;
//        echo $_SESSION['middle_name'];
//        
//        $_SESSION['last_name']=$lname;
//        
//        $_SESSION['dob']=$DOB;
//        $_SESSION['rbgender']=$gender;
//        $_SESSION['cno']=$cno;
//        $_SESSION['address']=$address;
//        $_SESSION['city']=$city;
//        $_SESSION['pin']=$pincode;
//        $_SESSION['email']=$email;
//        $_SESSION['dateadded']=$dateadded;
       
       if (empty($errors)) {
           
           echo "<script>alert('Validation successful');</script>";
//           $cname = $_POST['txtcategoryname'];

    // Query to check if the season already exists
    
    $dis="select * from tblregistration_customer where UNAME='$username'";
            $dq= mysqli_query($conn, $dis);

    if (mysqli_num_rows($dq) > 0) {
        // If any rows are returned, the season already exists
        echo '<script>alert("username already exists!")</script>';
    } else {
        // Insert query to save the new season
        $q = "INSERT INTO tblregistration_customer(UNAME,FNAME,MNAME,LNAME, DOB, GENDER,CNO,ADDRESS,CITY,PINCODE,EMAILID,PASSWORD)VALUES ('$username','$fname','$mname','$lname','$DOB','$gender',$cno,'$address','$city',$pincode,'$email','$password')";
        
        if (mysqli_query($conn, $q)) {
           echo "<script>alert('register successfully.');</script>";
            $_SESSION['UNAME']=$username;
            echo "<script>window.location.replace('profile.php')</script>";
        } else {
            echo "<script>alert('User not successfully registered.');</script>";
            echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
        }
    }
           
           
           
           
           
           
           
           
           
        //echo "<script>alert('Validation successful');</script>";
//        $qu = "INSERT INTO tblregistration_customer(UNAME,FNAME,MNAME,LNAME, DOB, GENDER,CNO,ADDRESS,CITY,PINCODE,EMAILID,PASSWORD)VALUES ('$username','$fname','$mname','$lname','$DOB','$gender',$cno,'$address','$city',$pincode,'$email','$password')";
        //$q = mysqli_query($c, $qu);

//        if (!$q) {
//            echo "<script>alert('User not successfully registered.');</script>";
//        } else {
//            echo "<script>alert('register successfully.');</script>";
//            $_SESSION['UNAME']=$username;
//            echo "<script>window.location.replace('profile.php')</script>";
        //}
        
        $qlog = "insert into tbllogin(UNAME,PASSWORD,ROLL) values('$username','$password','c')";
        $qlre = mysqli_query($c, $qlog);

    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        
        
      
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
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
                                            <a href="../index.php" title="Back to the home page">Home</a>
                                        </li>
                                        <li>



                                            <span>Create Account</span>


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
        
         <main role="main">

            <div class="register-area pt-80 pb-80 login-form-section">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                            <div class="login">
                                <div class="login-form-container">
                                    <div class="login-text mb-30">
                                        <h2>Create Account</h2>
                                        <span></span>
                                    </div>
                                    <div class="login-form">
                                        <form method="post" id="create_customer" accept-charset="UTF-8" data-login-with-shop-sign-up="true"><input type="hidden" name="form_type" value="create_customer" /><input type="hidden" name="utf8" value="✓" />

                                            <label for="UserName" class="hidden-label">User Name</label>
                                            <input type="text" name="user_name" id="UserName" class="input-full" placeholder="User Name" title="Must contain character" autocapitalize="words" autofocus required>

                                            <label for="FirstName" class="hidden-label">First Name</label>
                                            <input type="text" name="first_name" id="FirstName" class="input-full" placeholder="First Name" pattern="[A-Za-z\s]+" autocapitalize="words" title="Must contain character" autofocus required>

                                            <label for="MiddleName" class="hidden-label">Middle name</label>
                                            <input type="text" name="middle_name" id="MiddleName" class="input-full" placeholder="Middle Name" pattern="[A-Za-z\s]+" title="Must contain character" autocapitalize="words" required>

                                            <label for="LastName" class="hidden-label">Last Name</label>
                                            <input type="text" name="last_name" id="LastName" class="input-full" placeholder="Last Name" pattern="[A-Za-z\s]+" title="Must contain character" autocapitalize="words" required>

                                            <label>Date of Birth : </label>
                                            <input type="date" name="dob" class="input-full" required>

                                            <label class="hidden-label">Gender</label>
                                            <input type="radio" name="rbgender" value="M"><label>Male</label><br>
                                            <input type="radio" name="rbgender" value="F"><label>Female</label>
                                            <!--<select class="input-full" name="gender[]" style="border:1px solid buttonface" required>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Others</option>
                                            </select>-->
                                            <br><!-- comment -->
                                            <br>
                                            <label for="Cno" class="hidden-label">Contact Number</label>
                                            <input type="tel" name="cno" id="MobileNo" placeholder="Type your Mobile No" pattern="[0-9]{10}" maxlength="10" title="Must contain number" required>

                                            <label for="Address" class="hidden-label">Address</label>
                                            <textarea rows="2" name="address" cols="7" style="height: 40px;border-color: silver" placeholder="Enter address" required=""></textarea>
                                            <br><br>
                                            <label for="City" class="hidden-label">City</label>
                                            <input type="text" name="city" pattern="[A-Za-z]+" placeholder="Enter city name" required>

                                            <label class="hidden-label">Pincode</label>
                                            <input type="text" name="pin" pattern="[0-9]{6}" maxlength="6" title="Must contain number" placeholder="Enter pincode" required>


                                            <label for="Email" class="hidden-label">Email</label>
                                            <input type="email" name="email" id="Email" class="input-full" placeholder="Email"  autocorrect="off" autocapitalize="off" required>

                                            <label for="CreatePassword" class="hidden-label">Password</label>
                                            <input type="password" name="password" ppattern="(?=.*[!@#$%^&*]).{8,}"  title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)"  id="CreatePassword" class="input-full"  placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and 8 character" >

<!--                                            <label >Date Added: </label>
                                            <input type="date" name="dateadded" class="input-full" required>-->

                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="submit" class="section-button" value="Create" name="btnsubmit" style="width:200px; background-color:lightgrey;">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
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