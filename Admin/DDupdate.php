<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            input[type="number"],select,
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
        <p>edit the delivery boy of the shop</p>
       <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
    </section>
     <?php
        include 'header.php';
        ?>  
        
               <?php           
$username = $_REQUEST['USERNAME'];
            $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
          

            if (!$c) {
                die("error in code");
            }
          

            if(isset($_POST['btnupdate']))
            {
            $username = $_POST["txtuname"];
            $name = $_POST["txtname"];
            $gender = $_POST["gender"];
            $dob = $_POST["dob"];
            $cno = $_POST["cno"];
            $email = $_POST["email"];
            $designation = $_POST["txtdesig"];
            $address= $_POST["txtadd"];
            $city = $_POST["city"];
            $pin = $_POST["txtpin"];
            $salary = $_POST["txtsalary"];
            $status = $_POST["status"];
           
//             $date = $_POST["dateadd"];
//             $password = $_POST["txtpass"];
            $selectedPincodes = implode(",", $_POST['pincodede']);
             $qu = "update tbldeliveryboyregistration set NAME='$name',GENDER='$gender',DOB='$dob',CNO=$cno,EMAIL_ID='$email',DESIGNATION='$designation',ADDRESS='$address',CITY='$city',PINCODE=$pin,SALARY=$salary,STATUS='$status',pincodefordelivery=' $selectedPincodes' where USERNAME='$username'";
            $quee=mysqli_query($c,$qu);
            

            
            
            if (!$quee) {

            echo "<script>
               alert('Not update');
               
           </script>";
        }
        else {

             echo "<script>
                   alert('update successfully');
                   window.location.href = 'DDview.php'; 
           </script>";
        }
            }
            
          
                 $u="select * from tbldeliveryboyregistration where USERNAME='$username';";
                 $v=mysqli_query($c,$u);
             
           
             while ($r = mysqli_fetch_assoc($v)) {
                
                
            $username = $r["USERNAME"];
            
            $name = $r["NAME"];
            $g = $r["GENDER"];
            $dob = $r["DOB"];
            $cno = $r["CNO"];
            $email = $r["EMAIL_ID"];
            $designation = $r["DESIGNATION"];
            $address= $r["ADDRESS"];
            $city = $r["CITY"];
            $pin = $r["PINCODE"];
            $salary =$r["SALARY"];
            $status = $r["STATUS"];
//            $date = $r["DATEADDED"];
//            $password = $r["PASSWORD"];
       
$savedPincodes = explode(",", $r['pincodefordelivery']);
             }
             
            ?>
        <div class="tables">
               <h1>Edit Deliveryboy</h1>
         
        <form method="post">
          <table>
              
               
               
                <tr>
                    <td>
                        <label>Username:</label> 
                    </td>
                    <td><input type="text" name="txtuname"  title="you can enter the alpahabet and numbers" required="" value="<?php echo $username;  ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>name:</label>
                    </td>
                    <td><input type="text" name="txtname" title=" enter the alpahabets only" pattern="^[A-Za-z\s]*$" required="" placeholder="enter name" value="<?php echo $name;  ?>"</td>
                </tr>
                <tr>
                    <td>
                         <label>Gender:</label>
                    </td>
                     <td><input type="radio" name="gender" value="M"<?php if($g=='M') echo 'checked';  ?>>Male
                        <input type="radio" name="gender" value="F"<?php if($g=='F') echo 'checked'; ?>>Female
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date-of-Birth:</label> 
                    </td>
                    <td><input type="date" name="dob" required="" value="<?php echo $dob;  ?>"</td>
                </tr>

                <tr>
                    <td>
                         <label>Contact no:</label>
                    </td>
                    <td><input type="text" name="cno" pattern="[0-9]{10}"  required="" title=" enter the numbers only" value="<?php echo $cno;  ?>"</td>
                </tr>

                <tr>
                    <td>
                         <label>Email_id:</label>
                    </td>
                    <td><input type="email" name="email" required="" placeholder="enter your email" value="<?php echo $email;  ?>"</td>
                </tr>

                <tr>
                    <td>
                         <label>Designation:</label>
                    </td>
                    <td><input type="text"  pattern="^[A-Za-z\s]*$" title=" enter the alpahabets only" name="txtdesig" required="" value="<?php echo $designation;  ?>"</td>
                </tr>
                <tr>
                    <td>
                         <label>Address:</label>
                    </td>
                    <td><input type="text"  name="txtadd" required="" value="<?php echo $address;  ?>"</td>
                </tr>

                <tr>
                    <td>
                        <label>City:</label> 
                    </td>
                    <td><input type="text" pattern="^[a-zA-Z]*$" title=" enter the alpahabets only" name="city" required=""  value="<?php echo $city;  ?>"</td>
                </tr>

                 <tr>
                    <td>
                        <label>Pin code:</label> 
                    </td>
                    <td><input type="text" title=" enter the alpahabets only" pattern="[0-9]{6}" name="txtpin" required="" value="<?php echo $pin;  ?>"</td>
                </tr>


                <tr>
                    <td>
                        <label>Salary:</label> 
                    </td>
                    <td><input type="text" name="txtsalary" pattern="^[0-9]*$" value="<?php echo $salary;  ?>"</td>
                </tr>

                <tr>
                    <td>
                        <label>Status:</label> 
                    </td>
                    <td><input type="radio" name="status" value="Active"<?php if($status=='Active') echo 'checked';  ?>>Active
                        <input type="radio" name="status" value="Inactive"<?php if($status=='Inactive') echo 'checked'; ?>>Inactive
                    </td>
                </tr>

  

<!--                  <tr>
                        <td><label>Date added:</label></td>
                        <td><input type="date" name="dateadd" required="" value="<?php //  echo $date;  ?>" ></td>
                    </tr>-->
                    
<!--                     <tr>
                        <td><label>password:</label></td>
                        <td><input type="password" name="txtpass" required="" value="<?php //  echo $password;  ?>" ></td>
                    </tr>
                    --><tr>
<td><label>Pincode For Delivery:</label></td>
                        <td><?php
                                                  $qt = "select * from tblpincode";
                                                  $qtr = mysqli_query($c, $qt);
                                          ?>
                                        <select name="pincodede[]"  multiple required="">
<!--                                          <option value=""></option>-->
       <?php
        // Display each pincode as an option, preselecting saved pincodes
        while ($rot = mysqli_fetch_row($qtr)) {
            $selected = in_array($rot[0], $savedPincodes) ? 'selected' : '';
            echo "<option value='" . $rot[0] . "' $selected>" . $rot[0] . "</option>";
        }
        ?>
                    </select></td>
                  
                    </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btnupdate" value="update" </td>
            
                </tr>
            </table>
              
        </form> 
    </div>

    </body>
</html>
<!--   <div class="container">
        <P>Welcome to Flower premium florist, where nature's beauty meets exceptional service! As a dedicated online flower shop, we specialize in delivering exquisite floral arrangements that brighten every occasion. Whether you’re celebrating a milestone, expressing your love, or simply wishing to bring joy to someone’s day, our carefully curated selection of flowers is designed to meet all your gifting needs.
        </p><br>
    <h2>Our Story</h2>
    
    <p>Founded in [Year], Flower premium florist began with a simple vision: to make the art of gifting flowers accessible and enjoyable for everyone. With a deep-rooted passion for floristry, our team has worked tirelessly to build a brand that prioritizes quality, creativity, and customer satisfaction. From our humble beginnings, we have grown into a trusted name in the online floral industry, thanks to the support of our wonderful customers.</p><br>
    
    <h2>Our Commitment to Quality</h2>
    
    <p>At Flower premium florist, we believe that every bouquet tells a story. That's why we source our flowers from the finest growers, ensuring that only the freshest and most vibrant blooms make it to our arrangements. Our expert florists handcraft each bouquet with precision and care, creating stunning designs that not only look beautiful but also evoke emotions and memories.</p><br><br>
    
    <h2>What We Offer</h2><br>
    
    <p> <h4>Everyday Bouquets:</h4><p>Perfect for any occasion, these arrangements bring joy to everyday moments.</p><br>
    
    <h4>Special Occasions:</h4><p> Celebrate birthdays, anniversaries, weddings, and more with customized designs that capture the spirit of the event.<p><br>
    <h4>Seasonal Selections:</h4><p>Embrace the beauty of each season with unique arrangements that highlight the best blooms available.<p><br>
    <h4>Sympathy Flowers:</h4><p>Offer comfort and support during difficult times with our thoughtfully designed sympathy arrangements.</P><br></p>
    <h2> Customer-Centric Service</h2>
    <p>We understand that ordering flowers online can be daunting, which is why we strive to make the process as easy and enjoyable as possible. Our user-friendly website allows you to browse and order with ease, while our dedicated customer service team is always available to assist you with any questions or special requests.</p><br>
    <h2> Delivery Excellence</h2>
    <p>Timely delivery is a cornerstone of our service. We work diligently to ensure that your flowers arrive on time and in pristine condition. With reliable delivery options, you can rest assured that your thoughtful gift will reach its destination as planned.</p><br>
    <h2>Our Vision</h2>
    <p>At Flower premium florist, our vision extends beyond simply selling flowers. We aim to foster connections, spread joy, and celebrate the beauty of life’s moments, big and small. Our commitment to sustainability means that we are also dedicated to environmentally friendly practices, from sourcing to packaging.</p><br>
    <h2>Join Our Community</h2>
    <p>We invite you to explore our beautiful arrangements and find the perfect bouquet for your loved ones. Join our growing community of flower enthusiasts on social media, where we share inspiration, tips, and the latest trends in floristry.

        Thank you for choosing Flower premium florist. We’re honored to be a part of your special moments and look forward to serving you with the finest floral creations!</p><br>
        </div>-->

