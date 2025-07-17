<?php
$priceRange = isset($_GET['sid']) ? $_GET['sid'] : '';
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

if (!$conn) {
    echo 'Connection failed';
    exit;
}

// Extract min and max price from the selected price range
list($minPrice, $maxPrice) = explode('-', $priceRange);

$sql = "SELECT * FROM tblitem WHERE PRICE BETWEEN $minPrice AND $maxPrice";
$result = mysqli_query($conn, $sql);

$records = [];


while ($row = mysqli_fetch_assoc($result)) {
    $records[] = $row;
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
      height: 150px;
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
//      if (count($records) > 0) {
//    foreach ($records as $record) {
//        echo '<div class="flower-item">';
//        echo '<a href="flowerdetail.php?id=' . $record['ITEM_ID'] . '">';
//        echo '<img src="Admin/' . $record['PHOTO'] . '" alt="' . $record['NAME'] . '" style="width:250px;height:200px;">';
//        echo '<br>';
//        echo '<h3>' . $record['NAME'] . '</h3>';
//        echo '<p>' . $record['DESCRIPTION'] . '</p>';
//        echo '<p>Price: Rs. ' . $record['PRICE'] . '</p>';
//        echo '</a>';
//        echo '</div>';
//    }
//} else {
//    echo "No records found!";
//}






      $count = 0;
      $totalRecords = count($records);
      
      while ($count < $totalRecords) {
          echo "<tr>";
          
          for ($i = 0; $i < 4; $i++) {
              if ($count < $totalRecords) {
                  $record = $records[$count];
                  echo "<td class='td'>";
                  echo "<div class='record-container'>";
                  $fid = $record['ITEM_ID'];
                  echo '<a href="flowerdetail.php?id=' . $fid . '">';
                  // Display image, name, and ID
                  //echo '<a href="flowerdetail.php">';
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
</html>