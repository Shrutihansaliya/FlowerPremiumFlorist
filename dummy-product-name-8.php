<?php
include 'headerindex.php';
$id=$_REQUEST['sid'];


//$qu = [
//    "SELECT * FROM tblflower WHERE SEASON_ID = $id",
//    "SELECT DISTINCT TblItem.ITEM_ID, TblItem.NAME, TblItem.CATEGORY_ID, TblItem.DESCRIPTION, TblItem.PRICE, 
//            TblItem.PHOTO, TblItem.STOCKQUANTITY, TblItem.DATEADDED, TblItem.TYPE_ID, TblItem.STATUS
//     FROM TblItem 
//     INNER JOIN TblItem_Info ON TblItem.ITEM_ID = TblItem_Info.ITEM_ID 
//     INNER JOIN TblFlower ON TblFlower.F_ID = TblItem_Info.F_ID 
//     WHERE TblFlower.SEASON_ID = $id"
//];


//$qu="select * from tblflower where SEASON_ID=$id";

//$qe="SELECT TblItem.ITEM_ID, TblItem.NAME, TblItem.CATEGORY_ID, TblItem.DESCRIPTION, TblItem.PRICE, TblItem.PHOTO, TblItem.STOCKQUANTITY, TblItem.DATEADDED, TblItem.TYPE_ID, TblItem.STATUSFROM TblItem INNER JOIN TblItem_Info ON TblItem.ITEM_ID = TblItem_Info.ITEM_ID INNER JOIN TblFlower ON TblFlower.F_ID = TblItem_Info.F_ID WHERE TblFlower.SEASON_ID = 2;";

//$q= mysqli_query($conn, $qu);


//$records = [];

//foreach ($qu as $query) {
//    $q = mysqli_query($conn, $query);
//    
//    if ($q) {
//        while ($row = mysqli_fetch_assoc($q)) {
//            //print_r($row); // You can process each row as needed
//            $records[] = $row;
//        }
//    } else {
//        echo "Error executing query: " . mysqli_error($conn);
//    }
//}


//if ($q->num_rows > 0) {
//    while ($row = $q->fetch_assoc()) {
//        $records[] = $row;
//    }
//}
//if ($q->num_rows == 0) {
//        echo "not available";
//    }


$conn= mysqli_connect("localhost","root","","dbphpprojechflower");
if($conn)
{
    //echo '<script>alert("connection successfully");</script>';
} else {
    echo '<script>alert("connection not successfully");</script>';
}

    $qu="SELECT DISTINCT TblItem.ITEM_ID, TblItem.NAME, TblItem.CATEGORY_ID, TblItem.DESCRIPTION, TblItem.PRICE, 
            TblItem.PHOTO, TblItem.STOCKQUANTITY, TblItem.DATEADDED, TblItem.TYPE_ID, TblItem.STATUS
     FROM TblItem 
     INNER JOIN TblItem_Info ON TblItem.ITEM_ID = TblItem_Info.ITEM_ID 
     INNER JOIN TblFlower ON TblFlower.F_ID = TblItem_Info.F_ID 
     WHERE TblFlower.SEASON_ID = $id";

$q= mysqli_query($conn, $qu);
$records = [];

if ($q->num_rows > 0) {
    while ($row = $q->fetch_assoc()) {
        $records[] = $row;
    }
}
?>
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Mirrored from phuler.myshopify.com/products/dummy-product-name-8 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:42:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

  <!-- Basic page needs ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  
  <link rel="shortcut icon" href="../cdn/shop/t/29/assets/favicon9204.png?v=134056495275804780971702526308" type="image/png" />
  

  <!-- Title and description ================================================== -->
  <title>
  Dutchman&#39;s Breeches &ndash; Phuler - Flower Shop Shopify Theme
  </title>

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      margin-left: 50px;
    }

    .td td {
      /*border: 1px solid #ccc;*/
      padding: 50px;
      text-align: center;
    }
    
    

    .box-container {
      display: flex;
      gap: 5px;
      justify-content: center;
    }

    .box {
      width: 150px;
      height: 200px;
      background-color: #4CAF50;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 12px;
    }
    .record{
        width: 200px;
        height: 200px;
        
    }
    .record-name{
        background-color: whitesmoke;
        width: 200px;
        height: 40px;
        text-align: center;
    }
/*    .button{
        background-color: whitesmoke;
        width: 100px;
        height: 45px;
    }*/
  </style>
</head>
<body>



<table>
    <thead>
      <tr>
<!--        <th>Column 1</th>
        <th>Column 2</th>
        <th>Column 3</th>
        <th>Column 4</th>-->
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 0;
      $totalRecords = count($records);
      
      while ($count < $totalRecords) {
          echo "<tr>";
          
          for ($i = 0; $i < 4; $i++) {
              if ($count < $totalRecords) {
                  $record = $records[$count];
                  echo "<td class='td'>";
                  echo "<div class='record-container'>";
                  $itemid=$record['ITEM_ID'];
                  // Display image, name, and ID
                  echo '<a href="flowerdetail.php?id='.$itemid.'">';
                  echo "<img src='/PhpProjectflower/Admin/".$record['PHOTO']."' alt='Image' class='record'>";
                  echo "<br><br>";
                  echo "<div class='record-name'>" . $record['NAME'] . "</div>";
                  echo "<div class='record-name'>" . $record['DESCRIPTION'] . "</div>";
                  echo "<div class='record-name'>PRICE : " . $record['PRICE'] . " Rs</div>";
                  
                  echo '</a>';
                  echo "<br>";
                  //echo "<button class='button'>Add to Cart</button>".'&nbsp; '."<button class='button'>Buy Now</button>";
                  //echo "<div class='record-id'>ID: " . htmlspecialchars($record['COLOR_ID']) . "</div>";
                  
                  echo "</div>";
                  echo "</td>";
                  
                  $count++;
              } else {
                  // Empty cell if no more data
                  echo "<td></td>";
              }
          }
          
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  
  
</body>

<!-- Mirrored from phuler.myshopify.com/products/dummy-product-name-8 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:42:32 GMT -->
</html>
