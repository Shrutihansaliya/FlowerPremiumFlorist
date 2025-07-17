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
                /*padding: 0px 20px 0px 20px;*/
            }

            /* Welcome section */
            .welcome-section {
                text-align: center;
                /*padding: 40px 10px;*/

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
/*view css*/
 table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px auto;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: black;
                color: white;
            }
            /*
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }*/

            .action-links a {
                color: #007bff;
                text-decoration: none;
                margin-right: 10px;
            }

            .action-links a:hover {
                text-decoration: underline;
            }


            .linku a{
                text-decoration: none;
                color: blue;
            }
            .linku a:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Detail of the Feedback</h1>
            <p>view the feedback given by the customers.</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
         <?php
        include 'header.php';
        ?>
         <?php
        $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$conn) {
            echo '<script>alert("Some Went Wrong While Connecting server.");</script>';
        } else {
            $qu = "select tblfeedback.UNAME,tblfeedback.P_ID,tblfeedback.RATING,tblfeedback.COMMENT,tblitem.ITEM_ID,tblitem.NAME,tblitem.PHOTO from tblfeedback inner join tblitem on tblfeedback.P_ID=tblitem.ITEM_ID";
            $q = mysqli_query($conn, $qu);

            echo '<table Border="all" style="border-collapse: collapse"><th>UNAME</th><th>Product name</th><th>Product photo</th><th>RATING</th><th>COMMENT</th>';
            while ($r = mysqli_fetch_assoc($q)) {
               

                echo "<tr>";
//                echo "<td>".$r['F_ID']."</td>";
                  echo "<td>".$r['UNAME']."</td>";
                  echo "<td>".$r['NAME']."</td>";
                   echo '<td><img src="/PhpProjectflower/Admin/' . $r['PHOTO'] . '" style="width:250px;height:200px;"></td>';
                    echo "<td>".$r['RATING']."</td>";
                     echo "<td>".$r['COMMENT']."</td>";
//                echo '<td class="linku">';
//                echo "<a href='../Admin/updatep.php?id=" . $pid . "'>Update</a>" . '</td></tr>';
            echo "</tr>";
                     }
            echo '</table>';
        }
        ?>
    </body>
</html>
