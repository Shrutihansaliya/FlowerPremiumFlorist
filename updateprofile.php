<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include 'headerindex.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
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


            h1 {
                text-align: center;
                margin-top: 20px;
            }

            
        </style>
    </head>
    <body>
        
        <div class="tables">
            <?php
      
            if (!isset($_SESSION['UNAME'])) {
                echo "<script>
                   
                   window.location.href = 'login.php'; 
           </script>";
            }
 else {
     $usname=$_SESSION['UNAME'];
 }
            $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

            if (!$c) {
                die("ok");
            }


            if (isset($_POST['btnupdate'])) {
              

                $uname = $_POST["txtuname"];
                $fname = $_POST["txtname"];
                $midname = $_POST["txtmid"];
                $lname = $_POST["txtlname"];
                $dob = $_POST["dob"];
                $gender = $_POST["gender"];
                $cno = $_POST["cno"];
                $address = $_POST["txtadd"];

                $city = $_POST["city"];
                $pincode = $_POST["txtpin"];
                $email = $_POST["email"];
//                $pass = $_POST[""];
//                $dateadded = $_POST["dobb"];

                $qu = "update tblregistration_customer set FNAME='$fname',MNAME='$midname',LNAME='$lname',DOB='$dob',GENDER='$gender',CNO='$cno',ADDRESS='$address',CITY='$city',PINCODE=$pincode,EMAILID='$email' where UNAME='$usname'";
                $quee = mysqli_query($c, $qu);

                if (!$quee) {

                    echo "<script>
               alert('Not update');
               
           </script>";
                } else {

                    echo "<script>
                   alert('update successfully');
                   window.location.href = 'profile.php'; 
           </script>";
                }
            }

                $u = "select * from tblregistration_customer where UNAME='$usname'";
            $v = mysqli_query($c, $u);

            while ($r = mysqli_fetch_assoc($v)) {

                $uname = $r["UNAME"];
                $fname =$r["FNAME"];
                $midname =$r["MNAME"];
                $lname = $r["LNAME"];
                $dob = $r["DOB"];
                $gender =$r["GENDER"];
                $cno = $r["CNO"];
                $address = $r["ADDRESS"];

                $city = $r["CITY"];
                $pincode =$r["PINCODE"];
                $email = $r["EMAILID"];
//                $pass = $_POST[""];
//                $dateadded = $r["DATEADDED"];
                
            }
           
            
            ?>

            <form method="post">
                <table>



                    <tr>
                        <td>
                            <label>Username:</label> 
                        </td>
                        <td><input type="text" name="txtuname" placeholder="enter username" readonly value="<?php echo $uname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> first name:</label>
                        </td>
                        <td><input type="text" name="txtname" pattern="^[A-Za-z\s]*$" required="" placeholder="enter name" value="<?php echo $fname; ?>"</td>
                    </tr>
                    <td>
                        <label> middle name:</label>
                    </td>
                    <td><input type="text" name="txtmid" required="" pattern="^[A-Za-z\s]*$" placeholder="enter name" value="<?php echo $midname; ?>"</td>
                    </tr>

                    <td>
                        <label> last name:</label>
                    </td>
                    <td><input type="text" name="txtlname" required="" pattern="^[A-Za-z\s]*$" placeholder="enter name" value="<?php echo $lname;?>"</td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date-of-Birth:</label> 
                        </td>
                        <td><input type="date" name="dob" required="" value="<?php echo $dob; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Gender:</label>
                        </td>
                        <td><input type="radio" name="gender"  value="M"<?php if ($gender == 'M') echo 'checked'; ?>>M
                            <input type="radio" name="gender"  value="F"<?php if ($gender == 'F') echo 'checked'; ?>>F
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label>Contact no:</label>
                        </td>
                        <td><input type="text" name="cno" pattern="[0-9]{10}" required="" placeholder="enter your contact no" value="<?php echo $cno; ?>"</td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address:</label>
                        </td>
                        <td><input type="text" name="txtadd" required="" value="<?php echo $address; ?>"</td>
                    </tr>
                    <tr>
                        <td>
                            <label>City:</label> 
                        </td>
                        <td><input type="text" name="city" pattern="^[a-zA-Z]*$" required="" value="surat" value="<?php echo $city; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Pincode:</label> 
                        </td>
                        <td><input type="text" name="txtpin" required="" pattern="[0-9]{6}" value="<?php echo $pincode; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email_id:</label>
                        </td>
                        <td><input type="email" name="email" required="" placeholder="enter your email" value="<?php echo $email; ?>"</td>
                    </tr>

<!--                    <tr>
                        <td>
                            <label>Date added:</label> 
                        </td>
                        <td><input type="date" name="dobb" required="" value="<?php echo $dateadded; ?>"</td>
                    </tr>-->






<!--                <tr>
      <td>
          Password:
      </td>
      <td><input type="password" name="txtpass" value="<?php // echo $pass;    ?>"</td>
  </tr>-->




                    <tr>
                        <td colspan="2"><input type="submit" name="btnupdate" value="update" </td>

                    </tr>
                </table>

            </form> 
        </div>
<?php include 'aboutusfooter.php';?>
    </body>
</html>
