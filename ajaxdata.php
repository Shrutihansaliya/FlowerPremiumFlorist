<!-- <form action="https://phuler.myshopify.com/search" method="get" role="search">
     <input id="search" type="search" name="q" value="" placeholder="Search our store" class="input-group-field input-text" aria-label="Search our store" onkeyup="disdata(this.value)">
     <button type="submit">
         <i class="ion-search"></i>
     </button>
 </form>

<script>
            function disdata(id)
            {
                if (id === "") {
                    document.getElementById("data").innerHTML = "";
                    $("#data").slideUp("slow");
                } else {
                    var a = new XMLHttpRequest();
                    a.open("get", "ajaxdata.php?sid=" + id, true);
                    a.send();
                    a.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200)
                        {
                            document.getElementById("data").innerHTML = this.responseText;
                            $("#data").slideDown("slow");
                        }
                    };
                }
            }
        </script>


<html>
    <head>
        <title></title>
    <style>
        .flower-item img{
                max-width: 100%;
                border-radius: 8px;
            }
            .flower-item {
                background-color: white;
                padding: 15px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                text-align: center;
            }
            .flower-item h3 {
                margin: 10px 0;
                font-size: 18px;
                color: #555;
            }
            .flower-item p {
                font-size: 16px;
                color: #777;
                }
</style>
    </head>
    <body> comment 
        
        -->
<?php

//$id = $_REQUEST['sid'];
////echo $id;
//
//$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
//$que = "select * from tblitem where ITEM_ID='$id' or NAME like '$id%'";
//
//$qa = mysqli_query($conn, $que);
//
//while ($r = mysqli_fetch_assoc($qa)) {
//
//    
//    $id=$r['ITEM_ID'];
//        $name = $r['NAME'];
//        $description = $r['DESCRIPTION'];
//        $price = $r['PRICE'];
//    
//    
//    echo '<div class="flower-item">';
//        echo '<a href="products/neque-porro-quisquam.php?sid='.$id.'">';
//        echo '<img src="/PhpProjectflower/PhpProjectflower/Admin/' . $r['PHOTO'] . '" alt="' . $name . '" style="width:250px;height:200px;">';
//        echo '</a>';
////        echo '<p>' . $name . '</p>';
//    echo "<br>";
//        echo '<a href="products/neque-porro-quisquam.php?sid='.$id.'">' . $name . '</a>';
//        //echo '<p>' . $description . '</p>';
//        echo '<p>Rs. ' . $price . '</p>';
//        echo '</div>';
//}
//echo '</table>';
?>
<!--    </body>
</html>-->




<?php
$id = $_REQUEST['sid'];
$conn= mysqli_connect("localhost","root","","dbphpprojechflower");
if($conn)
{
    //echo '<script>alert("connection successfully");</script>';
} else {
    echo '<script>alert("connection not successfully");</script>';
}

$qu="select * from tblitem where DESCRIPTION like '%$id%' or NAME like '%$id%'";

   
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
    </body>
</html>