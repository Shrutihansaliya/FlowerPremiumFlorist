<?php
include 'headerindex.php';
$conn= mysqli_connect("localhost","root","","dbphpprojechflower");
if($conn)
{
    //echo '<script>alert("connection successfully");</script>';
} else {
    echo '<script>alert("connection not successfully");</script>';
}

$qu="select * from tblitem inner join tbltype on tblitem.TYPE_ID=tbltype.TYPE_ID  WHERE TYPE_OCCASION_WISE='valentine day'";

   
$q= mysqli_query($conn, $qu);
$records = [];

if ($q->num_rows > 0) {
    while ($row = $q->fetch_assoc()) {
        $records[] = $row;
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
        <?php
 
include 'aboutusfooter.php';

?>
    </body>
</html>
