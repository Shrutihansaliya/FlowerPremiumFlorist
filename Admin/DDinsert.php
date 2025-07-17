<?php
  $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
                if (!$c) {
                    die('error in code');
                }
?>
<html>
    <head>
                          
        <style>
             
            /* User links */
            .user-links {
                display: flex;
                float: right;
                padding: 0px 20px 0px 20px;
            }

            .user-links a {
                text-decoration: none;
                color: blue;
                font-size: 20px;
                margin-left: 20px;

            }

            /* Welcome section */
            .welcome-section {
                text-align: center;


                padding:20px 0px 40px 0px;

                background-color: #f7f7f7;
            }

            .welcome-section h1 {
                font-size: 36px;
                color: #333;
                margin-bottom: 10px;
                margin-right: 150px;
            }

            .welcome-section p {
                font-size: 18px;
                color: #666;
                margin-right: 150px;
            }
           
            .ilogo{
                float:left;
                width:250px;
                padding: 10px 20px 10px 20px;
            }

            form button {
                align-content: center;
                background-color: black;
                color: #fff;
                border: none;
                margin-left: 30px;
                border-radius: 4px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            form button:hover {
                background-color: #0056b3;
            }


           
          .tables form {
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
            }

            .tables table {
                width: 100%;
                border-collapse: collapse;
            }

            .tables td, th {

                padding: 10px;
                text-align: left;
            }

            .tables input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="date"],
            input[type="number"],
            input[type="password"],select,
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #f4f4f9;

            }

            .tables input[type="submit"] {
                width: 100px;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                display: block;
                margin: 20px auto;
                background-color: black;
                color: #fff;
            }
            .tables label{
                font-weight: bold;
            }
            .tables input[type="submit"]:hover {
                background-color: #0056b3;
            }


            .radio-group {
                margin-bottom: 10px;
            }

            .radio-group label {
                margin-right: 10px;
            }


            .tables h1 {
                text-align: center;
                margin-top: 20px;
            }
            /* General reset */
                    </style>
    </head>
    <body>
        <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Manage Delivery Boy</h1>
            <p> add the delivery boy of the shop</p>
            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
         <?php
        include 'header.php';
        ?>
        <br>
        <br>
       
        <div class="tables">
             <h1>Delivery Boy register</h1>
            <form method="POST" enctype="multipart/form-data">
                <table>

                    <tr>
                        <td><label for="username">username:</label></td>
                        <td><input type="text" name="txtuname" title="you can enter the alpahabet and numbers"  required="" placeholder="enter username"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">name:</label>
                        </td>
                        <td><input type="text" name="txtname" title=" enter the alpahabets only"  pattern="^[A-Za-z\s]*$" required="" placeholder="enter name"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gender">Gender:</label>
                        </td>
                        <td><input type="radio" name="gender" value="M">Male <input type="radio" name="gender" value="F">Female </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date-of-Birth:</label> 
                        </td>
                        <td><input type="date" name="dob" required=""></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="cno"> Contact no:</label>
                        </td>
                        <td><input type="text" name="cno" pattern="^[0-9]{10}*$" title=" enter the numbers only"  placeholder="enter contact no" required=""></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="Email_id:">Email_id:</label>
                        </td>
                        <td><input type="email" name="email" placeholder="enter your email" required=""></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="designation">Designation:</label>
                        </td>
                        <td><input type="text" name="txtdesig" title=" enter the alpahabets only" pattern="^[A-Za-z\s]*$" required="" placeholder="enter designation"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address">Address:</label> 
                        </td>
                        <td><input type="text" name="txtadd" required="" placeholder="enter address"></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="City:">City:</label>
                        </td>
                        <td><input type="text" name="city" pattern="^[A-z]*$" placeholder="enter city" required=""></td>
                    </tr>
                    <tr>
                        <td>
                            <label >Pincode:</label>
                        </td>
                        <td><input type="text" name="txtpin" pattern="[0-9]{6}" required=""></td>
                    </tr>
                     <tr>
                            <td>
                                <label>Photo</label>
                            </td>
                            <td>
                                <input type="file" name="photo" required="">
                            </td>
                        </tr>

      

                    <tr>
                        <td>
                            <label for="salary">salary:</label>
                        </td>
                        <td><input type="text" name="txtsalary" pattern="^[0-9]*$" required="" placeholder="enter salary"></td>
                    </tr>

<!--                    <tr>
                        <td>
                            <label>Status:</label>
                        </td>
                        <td><input type="radio" name="status"  title=" enter the alpahabets only" required="" value="active">Active <input type="radio" name="status" value="inactive" required="">Inactive</td>
                    </tr>-->

                   
                    
                    
                    <tr>
                        <td><label>Pincode For Delivery:</label></td>
                        <td><?php
                                                  $qt = "select * from tblpincode";
                                                  $qtr = mysqli_query($c, $qt);
                                          ?>
                                        <select name="pincodede[]"  multiple required="">
                                          <!--<option value=""></option>-->
                                         <?php
                                            while ($rot = mysqli_fetch_row($qtr)) {
                                                    echo "<option value='" . "$rot[0]" . "'>$rot[0]</option>";
                                                 }
                                         ?>
                    </select></td>
                    </tr>
                    
                     <tr>
                        <td><label>Password:</label></td>
                        <td><input type="password" pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" name="txtpass" required="" ></td>
                    </tr>

                    <tr>
                        <td colspan="2"><input type="submit" name="btninsert" value="insert"> </td>

                    </tr>

                </table>
                <?php
                $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
                if (!$c) {
                    die('error in code');
                }
                if (isset($_POST['btninsert'])) {
                     $filename=$_FILES["photo"]["name"];
                        $tempname=$_FILES["photo"]["tmp_name"];
                        $folder="images/".$filename;
                        move_uploaded_file($tempname,$folder);
                    $username = $_POST["txtuname"];
                    $name = $_POST["txtname"];
                    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
                    $errors = [];
//                    $gender = $_POST["gender"];
                    $dob = $_POST["dob"];
                    $cno = $_POST["cno"];
                    $email = $_POST["email"];
                    $designation = $_POST["txtdesig"];
                    $address = $_POST["txtadd"];
                    $city = $_POST["city"]; 
                    $pin=$_POST["txtpin"];
                    $salary = $_POST["txtsalary"];
//                    $status = $_POST["status"];
           
//                  $date = $_POST["dateadd"];
                   $pass = $_POST["txtpass"];
            $password = password_hash($pass, PASSWORD_DEFAULT);
             if (empty($gender)) {
        $errors[] = 'Gender selection is required.';
    }
               
               $pinfordelivery = implode(",", $_POST['pincodede']);
               
                    echo $pinfordelivery;
if (empty($errors)) {
        echo "<script>alert('Validation successful');</script>";
        $qu = "insert into tbldeliveryboyregistration(USERNAME,NAME,GENDER,DOB,CNO,EMAIL_ID,DESIGNATION,ADDRESS,CITY,PINCODE,PHOTO,SALARY,PASSWORD,pincodefordelivery) values('$username','$name','$gender','$dob',$cno,'$email','$designation','$address','$city',$pin,'$folder',$salary,'$password','$pinfordelivery')";
         $q = mysqli_query($c, $qu);
           $qde = "insert into tbllogin(DUNAME,PASSWORD,ROLL) values('$username','$password','d')";
        $qdelre = mysqli_query($c, $qde);        
                    if (!$q) {
                        echo "<script> alert('not inserted'); </script>";
                    } else {
                       
                        echo "<script>
                   alert('Inserted successfully');
                   window.location.href = 'DDview.php'; 
           </script>";
                    }
}
 else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
            }}
                }
                ?>   

            </form>
        </div>
    </body>
</html>

