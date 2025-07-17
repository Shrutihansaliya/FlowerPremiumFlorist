<?php
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$conn) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}
//session_start();
include 'headerindex.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flower Details</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <style>


            /* Main container styling */
            .scontainer {
                display: flex;
                width: 80%;
                max-width: 1000px;
                margin: 50px auto;
                background-color: #fff;
                border-radius: 12px;
                overflow: hidden;
            }

            /* Left column (image) styling */
            .sleft-column {
                max-width: 50%;
                flex: 40%;
                padding: 20px;
                background-color: #f1f1f1;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            /* Image styling */
            .simg {
                max-width: 100%;
                /*height: auto;*/
                height: 500px;
                border: 3px solid white;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                margin-top: 20px;
                border-radius: 8px;
            }

            /* Right column (form) styling */
            .sright-column {
                flex: 60%;
                padding: 20px;
            }

            h2 {
                color: #333;
                font-size: 1.8rem;
                text-align: center;
                border-bottom: 2px solid #007BFF;
                padding-bottom: 10px;
            }

            /* Input fields */
            label {
                font-weight: bold;
                color: #333;
                font-size: 1rem;
                margin-bottom: 8px;
            }

            textarea, input[type="text"], input[type="date"],select {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1rem;
                margin-bottom: 20px;
                background-color: #f9f9f9;
                transition: border-color 0.3s ease;
            }

            input[type="submit"] {
                width: 100%;
                background-color: #007BFF;
                color: white;
                padding: 10px;
                border: none;
                cursor: pointer;
                font-size: 1.2rem;
                transition: background-color 0.3s ease;
                margin-top: 20px;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            
            h3{
                font-size: 34px;
            }
            p{
                font-size: 22px;
            }
            /* Responsive styling */
            @media (max-width: 768px) {
                .scontainer {
                    flex-direction: column;
                }

                .sleft-column, .sright-column {
                    flex: 100%;
                }

                h2 {
                    font-size: 1.5rem;
                }

                input[type="submit"] {
                    font-size: 1rem;
                    padding: 12px;
                }
            }
        </style>

            <script>
                 $(document).ready(function () {
                    $('#btnpayment').hide();
                    $('#pdesc').val("");
                     $('#pay').change(function () {
                         t=$(this).val();
                         if(t=='Online'){
                             $('#btnpayment').show();
                         }
                         else{
                              $('#btnpayment').hide();
                         }
                        
                    });
                });btnpayment
                typepay
                </script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    </head>
    <body>
        <?php
        if (!isset($_SESSION['itemid']) && !isset($_SESSION['qty']) ) {
    die("No item selected.");
}else{
          $iid = $_SESSION['itemid'];
$quantity= $_SESSION['qty'];}

    // Fetch item details
            $q2 = "select * from tblitem where ITEM_ID='$iid'";
            $qu2 = mysqli_query($conn, $q2);
            $r2 = mysqli_fetch_assoc($qu2) ;
                $vid = $r2['ITEM_ID'];
                $name = $r2['NAME'];
                $description = $r2['DESCRIPTION'];
                $price = $r2['PRICE'];
                $photo = $r2['PHOTO'];
                $path = "Admin/" . $photo;
 // Check if category is not allowed
                if ($cid == 1) {
        die("This category is not available for purchase.");
    } 
    // Calculate total price
    $gst = ($price * 0.08) * $quantity;
    $dcharge = 30;
    $total = ($price * $quantity) + $gst + $dcharge;
//                echo $photo;


            if (isset($_POST['order'])) {
                if (!isset($_SESSION['UNAME'])) {
                    echo '<script>alert("For buying any product you need to register first")</script>';
                    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
                } else {
//                echo $vid;
                    $pid = $_SESSION['itemid'];

                    $p = $price;

                    $uname = $_SESSION['UNAME'];
                    $add = $_POST['address'];
                    $type = $_POST['type'];

                    if ($type == 'Cash on delivery') {
                        $status = "Pending";
                        $paydate=null;
                    } else {
                        $status = "Done";
//                        PAY_DATE
                        $paydate=date("Y-m-d");
                    }
                    $pin = $_POST['pincode'];
                    if ($_POST['delivery_date'] == "tomorrow") {
                        $tomorrow = date('Y-m-d', strtotime('+1 day'));
                        $ddate = $tomorrow;
                    } elseif ($_POST['delivery_date'] == "two_days_later") {
                        $twoDaysLater = date('Y-m-d', strtotime('+2 days'));
                        $ddate = $twoDaysLater;
                    } else {
                        $ddate = $_POST['ddate'];
                    }

                    $dboy = "select pincodefordelivery,USERNAME from tbldeliveryboyregistration;";
                    $dr = mysqli_query($conn, $dboy);
//                    $dname = null;
                    
                    
                    while ($rd = mysqli_fetch_assoc($dr)) {
//                       echo $rd['pincodefordelivery'] . "," . $rd['USERNAME'];
                        $pdb = $rd['pincodefordelivery'];
                        $pinarray = explode(",", $pdb);
//print_r($pinarray);
//echo $pin;
                        if (in_array($pin, $pinarray)) {
                            $dname = $rd['USERNAME'];
                           
//                            echo "ya";
//                            echo $rd['pincodefordelivery'] . "," . $rd['USERNAME'];
                             break;
                        }
                        else {
//                            echo "no";
//                             die("No delivery boy available for this pincode.");
                             continue;
                        }
                    }
//                    echo $p,"<br>","<br>",$gst,"<br>",$total;
//                    echo $pid, "<br>", $quantity, "<br>", $price, "<br>", $total, "<br>", $gst, "<br>",$paydate,"<br>", $dcharge, "<br>", $total, "<br>", $uname, "<br>", $add, "<br>", $ddate, "<br>", $status, "<br>", $type;
                    $i = "insert into tblorder(P_ID,UNAME,QUANTITY,PRICE,TOTAL_PRICE,GST,PAY_DATE,STATUS,DELIVERY_CHAEGE,P_TYPE,UNAME_DBOY,ADDRESS,DELIVERY_DATE,pincode)values('$iid','$uname','$quantity','$price','$total','$gst','$paydate','$status','$dcharge','$type','$dname','$add','$ddate','$pin')";
                    $qi = mysqli_query($conn, $i);
                    if ($qi) {
                        echo '<script>alert("Place order successfully!!!")</script>';
                        $queryss = "SELECT ITEM_ID,RemainingStock,UpdatedStock,totalstock FROM  tblstockmanagementofitem where ITEM_ID='$iid'";
                        $r3=mysqli_query($conn,$queryss);
                        while($stock=mysqli_fetch_assoc($r3))
                        {
                            $id=$_SESSION['itemid'];
//                            $rstock=$stock['RemainingStock'];
                            $tstock=$stock['totalstock'];
                            $qtyy=$_SESSION['qty'];
//                            $finalr=$rstock-$qtyy;
                            $finalt=$tstock-$qtyy;
//                            echo "$finalt,$id,$qtyy";
                            $upstock="update tblstockmanagementofitem set totalstock=$finalt where ITEM_ID=$id";
                            $rup=mysqli_query($conn,$upstock);
                            
                            if(!$rup)
                            {
                                echo '<script>alert("stock is not updated")</script>';
                            }
                           
                        }
                         
                        
                    } else {
                        echo '<script>alert("Sorry , order is not placed")</script>';
                    }
                     $dorder="insert into tbldeliveryboy (S_USERNAME,O_ID) values ()";
                }

        }


        ?>
        <div class="scontainer">
            <div class="sleft-column">
                <img class="simg" src="<?php echo $path; ?>" alt="<?php echo $name; ?>">
                <br><!-- comment -->
                <br>
                <h3><?php echo $name; ?></h3>
                <br>
                <p><?php echo $description; ?></p>
                <br>
                <p class="sprice">Price: <?php echo $price; ?>/-</p>
            </div>
            <div class="sright-column">
                <h2>Place Your Order</h2>
                <!-- Form content goes here -->
                <form method="POST">
                    <!-- Form fields as in your original code -->
                    <table>
       <!--                                <tr>
                                           <td>
                                               <h2>Place Your Order</h2>
                                           </td>
                                       </tr>-->
                        <tr>
                            <td>
                                <label for="address">Address:</label>
                                <textarea id="address" name="address" rows="3" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="date">Select delivery :</label>
                                <div class="delivery-options">
                                    <label>
                                        <input type="radio" name="delivery_date" value="tomorrow" required="">
                                        Tomorrow
                                    </label>
                                    <label>
                                        <input type="radio" name="delivery_date" value="two_days_later" required="">
                                        In 2 Days
                                    </label>
                                    <label>
                                        <input type="radio" name="delivery_date" value="custom_date" id="custom_date_radio" required="">
                                        Custom Date
                                    </label>
                                    <input type="date" name="ddate" id="custom_date_input" disabled >
                                </div>


                                </div>

                                <script>
                                    // Enable/Disable the date picker based on radio button selection
                                    const customDateRadio = document.getElementById('custom_date_radio');
                                    const customDateInput = document.getElementById('custom_date_input');
                                    const radioButtons = document.querySelectorAll('input[name="delivery_date"]');

                                    radioButtons.forEach(button => {
                                        button.addEventListener('change', function () {
                                            if (customDateRadio.checked) {
                                                customDateInput.disabled = false;

                                            } else {
                                                customDateInput.disabled = true;
                                                customDateInput.value = ''; // clear date if custom not selected
                                            }
                                        });
                                    });

                                    document.getElementById('submit_button').addEventListener('click', () => {
                                        const selectedDate = document.querySelector('input[name="delivery_date"]:checked').value;
                                        if (selectedDate === 'custom_date') {
                                            alert('Selected Custom Date: ' + customDateInput.value);
                                        } else if (selectedDate === 'tomorrow') {
                                            alert('Delivery Date: Tomorrow');
                                        } else if (selectedDate === 'two_days_later') {
                                            alert('Delivery Date: In 2 Days');
                                        }
                                    });
                                </script>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="ptype">Pincode</label>
<?php
$qt = "select * from tblpincode";
$qtr = mysqli_query($conn, $qt);
?>
                                <select name="pincode" id="pincode" required="">
                                    <option value="">Select pincode</option>
                                <?php
                                while ($rot = mysqli_fetch_row($qtr)) {
                                    echo "<option value='" . "$rot[0]" . "'>$rot[0]</option>";
                                }
                                ?>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="gst">GST 8%</label><br>
                                <label for="dcharge">Delivery charge 30/- RS</label> 
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2>Payment</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="ptype">Payment type</label>
                                <select name="type" id="pay" required="">
                                    <option value="">select payment type</option>
                                    <option value="Cash on delivery">Cash on delivery</option>
                                    <option value="Online">Online</option>
                                </select>

                            </td>
                        </tr>
<!-- <tr>
                            <td>
                                <p id="pdesc"></p>

                            </td>
                        </tr>-->



                        <script>
                            function caltotal() {
                                var p =<?php echo "$price"; ?>;

                                var q = <?php echo $quantity; ?>;
                                var t = (p * q) + (p * 0.08 * q) + 30;
                       //                                $tp = ($p * $qty);
                       //                $gst = ($p * 0.08) * $qty;
                       //                $dcharge = 30;
                       //                $total = ($tp + $gst + $dcharge);
                                return t;
                            }

                        </script>


                        <tr>
                            <td>
                                <input type="button" value="Payment" id="btnpayment" name="payment" onclick="payNow()">
                                <!--<input type="hidden" id="totel" value="<?php // echo $total; ?>">-->
                                <script>
                                    function payNow() {
//                                        alert('Hello');
                                        var amount = caltotal();
                                        if (!amount || amount <= 0) {
                                            alert('Please enter a valid amount');
                                            return;
                                        }

                                        console.log("Amount to be sent: " + amount); // Debugging log

                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', 'payment/cheakout.php', true);
                                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                        xhr.onload = function () {
                                            if (xhr.status === 200) {
                                                var response = JSON.parse(xhr.responseText);
                                                if (response.error) {
                                                    alert('Error: ' + response.error);
                                                    return;
                                                }

                                                var options = {
                                                    "key": response.key,
                                                    "amount": response.amount,
                                                    "currency": "INR",
                                                    "name": response.name,
                                                    "description": "Test Transaction",
                                                    "order_id": response.order_id,
                                                    "handler": function (response) {
                                                        console.log(response);
                                                        alert('Payment Successful');
                                                        var xhrInsert = new XMLHttpRequest();
                                                        xhrInsert.open('POST', 'payment_insertdata.php', true);
                                                        xhrInsert.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                        xhrInsert.onload = function () {
                                                            if (xhrInsert.status === 200) {
                                                                console.log("Data saved successfully: " + xhrInsert.responseText);
                                                                document.getElementById("pdesc").innerHTML=this.responseText;
                                                                alert('Payment successful and data saved!');
                                                            } else {
                                                                console.error("Failed to save data. Status: " + xhrInsert.status);
                                                                alert('Payment successful, but failed to save data.');
                                                            }
                                                        };
                                                    },
                                                    "theme": {
                                                        "color": "#F37254"
                                                    }
                                                };
                                                var rzp = new Razorpay(options);
                                                rzp.open();
                                            } else {
                                                alert('Something went wrong. Please try again. Status: ' + xhr.status);
                                            }
                                        };
                                        xhr.send('num=' + encodeURIComponent(amount));
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Order place" name="order">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

<?php
include 'aboutusfooter.php';
?>
    </body>
</html>
