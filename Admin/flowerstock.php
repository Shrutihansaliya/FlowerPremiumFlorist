<?php
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower")or die("not connect");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop Admin Panel</title>
    <!--<link rel="stylesheet" href="styles.css">-->
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
  table {
                width: 80%;
                margin-top: 30px;
                border-collapse: collapse;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            table th, table td {
                padding: 12px 15px;
                text-align: center;
                color: #333;
            }

            table th {
                background-color: #343a40;
                color: white;
                font-weight: bold;
            }

            table tr {
                border-bottom: 1px solid #ddd;
            }

            table tr:hover {
                background-color: #f1f1f1;
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            table td a {
                text-decoration: none;
                color: #007bff;
                font-weight: bold;
            }

            table td a:hover {
                color: #0056b3;
            }
    </style>
     <script>
    function updateStatus(sid,rs) {
       
        var newups = document.getElementById('us_' + sid).value;
        var xhr = new XMLHttpRequest();
       
        xhr.open("GET", "flowerstockupdate.php?sid=" + sid + "&rs="+rs+"&ups=" + encodeURIComponent(newups), true);
    
        xhr.send();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == 'success') {
                    alert("Stock not updated successfully");
                     location.reload();
                } else {
                    alert("Stock updated successfully");
                    location.reload();
                }
            }
        };
    }
</script>
</head>
<body>
    <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Manage flower stock</h1>
        <p>Manage your flower stock efficiently with our powerful admin tools.</p>
       
            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        
        <?php
        include 'header.php';
        ?>
  <table Border="all" style="border-collapse: collapse" class="cent">
            <tr>
                <th>photo</th>
                <th>FID</th>
                <!--<th>Remaining stock</th>-->
                
                
                <th>Updated stock</th>
                <th>Total stock</th>
                <th>Update Status</th>
            </tr>

          
    <?php
   

$queryss = "SELECT tblflower.PHOTO,tblstockmanagement.S_ID,tblstockmanagement.F_ID,tblstockmanagement.RemainingStock,tblstockmanagement.UpdatedStock,tblstockmanagement.totalstock FROM tblflower inner join tblstockmanagement on tblflower.F_ID=tblstockmanagement.F_ID ";
$qrt = mysqli_query($conn, $queryss);
    while ($r = mysqli_fetch_assoc($qrt)) {
        echo "<tr>";
//        $path="Admin/".$r['PHOTO'];
//        echo $path;
        echo "<td><img src='".$r['PHOTO']."' height='100px' width='100px'></td>";
        echo "<td>".$r['F_ID']."</td>";
//         echo "<td>".$r['RemainingStock']."</td>";
//         echo "<td>".$r['UpdatedStock']."</td>";
          echo "<td><input type='text' id='us_".$r['S_ID']."' value='".$r['UpdatedStock']."' pattern='[0-9]' required /></td>";
//        echo "<td><input type='text' id='earning_$r[0]' value='$r[5]' /></td>";
        echo "<td>".$r['totalstock']."</td>";
        
          echo "<td><button onclick='updateStatus(".$r['S_ID'].",".$r['totalstock'].")'>Update</button></td>";
        echo "</tr>";
    }
    ?>

</table>
</body>
</html>
