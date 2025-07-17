<?php
//session_start();
include 'headerindex.php';
?>
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Mirrored from phuler.myshopify.com/pages/wishlist by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:38:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

  <!-- Basic page needs ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  
  <link rel="shortcut icon" href="../cdn/shop/t/24/assets/favicon8508.png?v=134056495275804780971702209807" type="image/png" />
  

  <!-- Title and description ================================================== -->
  <title>
  wishlist &ndash; Phuler - Flower Shop Shopify Theme
  </title>
  
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      /*border: 1px solid #ccc;*/
    }

    .td td {
      /*border: 1px solid #ccc;*/
      padding: 50px;
      text-align: center;
    }
    
    /* Basic Button Styling */
.button {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    padding: 10px 20px; /* Padding for button */
    border: none; /* Remove borders */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Center text */
    text-decoration: none; /* Remove underline */
    display: inline-block; /* Inline-block for flexibility */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor on hover */
/*    transition: background-color 0.3s, transform 0.2s;  Smooth hover effects */
    width: 200px;
}

/* Hover Effect */
.button:hover {
    background-color: #45a049; /* Darker green on hover */
    transform: scale(1.05); /* Slightly increase size */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow */
}

/* Active Effect (optional for clicking) */
.button:active {
    background-color: #3e8e41; /* Even darker green when clicked */
    transform: scale(0.98); /* Slightly shrink size */
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Reduce shadow */
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
        width: 205px;
        height: 40px;
        text-align: center;
    }

  </style>
  
</head><body>



  

	
	<!-- BREADCRUMBS SETCTION START -->

<div class="breadcrumbs-section">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumbs-inner ptb-20">
            
<nav class="" role="navigation" aria-label="breadcrumbs">
  <ul class="breadcrumb-list">

    <li>
      <a href="../index.php" title="Back to the home page">Home</a>
    </li>
    <li>
      


      <span>wishlist</span>

      
    </li>
  </ul>
</nav>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- BREADCRUMBS SETCTION END -->





	


<main role="main" class="main">

	<div id="shopify-section-template--15479313039433__main" class="shopify-section"><div class="wishlist wishlist-section fix login-area pt-80 pb-80" id="wishlist">
  <div class="container">
    <div class="customer-login fix account-page wishlist-page">
      <div class="row" grid-wishlist>

      </div>
      <div class="row wishlist-grid--empty-list">
        <div class="col-12">
          <div class="empty-list--info">
              <?php

$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo "<h1>Your Wishlist</h1>";

if (!empty($_SESSION['wishlist'])) {
    // Prepare placeholders for the SQL query
    $placeholders = implode(',', array_fill(0, count($_SESSION['wishlist']), '?'));

    // Query to fetch wishlist items
    $query = "SELECT * FROM tblitem WHERE ITEM_ID IN ($placeholders)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Prepare dynamic parameters
        $types = str_repeat('i', count($_SESSION['wishlist'])); // 'i' for integer types
        $params = array_merge([$types], $_SESSION['wishlist']);

        // Use call_user_func_array to bind parameters by reference
        $refs = [];
        foreach ($params as $key => $value) {
            $refs[$key] = &$params[$key];
        }
        call_user_func_array([$stmt, 'bind_param'], $refs);

        // Execute the query
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $records = [];

        // Fetch all records
        while ($product = mysqli_fetch_assoc($result)) {
            $records[] = $product;
        }

        if (count($records) > 0) {
            // Display wishlist items in a table format
            echo '<table>
                    <tr>
                        <!-- Optionally add column headers -->
                    </tr>';

            $count = 0;
            $totalRecords = count($records);

            // Loop through records and create table rows
            while ($count < $totalRecords) {
                echo "<tr>";
                for ($i = 0; $i < 4; $i++) { // Display 4 items per row
                    if ($count < $totalRecords) {
                        $record = $records[$count];
                        $itemid = $record['ITEM_ID'];
                        echo "<td class='td'>";
                        echo "<div class='record-container'>";
                        
                        // Display product details
                        echo '<a href="flowerdetail.php?id=' . $itemid . '">';
                        echo "<img src='/PhpProjectflower/Admin/" . htmlspecialchars($record['PHOTO']) . "' alt='Image' class='record'>";
                        echo "<br><br>";
                        echo "<div class='record-name'>" . htmlspecialchars($record['NAME']) . "</div>";
                        echo "<div class='record-name'>" . htmlspecialchars($record['DESCRIPTION']) . "</div>";
                        echo "<div class='record-name'>PRICE: " . htmlspecialchars($record['PRICE']) . " Rs</div>";
                        echo '</a>';
                        
                        echo "<form method='POST' action='remove_from_wishlist.php' style='margin-top:10px;'>";
                        echo "<input type='hidden' name='remove_id' value='" . $itemid . "'>";
                        echo "<button type='submit' class='button'>Remove</button>";
                        echo "</form>";
                        
                        echo "</div>";
                        echo "</td>";
                        $count++;
                    } else {
                        // Empty cell for alignment
                        echo "<td></td>";
                    }
                }
                echo "</tr>"; // Close the row
            }
            echo '</table>';
            echo "<br><br>";
            // Display total products in the wishlist
            echo "<p><h1>Total Products in Wishlist: " . count($_SESSION['wishlist']) . "</h1></p>";
        } else {
            echo "<p>Your wishlist is empty.</p>";
        }
    } else {
        echo "Failed to prepare query: " . mysqli_error($conn);
    }
} else {
    echo "<p>Your wishlist is empty.</p>";
}

// Close the database connection
mysqli_close($conn);
?>

            <?php
//$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
//
//if (!$conn) {
//    die("Database connection failed: " . mysqli_connect_error());
//}
//
//echo "<h1>Your Wishlist</h1>";
//
//if (!empty($_SESSION['wishlist'])) {
//    // Prepare placeholders for the SQL query
//    $placeholders = implode(',', array_fill(0, count($_SESSION['wishlist']), '?'));
//
//    // Query to fetch wishlist items
//    $query = "SELECT * FROM tblitem WHERE ITEM_ID IN ($placeholders)";
//    $stmt = mysqli_prepare($conn, $query);
//
//    if ($stmt) {
//        // Prepare dynamic parameters
//        $types = str_repeat('i', count($_SESSION['wishlist'])); // 'i' for integer types
//        $params = array_merge([$types], $_SESSION['wishlist']);
//
//        // Use call_user_func_array to bind parameters by reference
//        $refs = [];
//        foreach ($params as $key => $value) {
//            $refs[$key] = &$params[$key];
//        }
//        call_user_func_array([$stmt, 'bind_param'], $refs);
//
//        // Execute the query
//        mysqli_stmt_execute($stmt);
//        $result = mysqli_stmt_get_result($stmt);
//        $records = [];
//
//
//    while ($product = mysqli_fetch_assoc($result)) {
//        $records[] = $product;
//    }
//
//
//        // Display wishlist items
//        echo '<table>
//    
//      <tr>
//<!--        <th>Column 1</th>
//        <th>Column 2</th>
//        <th>Column 3</th>
//        <th>Column 4</th>-->
//      </tr>';
//    
//    
//        $count = 0;
//        $totalRecords = count($records);
//         while ($count < $totalRecords) {
//          echo "<tr>";
//            for ($i = 0; $i < 4; $i++) {
//              if ($count < $totalRecords) {
//                  $record = $records[$count];
//                  echo "<td class='td'>";
//                  echo "<div class='record-container'>";
//                  $itemid=$record['ITEM_ID'];
//                  // Display image, name, and ID
//                  echo '<a href="flowerdetail.php?id='.$itemid.'">';
//                  echo "<img src='/PhpProjectflower/PhpProjectflower/Admin/".$record['PHOTO']."' alt='Image' class='record'>";
//                  echo "<br><br>";
//                  echo "<div class='record-name'>" . $record['NAME'] . "</div>";
//                  echo "<div class='record-name'>" . $record['DESCRIPTION'] . "</div>";
//                  echo "<div class='record-name'>PRICE : " . $record['PRICE'] . " Rs</div>";
//                  
//                  echo '</a>';
//                  echo "<br>";
//                  //echo "<button class='button'>Add to Cart</button>".'&nbsp; '."<button class='button'>Buy Now</button>";
//                  //echo "<div class='record-id'>ID: " . htmlspecialchars($record['COLOR_ID']) . "</div>";
//                  
//                  echo "</div>";
//                  echo "</td>";
//                  
//                  $count++;
//              } else {
//                  // Empty cell if no more data
//                  echo "<td></td>";
//              }
//          }
//         }
//          
//          
////        echo "<ul>";
////        while ($product = mysqli_fetch_assoc($result)) {
////            echo "<li><img src='/PhpProjectflower/PhpProjectflower/Admin/".$product['PHOTO']."' class='image'>" . htmlspecialchars($product['NAME']) . " - Rs." . htmlspecialchars($product['PRICE']) . "</li>";
////        }
////        echo "</ul>";
//
//        echo "<p>Total Products in Wishlist: " . count($_SESSION['wishlist']) . "</p>";
//    } else {
//        echo "Failed to prepare query: " . mysqli_error($conn);
//    }
//} else {
//    echo "<p>Your wishlist is empty.</p>";
//}
//
//mysqli_close($conn);
?>
              <a href="index.php"> <p><h3>Continue browsing here.</h3></p></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div></div>

    

        

    
	</main>

       





      
      
      <?php
      include 'aboutusfooter.php';
      
          
      ?>
      
      
            
    </div>
  </div>
</div>



<style>
  
  
  
      #section-footer .footer-bottom {
    background: #e7e8e8;
  }


  #section-footer .footer-bottom {
    padding-top:25px;
  }

  #section-footer .footer-bottom{
    padding-bottom:25px;
  }


  @media (min-width: 768px) and (max-width: 991px){

    #section-footer .footer-bottom {
      padding-top:25px;
    }

    #section-footer .footer-bottom {
      padding-bottom:25px;
    }

  }
  @media (max-width: 767px) {

    #section-footer .footer-bottom {
      padding-top:25px;
    }

    #section-footer .footer-bottom {
      padding-bottom:25px;
    }
  }

  
  #section-footer .footer-bottom .copyright > p {
    color: #242424;
}
  
  #section-footer .footer-bottom .copyright > p a {
    color: #000000;
}
  
  
</style> 

  
</footer><style data-shopify>#section-footer{}
  @media (min-width: 768px) and (max-width: 991px) {
    #section-footer{}
  }
  @media (max-width: 767px) {
    #section-footer{}
  }</style><style>
  
      
  #section-footer .effect-snow {
    background-image: url(wishlist.php\/\/via.placeholder.com\/500x500);
    -webkit-animation: snow 20s linear infinite;
    animation: snow 20s linear infinite;
}
  
  
</style> 









</div>
<div id="shopify-section-recommended" class="shopify-section">
</div><script src="../cdn/shop/t/24/assets/fastclick.minf929.js?v=29723458539410922371702209807" type="text/javascript"></script>
  <script src="../cdn/shop/t/24/assets/timberd5d3.js?v=92287097070241216271702209807" type="text/javascript"></script>

  
  <script>
    
  </script>

  <script id="dsq-count-scr" src="../../your-site-name-1.disqus.com/count.js" async></script>


  
<!-- modalAddToCart -->
<div class="modal fade ajax-popup" id="modalAddToCart" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog white-modal modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-content-text">
          <div class="popup-image">
            <img class="popupimage" src="#">
          </div>
          <div class="popup-content">
            <h6 class="productmsg"></h6>
            <p class="success-message"><i class="fa fa-check-circle"></i>Added to cart successfully!</p> 
            <div class="modal-button">
              <a href="../cart.php" class="theme-default-button">View Cart</a>
              <a href="../index.php" class="theme-default-button">Checkout</a>
            </div>
          </div>
        </div>
        <div class="modal-close">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modalAddToCart -->

<!-- modalAddToCart Error -->
<div class="modal fade ajax-popup error-ajax-popup" id="modalAddToCartError" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog white-modal modal-md">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="modal-content-text">
          <p class="error_message"></p>
        </div>
        <div class="modal-close">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  
  






<script>
  $(function() {
    // Current Ajax request.
    var currentAjaxRequest = null;
    // Grabbing all search forms on the page, and adding a .search-results list to each.
    var searchForms = $('form[action="/search"]').css('position','relative').each(function() {
      // Grabbing text input.
      var input = $(this).find('input[name="q"]');
      // Adding a list for showing search results.
      var offSet = input.position().top + input.innerHeight();
      $('<ul class="search-results home-two"></ul>').css( { 'position': 'absolute', 'left': '0px', 'top': offSet } ).appendTo($(this)).hide();    
      // Listening to keyup and change on the text field within these search forms.
      input.attr('autocomplete', 'off').bind('keyup change', function() {
        // What's the search term?
        var term = $(this).val();
        // What's the search form?
        var form = $(this).closest('form');
        // What's the search URL?
        var searchURL = '/search?type=product&q=' + term;
        // What's the search results list?
        var resultsList = form.find('.search-results');
        // If that's a new term and it contains at least 3 characters.
        if (term.length > 3 && term != $(this).attr('data-old-term')) {
          // Saving old query.
          $(this).attr('data-old-term', term);
          // Killing any Ajax request that's currently being processed.
          if (currentAjaxRequest != null) currentAjaxRequest.abort();
          // Pulling results.
          currentAjaxRequest = $.getJSON(searchURL + '&view=json', function(data) {
            // Reset results.
            resultsList.empty();
            // If we have no results.
            if(data.results_count == 0) {
              // resultsList.php('<li><span class="title">No results.</span></li>');
              // resultsList.fadeIn(100);
              resultsList.hide();
            } else {
              // If we have results.
              $.each(data.results, function(index, item) {
                var link = $('<a></a>').attr('href', item.url);
                link.append('<span class="thumbnail"><img src="' + item.thumbnail + '" /></span>');
                link.append('<span class="title">' + item.title + '</span>');
                link.wrap('<li></li>');
                resultsList.append(link.parent());
              });
              // The Ajax request will return at the most 10 results.
              // If there are more than 10, let's link to the search results page.
              if(data.results_count > 10) {
                resultsList.append('<li><span class="title"><a href="' + searchURL + '">See all results (' + data.results_count + ')</a></span></li>');
              }
              resultsList.fadeIn(100);
            }        
          });
        }
      });
    });
    // Clicking outside makes the results disappear.
    $('body').bind('click', function(){
      $('.search-results').hide();
    });
  });
</script>

<!-- Some styles to get you started. -->
<style>
  .search-results {
    z-index: 8889;
    list-style-type: none;   
    width: 190px;
    margin: 0;
    padding: 0;
    background: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 0px;
    -webkit-box-shadow: 0px 4px 7px 0px rgba(0,0,0,0.1);
    box-shadow: 0px 4px 7px 0px rgba(0,0,0,0.1);
    overflow: hidden;
  }
  .search-results li {
    display: block;
    width: 100%;
    height: 38px;
    margin: 0;
    padding: 0;
    border-top: 1px solid #cccccc;
    line-height: 38px;
    overflow: hidden;
  }
  .search-results li:first-child {
    border-top: none;
  }
  .search-results .title {
    float: left;
    width: 140px;
    padding-left: 8px;
    white-space: nowrap;
    overflow: hidden;
    /* The text-overflow property is supported in all major browsers. */
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    text-align: left;
    font-size:12px;
    line-height:38px;
    color:#515151;
  }
  .search-results .title:hover{
    color:#CE9634;
  }
  .search-results .thumbnail {
    float: left;
    display: block;
    width: 32px;
    height: 32px;    
    margin: 3px 0 3px 3px;
    padding: 0;
    text-align: center;
    overflow: hidden;
    border-radius:0px;
  }
</style>

  

  <div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   <i class="fa fa-times"></i>
  </button>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5">
            <div class="qwick-view-left">
              <div class="quick-view-learg-img">
                <div class="quick-view-tab-content tab-content">
                  <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                    <!-- Product Image -->
                    <div class="product-main-image__item">
                      <div class="img_box_1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="qwick-view-right">
              <div class="qwick-view-content">
                <h3 class="product_title">FROM_JS</h3>
                <div class="price price-part">
                  <span class="new price-box__new amount2 new-price">jsprice</span>
                  <span class="old main new-price">jsprice</span>
                </div>
                
                <div class="small-product-des quick-desc">
                  <div class="divider divider--xs product-info__divider"></div>
                  <div class="product-info__description product-des">FROM_JS</div>
                </div>
                
                <form id="add-item-qv" action="https://phuler.myshopify.com/cart/add" method="post">
                  <div class="quick-view-select">
                    <div class="select-option-part">
                      <div class="variants"></div>
                      <div class="divider divider--sm"></div>
                    </div>
                  </div>
                  <div class="quickview-plus-minus">
                    <div class="cart-plus-minus">
                      <input type="text" value="1" name="quantity" class="cart-plus-minus-box">
                    </div>
                    <div class="quickview-btn-cart" title="Add To Cart">
                      <button title="Add to cart" class="addtocartqv btn-hover-black" type="submit" name="add" value="Add to Cart">add to cart</button>
                    </div>
                    <script>
                      jQuery('.addtocartqv').click(function(e) {
                        e.preventDefault();
                        Shopify.addItemFromFormStart('add-item-qv', jQuery(this).attr('id'));
                      });
                    </script> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="quickViewModal_info" style="display: none;">
  <div class="button">Add To Cart</div>
  <div class="button_added">Added</div>
  <div class="button_error">limit products</div>
  <div class="button_wait">Wait...</div>
</div>


<script>  
  var mainImage = '';
  jQuery(function ($) {

    quiqview = function(product_handle) {
      Shopify.getProduct(product_handle);
    }
    Shopify.onProduct = function(product) {
      $('.viewfullinfo').attr('href', product.url);

      // product description without shortcode
      text_truncate = function(str, length, ending) {
        if (length == null) {
          length = 500;
        }
        if (ending == null) {
          ending = '...';
        }
        if (str.length > length) {
          return str.substring(0, length - ending.length) + ending;
        } else {
          return str;
        }
      };

      var _parent = '#quickViewModal';
      $(_parent+' .product_title').text(product.title);
     


      // product rating
      $(_parent+' .rating').empty();
      $(_parent+' .rating').append("<span class=\"shopify-product-reviews-badge\" data-id=\""+product.id+"\"></span>");


      //check variants
      var variant = '';

      for (i = 0; i < product.variants.length; i++) {
        if(product.variants[i].inventory_quantity > 0) {
          variant = product.variants[i];
          break;
        }
      }

      if(variant == '') {
        for (i = 0; i < product.variants.length; i++) {
          if(product.variants[i].inventory_policy == "continue") {
            variant = product.variants[i];
            break;
          }
        }
        if(variant == '') {
          variant = product.variants[0];
        }
      }

      mainImage = product.featured_image;
      var shopifyimgurl = variant.featured_image ? variant.featured_image.src : product.featured_image;
      var imgurl = "<img class=\"full-width\" alt=\"\" src = \""+shopifyimgurl+"\" >";
      jQuery(_parent+' .product-main-image__item .img_box_1').empty();
      jQuery(_parent+' .product-main-image__item .img_box_1').append(imgurl);
      jQuery(_parent+' .product-main-image__item .img_box_2').empty();
      jQuery(_parent+' .product-main-image__item .img_box_2').append(imgurl);

      // product description with shortcode
      var desc = product.description;
      if (desc.indexOf("[short_description]") >= 0) {
        desc = desc.split("[short_description]");
        desc = desc[1].split("[/short_description]");
        $(_parent+' .product-des').show();
        $(_parent+' .product-des').php(desc[0]);
      }
      else {
        $(_parent+' .product-des').php(text_truncate(product.description,499));
      }

      //set variants property
      var inv_qua = variant.inventory_quantity;
      //price
      if(variant.price < variant.compare_at_price) {
        $('.price-part .main').addClass('amount');
        $('.price-part .price-box__new').show();
        changePriceValue('.price-part .main', variant.compare_at_price);
        changePriceValue('.price-part .price-box__new', variant.price);
      }
      else {
        $('.price-part .price-box__new').hide();
        $('.price-part .main').removeClass('amount');
        changePriceValue('.price-part .main', variant.price);
      }

      // Variants select
      if(product.variants.length > 1) {
        var variants_margin = product.options.length == 2 ? 'variants_margin' : '';

        var select = '<select id="product-select-qv" name="id">';
        var selected = 'selected';
        for (i = 0; i < product.variants.length; i++) {
          var _var = product.variants[i];
          if(_var.available) {
            select += '<option value="' + _var.id + '"' + selected +'>' + _var.title + ' - ' + Shopify.formatMoney(_var.price, "<span class=money>${{amount}}</span>") + '</option>'
                                                                                                                   selected = '';
                                                                                                                   }
                                                                                                                   }
                                                                                                                   select += '</select>';

                                                                                                                   var variant_select = '<div class="variants_selects ' + variants_margin + '">';
                                                                                                                   variant_select += select;
                                                                                                                   variant_select += '</div><div class="divider divider--sm"></div>';
                                                                                                                   select = variant_select;
                                                                                                                   }
                                                                                                                   else {
                                                                                                                   var select = '<input type="hidden" name="id" value="' + product.variants[0].id + '" />';
                                                                                                                   }
                                                                                                                   $('.variants').empty();
            $('.variants').php(select);

            //parametres
            setParametresText(_parent+' .product-sku', variant.sku);
            if(jQuery(_parent + ' .product-sku').length) {
              var $ava = jQuery(_parent + " .product-info__availabilitu");
              if(variant.sku != "") {
                if($ava.hasClass('pull-left')){ $ava.removeClass('pull-left') }
              } else {
                if(!$ava.hasClass('pull-left')){ $ava.addClass('pull-left') }
              }
            }

            //quantity
            var out_of_stock = false;
            if(variant.inventory_management) {
              if(inv_qua > 0) {
                $(_parent+' .product-availability').text(inv_qua + " In Stock");
                                                         }
                                                         else {
                                                         out_of_stock = true;
                                                         $(_parent+' .product-availability').text("In Stock");
                                                                                                  }
                                                                                                  }
                                                                                                  else {
                                                                                                  $(_parent+' .product-availability').text("Many in stock");
                                                                                                                                           }

                                                                                                                                           // button
                                                                                                                                           if(!out_of_stock || variant.inventory_policy == "continue") {        
                  $('.product-available').show();
                  $('.product-disable').hide();
                  $('.addtocartqv').attr('id', product.id );
                }
                else {
                  $('.product-available').hide();
                  $('.product-disable').show();
                }

                if (product.available && product.variants.length > 1) {
                  new Shopify.OptionSelectors("product-select-qv", { product: product, onVariantSelected: selectCallbackQv, enableHistoryState: true });

                  if($('#quickViewModal .variants_selects .selector-wrapper').length > 0) {
                    $.each( jQuery('#quickViewModal .variants_selects .selector-wrapper'), function(index) {
                      $(this).find('label').text(product.options[index].name);
                    });
                  }
                }
                else {
                  jQuery('.currency .active').trigger('click');
                }
                selectGrid(_parent);

                if($(".spr-badge").length > 0) {
                  $.getScript(window.location.protocol + "//productreviews.shopifycdn.com/assets/v4/spr.js");
                }

                if($(".selector-wrapper label").length) {
                  $(".selector-wrapper label").each(function( index ) {
                    $(this).text(jQuery(this).text() + ":");
                  });
                }

                $(_parent).modal('show');

                if( !( 'ontouchstart' in window ) &&
                   !navigator.msMaxTouchPoints &&
                   !navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

                $j('body').css("top", -$j('body').scrollTop());
                $j('body').addClass("no-scroll");
                $j('.close').click(function(){
                  var top = parseInt($j('body').css("top").replace("px", ""))*-1;
                  $j('body').removeAttr("style");
                  $j('body').removeClass("no-scroll");
                  $j('body').scrollTop(top);
                });
              }

              function setParametresText(obj, value) {
                if(value != '') {
                  $(obj).parent().show();
                  $(obj).text(value);
                }
                else {
                  $(obj).parent().hide();
                }
              }

              function changePriceValue (cell, value) {
                $(cell).php(Shopify.formatMoney(value, "<span class=money>${{amount}}</span>"));
                                                 };

                                                 });



                             var selectCallbackQv = function(variant, selector) {

                  var _parent = '#quickViewModal';
                  var _parentprice = _parent + ' .price-part';
                  if (!variant) {
                    jQuery(_parent + " .price-box").hide();
                    jQuery(_parent + " .qwt").hide();
                    jQuery(_parent + " .control-console").hide();
                    jQuery(_parent + ' .addtocartqv').attr('disabled','disabled');
                    jQuery(_parent + ' .addtocartqv').text('Unavailable');
                                                           return false;
                                                           }

                                                           jQuery(_parent + " .price-box").show();
                    jQuery(_parent + " .qwt").show();
                    jQuery(_parent + " .control-console").show();

                    if(variant.price < variant.compare_at_price){
                      jQuery(_parentprice + ' .main').addClass('price-box__old');
                      jQuery(_parentprice + ' .price-box__new').show();
                      changePriceValue(_parentprice + ' .main', variant.compare_at_price);
                      changePriceValue(_parentprice + ' .price-box__new', variant.price);
                    } else {
                      jQuery(_parentprice + ' .price-box__new').hide();
                      jQuery(_parentprice + ' .main').removeClass('price-box__old');
                      changePriceValue(_parentprice + ' .main', variant.price);
                    }

                    newVariantTextDataQv(_parent + ' .product-sku', variant.sku);

                    if(jQuery(_parent + ' .product-sku').length) {
                      var $ava = jQuery(_parent + " .product-info__availabilitu");
                      if(variant.sku != "") {
                        if($ava.hasClass('pull-left')){ $ava.removeClass('pull-left') }
                      } else {
                        if(!$ava.hasClass('pull-left')){ $ava.addClass('pull-left') }
                      }
                    }

                    if (variant.available) {
                      if (variant.inventory_management == null) {
                        jQuery(_parent + " .product-availability").text("Many in stock");
                                                                        } else {
                                                                        jQuery(_parent + " .product-availability").text(" Many in stock");
                                                                                                                        }
                                                                                                                        } else {
                                                                                                                        jQuery(_parent + " .product-availability").text("Sold Out");
      }

	  var shopifyimgurl = variant.featured_image ? variant.featured_image.src : mainImage;
      var imgurl = "<img class=\"full-width\" alt=\"\" src = \""+shopifyimgurl+"\" >";
	  if(jQuery(_parent+' .product-main-image__item .img_box_1').children().length > 0) {
                          var detach = jQuery(_parent+' .product-main-image__item .img_box_1 img').detach();
                          jQuery(_parent+' .product-main-image__item .img_box_2').empty();
                          jQuery(_parent+' .product-main-image__item .img_box_2').append(detach);
                        }
                        jQuery(_parent+' .product-main-image__item .img_box_1').empty();
                        jQuery(_parent+' .product-main-image__item .img_box_1').append(imgurl);

                        if (variant && variant.available) {
                          jQuery(_parent + ' .addtocartqv').removeAttr('disabled');
                          jQuery(_parent + ' .addtocartqv').php('Add to Cart');
                                                                 jQuery(_parent + " .control-console").show();
                        } else {
                          jQuery(_parent + ' .addtocartqv').attr('disabled','disabled');
                          jQuery(_parent + ' .addtocartqv').text('Unavailable');
                                                                 jQuery(_parent + " .control-console").hide();
                        }

                        jQuery('.currency .active').trigger('click');
                      };

                      function changePriceValue (cell, value) {
                        jQuery(cell).php(Shopify.formatMoney(value, "<span class=money>${{amount}}</span>"));
                                                              };

                                                              function newVariantTextDataQv (obj, value) {
                                          if(value != '') {
                          jQuery(obj).parent().show();
                          jQuery(obj).text(value);
                        }
                        else {
                          jQuery(obj).parent().hide();
                        }
                      };


                      function selectGrid(_parent) {
                        setTimeout(timeout, 5);
                        function timeout() {
                          if(jQuery(_parent + " .selector-wrapper").length > 2){
                            jQuery(_parent + " .single-option-selector").addClass("select--wd");
                          } else if(jQuery(_parent + " .selector-wrapper").length == 1){
                            jQuery(_parent + " .single-option-selector").before("<label></label>");
                                                                                jQuery(_parent + " .single-option-selector").addClass("select--wd");
                          }
                        }
                      };
</script>

<!-- END QUICKVIEW PRODUCT -->

  <script src="../cdn/shop/t/24/assets/wishlistdc23.js?v=148269894464977033121702209807" defer="defer"></script>

  <script src="../../cdn.shopify.com/s/javascripts/currencies.js"></script>
<script src="../cdn/shop/t/24/assets/jquery.currencies.mince8a.js?v=35452912321688254271702209807"></script>

<script>

  // Pick your format here:
  // money_format or money_with_currency_format
  Currency.format = 'money_format';

  var shopCurrency = 'USD';

  /* Sometimes merchants change their shop currency, let's tell our JavaScript file */
  Currency.moneyFormats[shopCurrency].money_with_currency_format = "${{amount}} USD";
  Currency.moneyFormats[shopCurrency].money_format = "${{amount}}";

  var cookieCurrency;
  try {cookieCurrency = Currency.cookie.read();} catch (err) {} // ignore errors reading cookies

  // Fix for customer account pages.
  jQuery('span.money span.money').each(function() {
    jQuery(this).parents('span.money').removeClass('money');
  });

  // Saving the current price.
  jQuery('span.money').each(function() {
    jQuery(this).attr('data-currency-USD', jQuery(this).php());
                      });

    // Select all your currencies buttons.
    var buttons = jQuery('.currency li');

    // If there's no cookie or it's the shop currency.
    if (cookieCurrency == null || cookieCurrency === shopCurrency) {
      buttons.removeClass('active');
      jQuery('.currency li[data-currency=' + shopCurrency + ']').addClass('active');
      Currency.currentCurrency = shopCurrency;
      jQuery(".current-currency").text(shopCurrency);
    }
    else {
      Currency.convertAll(shopCurrency, cookieCurrency);
      buttons.removeClass('active');
      jQuery('.currency li[data-currency=' + cookieCurrency + ']').addClass('active');
      jQuery(".current-currency").text(cookieCurrency);
    }

    // When customer clicks on a currency button.
    buttons.click(function() {
      buttons.removeClass('active');
      var cur = jQuery(this).attr('data-currency');
      jQuery( ".currency li[data-currency='" + cur + "']" ).addClass('active');

      var newCurrency =  jQuery(this).attr('data-currency');
      if(newCurrency == Currency.currentCurrency)
      {
        Currency.convertAll(shopCurrency, newCurrency);
      }
      else
      {
        Currency.convertAll(Currency.currentCurrency, newCurrency);
      }

      jQuery(".current-currency").text(cur);
    });

    // For product options.
    var main_selectCallback = window.selectCallback;
    var selectCallback = function(variant, selector) {
      main_selectCallback(variant, selector);
      Currency.convertAll(shopCurrency, jQuery(".currency .active").attr('data-currency'));
    };
</script>

  <script type="text/javascript">
    var nToggle = $('.notification-close-btn');
    nToggle.on('click', function(){
      $('.top-notification-bar').slideToggle();
    })
  </script>

  
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                            })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-91020528-1', 'auto');
       ga('send', 'pageview');

  </script>
  

  <div class="loading-modal compare_modal">Translation missing: en.general.search.loading</div>
<div class="ajax-success-compare-modal compare_modal" id="moda-compare" tabindex="-1" role="dialog" style="display:none">
  <div class="overlay"> </div>
  <div class="modal-dialog modal-lg">
    <div class="modal-content content" id="compare-modal">
      <div class="modal-header">
        <div class="modal-close">
          <span class="compare-modal-close">x</span>
        </div>
        <h4 class="modal-title">Compare Product</h4>
      </div>
      <div class="modal-body">
        <div class="table-wrapper">
          <table class="table table-hover table-responsive">
            <thead>
              <tr class="th-compare">
                <th></th>
              </tr>
            </thead>
            <tbody id="table-compare">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  
</body>

<!-- Mirrored from phuler.myshopify.com/pages/wishlist by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:38:11 GMT -->
</html>
