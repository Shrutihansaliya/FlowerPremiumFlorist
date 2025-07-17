<?php
//session_start();
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
include 'headerindex.php';
$id=$_REQUEST['id'];
//echo "$id";
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

         <style>
        #wishlistBtn {
            background-color: #cccccc;
            color: white;
            padding: 6px;
            cursor: pointer;
            border-radius: 100%;
            border: none;
            margin-left: 10px;
            
        }
        #wishlistBtn i {
            margin-right: 3px;
            margin-left: 3px;
            
        }
        #wishlistBtn:hover {
            background-color: #ffcccc;
        }
        
        
        
            body{
                /*background-color: lightgray;*/
            }

        /* Product Information */
      .product-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-left: 80px;
            margin-right: 80px;
            margin-bottom: 20px;
        }
        .product-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            line-height: 1.6;
        }
/*        .table{
            
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }*/
.table td{
         /*border: 1px solid black;*/
            width: 300px;   
        }
/*        td{
            border: 1px solid black;
            width: 350px;   
        }*/
        .image{
            margin-left: 80px;
            margin-top: 10px;
            border-radius: 15px;
            width:400px;
            height:400px;
        }
        .btncart{
            border: 1px solid lightsteelblue;
            border-radius: 2px;
            font-size: 12px;
            color: rgb(62,126,149);
            font-weight: bold;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right:50px;
            padding-top: 10px;
            border-radius: 8px;
        }
        .btnbuy{
            border: 1px solid lightsteelblue;
            border-radius: 2px;
            font-size: 12px;
            color: rgb(255,255,255);
            font-weight: bold;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right:50px;
            padding-top: 10px;
            border-radius: 8px;
            background-color: rgb(62,126,149);
        }
        .submit{
            background-color: red;
            padding: 12px;
            width: 150px;
        }
/*        .input{
            width: 700px;
        }*/
.squantity-selector {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 15px;
            }

            .squantity-selector button {
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

            .squantity-selector button:hover {
                background-color: #bbb;
            }

            .squantity-selector input {
                width: 50px;
                text-align: center;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }
        .checkpin{
            margin-left: 200px;
            background-color: white;
            width: 1100px;
            border-radius: 4px;
              box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .checkpin td{
            padding: 20px;
        }
        </style>
        
    </head>
    <body>
        
        <?php
        // put your code here
        $conn= mysqli_connect("localhost","root","","dbphpprojechflower");
        $qu="select * from tblitem where ITEM_ID=$id";
        $q= mysqli_query($conn, $qu);
        while($r= mysqli_fetch_assoc($q)){
            $name=$r['NAME'];
            $description=$r['DESCRIPTION'];
            $price=$r['PRICE'];
            $photo=$r['PHOTO'];
            $categoryid=$r['CATEGORY_ID'];
            $itemid=$r['ITEM_ID'];
//              $_SESSION['itemid']=$itemid;
        }
        echo '<form method="POST">';
        echo '<div class="product-details">';
        echo '<table class="table"><tr><td>';
        echo '<img src="/PhpProjectflower/Admin/'.$photo.'" class="image">';
        echo '</td><td class="product-title">';
        echo "$name   
        <hr>Rs $price<br>$description<br><br>";
        echo '<input type="hidden" name="ITEM_ID" value="'.$itemid.'">';
//        echo '<label for="quantity">Quantity:</label>';
//        echo '<input type="number" name="quantity" min="1" value="1">';
         echo '<label for="squantity">Select Quantity:</label>
                                <div class="squantity-selector">
                                    <button type="button" class="minus-btn">-</button>
                                    <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                          
                                    <button type="button" class="plus-btn">+</button>
                                </div>';
                               echo '<script>
                                    const minusBtn = document.querySelector(".minus-btn");
                                    const plusBtn = document.querySelector(".plus-btn");
                                    const quantityInput = document.querySelector("#quantity");

                                    minusBtn.addEventListener("click", () => {
                                        let currentValue = parseInt(quantityInput.value);
                                        if (currentValue > 1) {
                                            quantityInput.value = currentValue - 1;
                                        }
                                    });

                                    plusBtn.addEventListener("click", () => {
                                        let currentValue = parseInt(quantityInput.value);
                                        quantityInput.value = currentValue + 1;
                                    });
                                </script>';
                                
        echo '<button formaction="add_to_cart.php" type="submit" class="btncart" name="addtocart">ADD TO CART</button> <button id="BuyNow" type="submit" class="btnbuy" name="buynow">BUY NOW</button>  <a href="add_to_wishlist.php?product_id='.$itemid.'" class="wishlist-btn" id="wishlistBtn">
    <i class="fas fa-heart"></i> 
</a>';
        echo '</td></tr>';
        echo '</table>';
        echo '</div>';
        echo '</form>';
        

?>

        
            
        
        
        <script>
        let wishlist = [];

        function addToWishlist() {
            const item = "Sample Item " + (wishlist.length + 1);
            wishlist.push(item);
            displayWishlist();
        }

        function displayWishlist() {
            const wishlistContainer = document.getElementById("wishlistItems");
            wishlistContainer.innerHTML = '';
            wishlist.forEach(item => {
                const listItem = document.createElement("li");
                listItem.textContent = item;
                wishlistContainer.appendChild(listItem);
            });
        }
    </script>
    <br>
    
            
    <form method="post">
            <table class="checkpin">
                <tr>
                    <td>
                        <label>Check Delivery Availability :   </label>
                    
                        <input type="text" name="txtpincode" required pattern="^[0-9]*$" maxlength="6" min="6" class="input" placeholder="Available in limited pincode*" title="Enter only number">
                    
                        <input type="submit" class="submit" name="btnpinsubmit"> <br>
                        <?php
        if(isset($_POST['btnpinsubmit'])){
            $txtpin=$_POST['txtpincode'];
            $pin="select * from tblpincode where PINCODE=$txtpin";
            $q= mysqli_query($conn, $pin);
            if(mysqli_num_rows($q) > 0){
                echo "delivery is available";
            } else {
                echo "delivery is not available";
            }
        }
    ?>
                    </td>
                </tr>
                
            </table></form>
    

    <br><br>
    <div class="product-details">
            <div id="shopify-section-template--15479312842825_1627472882daef6c4a" class="shopify-section"><div class="product-area" id="section-template--15479312842825_1627472882daef6c4a" data-section="TabWithProduct">
                    <div class="container">
                        <div class="product-top-bar  section-border  mb-35">




                            <div class="section-title-wrap">
                                <h3 class="section-title section-bg-white">similar Products</h3>
                            </div>

                            <div class="product-tab-list nav section-bg-white">



<!--                                <a class="active" data-toggle="tab" href="#product-area-template--15479312842825__1627472882daef6c4a-winter">
                                    <h4>Winter</h4>
                                </a>




                                <a class="" data-toggle="tab" href="#product-area-template--15479312842825__1627472882daef6c4a-various">
                                    <h4>Various</h4>
                                </a>




                                <a class="" data-toggle="tab" href="#product-area-template--15479312842825__1627472882daef6c4a-greens">
                                    <h4>Greens</h4>
                                </a>-->




                            </div>


                        </div><div class="tab-content jump">







                            <div id="product-area-template--15479312842825__1627472882daef6c4a-winter" class="tab-pane active">
                                <div class="featured-product-active owl-carousel product-nav" data-owl-carousel='{"loop": true,
                                     "margin": 30,
                                     "nav": true,
                                     "navText": ["<i class=&#x27; ion-ios-arrow-back&#x27;></i>","<i class=&#x27; ion-ios-arrow-forward&#x27;></i>"],
                                     "items": 4,
                                     "responsiveClass":true,
                                     "responsive":{
                                     "0":{ "items": 1 },
                                     "600":{ "items": 3 },
                                     "992":{ "items": 3 },
                                     "1024":{ "items": 4 },
                                     "1200":{ "items": 4 },
                                     "1400":{ "items": 4 },
                                     "1920":{ "items": 4 }
                                     }

                                     }'>
                                    
                    



<?php

$qu = "select * from tblitem where CATEGORY_ID=$categoryid";
$q = mysqli_query($conn, $qu);
if ($q->num_rows > 0) {
    while ($r = mysqli_fetch_assoc($q)) {
        $id=$r['ITEM_ID'];
        $name = $r['NAME'];
        $description = $r['DESCRIPTION'];
        $price = $r['PRICE'];
        $photo=$r['PHOTO'];
        $cid=$r['CATEGORY_ID'];
        //echo $r['PHOTO'];
        //echo '<img src="'.$r['PHOTO'].'.">';
        
        
        
        
        

        echo '<div class="flower-item">';
        echo '<a href="flowerdetail.php?id='.$id.'">';
        echo '<img src="Admin/' . $r['PHOTO'] . '" alt="' . $name . '" style="width:250px;height:200px;">';
        echo '</a>';
//        echo '<p>' . $name . '</p>';
        echo '<a href="flowerdetail.php?id='.$id.'">' . $name . '</a>';
        //echo '<p>' . $description . '</p>';
        echo '<p>Rs. ' . $price . '</p>';
        echo '</div>';
    }
} else {
    echo 'no flower';
}
?>
                                 

                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    
      </div>
       
      <?php
        if(isset($_POST['buynow'])){
            $_SESSION['itemid']=$itemid;
            $_SESSION['qty']=$_POST['quantity'];
            echo '<script>alert("session stored")</script>';
                    echo '<script>window.location.replace("http://localhost/PhpProjectflower/buydemo.php")</script>';
        }
      
      ?>
      
      
    
    <?php
include 'aboutusfooter.php';
    ?>
   
    </body>
</html>
