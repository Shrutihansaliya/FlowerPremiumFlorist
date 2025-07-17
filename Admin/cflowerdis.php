








<?php

$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}
?>
<?php

if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    if ($cid == 1) {
//        if ($cid == 1 && !isset($_POST['colorid']) && !isset($_POST['flower']) && !isset($_POST['sid'])) {
            if ($cid == 1 && !isset($_POST['colorid']) && !isset($_POST['flower'])) {
//            echo "all flower";
            $fqu = "SELECT * FROM tblflower where CATEGORY_ID = '$cid'";
            $fres = mysqli_query($con, $fqu);

            if ($fres->num_rows > 0) {
                // Output each flower
                while ($rr = mysqli_fetch_assoc($fres)) {
                    echo '<div class="flower-item">';
                    $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
                    
                    echo '<h3>' . $rr["NAME"] . '</h3>';
                    echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                    echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                     echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updateflower.php?F_ID={$rr["F_ID"]}'>Update</a></td>";
                    echo '</div>';
                }
            } else {
                echo '<p>No flowers found</p>';
            }
        } 

        else if (isset($_POST['colorid'])) {
          if (isset($_POST['flower']) && $_POST['flower']!="") {
//             if ($_POST['flower']!=""){
//                echo "flower and color";
                $f = $_POST['flower'];
                $colorid = $_POST['colorid'];
                $fqu = "SELECT * FROM tblflower WHERE NAME='$f' AND COLOR_ID = '$colorid'";
                $fres = mysqli_query($con, $fqu);

                if ($fres->num_rows > 0) {
                    // Output each flower
                    while ($rr = mysqli_fetch_assoc($fres)) {
                        echo '<div class="flower-item">';
                        $status = $rr["STATUS"];
                   $blurClass = ($status === "Not Available") ? "blur" : "";
                   echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                        echo '<img src="' . $rr["PHOTO"] . '"  alt="' .  $rr["NAME"] . '">';
                        echo '<h3>' . $rr["NAME"] . '</h3>';
                        echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                        echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                         echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updateflower.php?F_ID={$rr["F_ID"]}'>Update</a></td>";
                        echo '</div>';
                    }
                } else {
                    echo '<p>No flowers found</p>';
                }
            } else  {
//                echo "color";
                $colorid = $_POST['colorid'];
                $fqu = "SELECT * FROM tblflower WHERE CATEGORY_ID = '$cid' AND COLOR_ID = '$colorid'";
                $fres = mysqli_query($con, $fqu);
                if ($fres->num_rows > 0) {
                    // Output each flower
                    while ($rr = mysqli_fetch_assoc($fres)) {
                        echo '<div class="flower-item">';
                        $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                        echo '<img src="' . $rr["PHOTO"] . '"  alt="' . $rr["NAME"] . '">';
                        echo '<h3>' . $rr["NAME"] . '</h3>';
                        echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                        echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                         echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updateflower.php?F_ID={$rr["F_ID"]}'>Update</a></td>";
                        echo '</div>';
                    }
                } else {
                    echo '<p>No flowers found</p>';
                }
            }
        }
        
         else if (isset($_POST['flower'])) {
           if (isset($_POST['colorid']) && $_POST['colorid']!="") {
//            if ( $_POST['colorid']!="") {
//                echo "flower and color";
                $f = $_POST['flower'];
                $colorid = $_POST['colorid'];
                $fqu = "SELECT * FROM tblflower WHERE NAME='$f' AND COLOR_ID = '$colorid'";
                $fres = mysqli_query($con, $fqu);

                if ($fres->num_rows > 0) {
                    // Output each flower
                    while ($rr = mysqli_fetch_assoc($fres)) {
                        echo '<div class="flower-item">';
                        $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                        echo '<img src="' . $rr["PHOTO"] . '"  alt="' . $rr["NAME"] . '">';
                        echo '<h3>' . $rr["NAME"] . '</h3>';
                        echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                        echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                         echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updateflower.php?F_ID={$rr["F_ID"]}'>Update</a></td>";
                        echo '</div>';
                    }
                } else {
                    echo '<p>No flowers found</p>';
                }
            } else {
//                echo "flower";
                $f = $_POST['flower'];
            $fqu = "SELECT * FROM tblflower WHERE NAME='$f'";
            $fres = mysqli_query($con, $fqu);

            if ($fres->num_rows > 0) {
                // Output each flower
                while ($rr = mysqli_fetch_assoc($fres)) {
                    echo '<div class="flower-item">';
                    $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                    echo '<img src="' . $rr["PHOTO"] . '"  alt="' . $rr["NAME"] . '">';
                    echo '<h3>' . $rr["NAME"] . '</h3>';
                    echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                    echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                     echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updateflower.php?F_ID={$rr["F_ID"]}'>Update</a></td>";
                    echo '</div>';
                }
            } else {
                echo '<p>No flowers found</p>';
            }
            }
        }
//        else if(isset($_POST['sid'])){
//            $sid = $_POST['sid'];
//            $fqu = "SELECT * FROM tblflower WHERE SEASON_ID='$sid'";
//            $fres = mysqli_query($con, $fqu);
//            echo "season";
//            if ($fres->num_rows > 0) {
//                // Output each flower
//                while ($rro = mysqli_fetch_assoc($fres)) {
//                    echo '<div class="flower-item">';
//                    echo '<img src="' . $rro["PHOTO"] . '" alt="' . $rro["NAME"] . '">';
//                    echo '<h3>' . $rro["NAME"] . '</h3>';
//                    echo '<p>' . $rro["DESCRIPTION"] . '</p>';
//                    echo '<p class="price">Price: $' . $rro["PRICE"] . '</p>';
//                     echo '<p>' . $rro["STOCKQUANTITY"] . '</p>';
//                    echo '<p>' . $rro["DATEADDED"] . '</p>';
//                    echo '</div>';
//                }
//            } else {
//                echo '<p>No flowers found</p>';
//            }
//        }
        
    }
    else {
//        echo "not flower cat";
//         if (!isset($_POST['type']) && !isset($_POST['sid'])) {
        if (!isset($_POST['type'])) {
//            echo "all item";
            $fqu = "SELECT * FROM tblitem where CATEGORY_ID = '$cid'";
            $fres = mysqli_query($con, $fqu);

            if ($fres->num_rows > 0) {
                // Output each flower
               
                while ($rr = mysqli_fetch_assoc($fres)) {
                    
                    echo '<div class="flower-item">';
                    $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                    echo '<img src="' . $rr["PHOTO"] . '"  alt="' . $rr["NAME"] . '">';
                    echo '<h3>' . $rr["NAME"] . '</h3>';
                    echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                    echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                     echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                    
                      echo " <a href='updatebouquet.php?ITEM_ID={$rr["ITEM_ID"]}'>Update</a></td>";
                    echo '</div>';
                }
            } else {
                echo '<p>No found</p>';
            }
    }
//     else if (isset($_POST['sid'])&& $_POST['sid']!="") {
//            $sid=$_POST['sid'];
//            $cid=$_POST['cid'];
//            echo "season item";
//            $fqu = "SELECT * FROM tblitem where CATEGORY_ID = '$cid' AND SEASON_ID='$sid'";
//            $fres = mysqli_query($con, $fqu);
//
//            if ($fres->num_rows > 0) {
//                // Output each flower
//                while ($rr = mysqli_fetch_assoc($fres)) {
//                    echo '<div class="flower-item">';
//                    echo '<img src="'. $rr["PHOTO"] . '" alt="' . $rr["NAME"] . '">';
//                    echo '<h3>' . $rr["NAME"] . '</h3>';
//                    echo '<p>' . $rr["DESCRIPTION"] . '</p>';
//                    echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
//                     echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
//                    echo '<p>' . $rr["DATEADDED"] . '</p>';
//                      echo " <a href='updatebouquet.php?ITEM_ID={$rr["ITEM_ID"]}'>Update</a></td>";
//                    echo '</div>';
//                }
//            } else {
//                echo '<p>No flowers found</p>';
//            }
//        } 
         else if (isset($_POST['type'])&& $_POST['type']!="") {
            $type=$_POST['type'];
            $cid = $_POST['cid'];

//            echo "type wise item";
            $fqu = "SELECT * FROM tblitem where CATEGORY_ID = '$cid' AND TYPE_ID='$type'";
            $fres = mysqli_query($con, $fqu);

            if ($fres->num_rows > 0) {
                // Output each flower
                while ($rr = mysqli_fetch_assoc($fres)) {
                  
                    echo '<div class="flower-item">';
                    $status = $rr["STATUS"];
                    $blurClass = ($status === "Not Available") ? "blur" : "";
                    echo '<img src="' . $rr["PHOTO"] . '" class="' . $blurClass . '" alt="' . $rr["NAME"] . '">';
//                    echo '<img src="'. $rr["PHOTO"] . '"  alt="' . $rr["NAME"] . '">';
                    echo '<h3>' . $rr["NAME"] . '</h3>';
                    echo '<p>' . $rr["DESCRIPTION"] . '</p>';
                    echo '<p class="price">Price: $' . $rr["PRICE"] . '</p>';
                     echo '<p>' . $rr["STOCKQUANTITY"] . '</p>';
                    echo '<p>' . $rr["DATEADDED"] . '</p>';
                   
                     $status = $rr["STATUS"]; 
                    echo '<p>' . $status . '</p>';
                      echo " <a href='updatebouquet.php?ITEM_ID={$rr["ITEM_ID"]}'>Update</a></td>";
                    echo '</div>';
                }
            } else {
                echo '<p>No flowers found</p>';
            }
        } 
            }
} 
else {
    echo "not cat select";
}
?>

<style>
    .blur {
        filter: blur(5px);
    }
</style>

