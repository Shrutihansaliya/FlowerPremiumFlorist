

<?php
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$conn) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flower Details</title>
        <style>
             input[type="submit"]{
        font-size: 1rem;
        padding: 12px;
    }
    input[type="date"] {
    margin-top: 10px;
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    display: block;
}
            </style>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }




            body {
                font-family: 'Arial', sans-serif;
                background-color: #f7f9fc;
                color: #333;
                line-height: 1.6;
                padding: 20px;
            }

            /* Styling the form container */
            table {
                width: 80%;
                max-width: 1000px;
                margin: 50px auto;
                background-color: #fff;
                border-radius: 12px;
                /*box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);*/
                overflow: hidden;
                border-collapse: collapse;
            }

            /* Table cells */
            td {
                padding: 7px;
                vertical-align: top;
            }

            /* Styling the image */
            .img {
                max-width: 100%;
                height: auto;
                /*    border-radius: 10px;*/
                border: 3px solid white ;
                /*    #007BFF;*/
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                /*    margin-top: 50px;*/
                margin-top: 42px;
            }

            /* Headings */
            h2 {
                margin-bottom: 15px;
                color: #333;
                font-size: 1.8rem;
                text-align: center;
                border-bottom: 2px solid #007BFF;
                padding-bottom: 10px;
            }

            /* Form labels */
            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
                color: #333;
                font-size: 1rem;
            }

            .quantity-selector {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 15px;
            }

            .quantity-selector button {
                padding: 10px;
                background-color: #ddd;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 18px;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .quantity-selector button:hover {
                background-color: #bbb;
            }

            .quantity-selector input {
                width: 50px;
                text-align: center;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }
            /* Input fields */
            /*input[type="number"],*/
            input[type="date"],
            textarea,
            input[type="text"]
            {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1rem;
                margin-bottom: 20px;
                background-color: #f9f9f9;
                transition: border-color 0.3s ease;
            }

            /* Input fields hover effect */
            textarea:focus,
            input:focus {
                border-color: #007BFF;
                outline: none;
            }

            /* Button Styling */
            input[type="submit"] {
                display: block;
                width: 70%;
                background-color: #007BFF;
                color: white;
                padding: 10px;
                border: none;
                /*    border-radius: 5px;*/
                cursor: pointer;
                font-size: 1.2rem;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            /* Responsive styling for mobile */
            @media (max-width: 768px) {
                table {
                    width: 100%;
                }

                td {
                    padding: 10px;
                }

                h2 {
                    font-size: 1.5rem;
                }

                input[type="submit"]{
                    font-size: 1rem;
                    padding: 12px;
                }
                /*    input[type="date"] {
                    margin-top: 10px;
                    padding: 5px;
                    font-size: 14px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 100%;
                    display: block;
                }*/



                .delivery-date-container {
                    background-color: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    width: 300px;
                    text-align: center;
                }

                .delivery-options {
                    margin-top: 20px;
                }

                .delivery-options label {
                    display: block;
                    margin-bottom: 10px;
                }

                /*input[type="date"] {
                    width: 100%;
                    padding: 8px;
                    margin-top: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 14px;
                }*/
                input[type="radio"] {
                    margin-right: 10px;
                }

                h3 {

                    color: blue;
                    margin: 10px 0;
                    margin-top: 12px;
                }

                p {
                    color: #777;
                    font-size: 22px;
                }

                .price {
                    color: #e74c3c;
                    font-size: 38px;
                }
            </style>
        </head>
        <body>
            <?php
            include 'customerheader.php';
            $id = $_REQUEST["id"];
            $cid = $_REQUEST["cid"];
            echo $id;
            echo $cid;
            if($cid==1){
            $q = "select * from tblflower where F_ID='$id'";
            $qu = mysqli_query($conn, $q);
            while ($r = mysqli_fetch_assoc($qu)) {
                $vid = $r['F_ID'];
                $name = $r['NAME'];
                $description = $r['DESCRIPTION'];
                $price = $r['PRICE'];
                $photo = $r['PHOTO'];
//                echo $photo;
            }
            }
            elseif($cid==2){
                 $q2 = "select * from tblitem where ITEM_ID='$id'";
            $qu2 = mysqli_query($conn, $q2);
            while ($r2 = mysqli_fetch_assoc($qu2)) {
                $vid = $r2['ITEM_ID'];
                $name = $r2['NAME'];
                $description = $r2['DESCRIPTION'];
                $price = $r2['PRICE'];
                $photo = $r2['PHOTO'];
//                echo $photo;
            }
            }
            ?>
            <form method="POST">
                <table>
                    <tr>
                        <td style='width:40%;
                            height:55%'>
                            <?php
                            $path = "Admin/";
                            ?>
                            <img class="img"src="<?php echo $path . $photo; ?>" alt="<?php echo $name; ?>">
                            <?php
                            echo "<h3>$name
           </h3>";
                            echo "<p> 
            $description
                     </p>";
                            echo "<p class='price'> 
                       $price
                     </p>";
                            ?>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <h2>Payment</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="ptype">Payment type</label>
                                        <select name="type">
                                            <option value="Cash on delivery">Cash on delivery</option>
                                            <option value="Online">Online</option>
                                        </select>
                                       
                                    </td>
                                </tr>

<!--                           <tr>
                                <td>
                                    <label for="pincode">Select Delivery date:</label>
                                    
                                    <input type="date" id="date" name="date" required>
                                </td>
                            </tr>-->
                              
                                
                                <tr>
                                    <td>
                                        <label for="pincode">Total price:</label>
                                        <input type="text" id="totalp" name="totalp" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="payment" name="payment">
                                    </td>
                                </tr>
                                <?php
                                if (isset($_POST['payment'])) {
                                    echo "<script>location.replace('payment.php')</script>";
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        ?>
                    </tr>
                </table>
            </form>



        </body>
    </html>

