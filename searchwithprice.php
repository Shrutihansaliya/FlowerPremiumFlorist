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
            body {
                width:100%;
    font-family: Arial, sans-serif;
    background-color: white;
}


.search-container {
    width: 100%;
    max-width: 1000px;
    margin-left: 250px;
    margin-right: 50px;
    background-color: white;
    /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);*/
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}
tr{
    width:100%;
}

.search-input input[type="search"] {
    width: 80%;
    padding: 10px;
    /*margin-bottom: 10px;*/
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

.search-input input[type="search"]:focus {
    border-color: #4CAF50;
    transition: border-color 0.3s ease;
}

/* Styling for Price Filter */
.price-filter select {
    width: 85%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    cursor: pointer;
}

.price-filter select:hover {
    border-color: #4CAF50;
    transition: border-color 0.3s ease;
}

.price-filter select:focus {
    border-color: #4CAF50;
}

#td td{
    width: 250px;
    /*border: 1px solid black;*/
}

@media (max-width: 600px) {
    .search-input input[type="search"] {
        width: 90%;
    }

    .price-filter select {
        width: 90%;
    }
}
        </style>
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
            function getdata(id)
            {
                if (id === "") {
                    document.getElementById("flowers").innerHTML = "";
                    $("#flowers").slideUp("slow");
                } else {
                    var a = new XMLHttpRequest();
                    a.open("get", "ajaxdataprice.php?sid=" + id, true);
                    a.send();
                    a.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200)
                        {
                            document.getElementById("flowers").innerHTML = this.responseText;
                            $("#flowers").slideDown("slow");
                        }
                    };
                }
            }
        </script>
        
    </head>
    <body>
        <form class="search-container">
        <table>
            <tr>
                <td id="td">Search : </td>
                <td id="td" class="search-input"><input id="search" type="search" name="q" value="" placeholder="Search our store" 
                    class="input-group-field input-text" aria-label="Search our store" onkeyup="disdata(this.value)">
                </td>
                <td id="td">Price : </td>
                <td id="td" class="price-filter">
                    
                    <select onchange="getdata(this.value)">
                        <option value="">Select Price Range</option>
                        <option value="0-100">0 - 100</option>
                        <option value="101-500">101-500</option>
                        <option value="501-1000">501-1000</option>
                        <option value="1001-1500">1001-1500</option>
                         <option value="1501-2500">1501-2500</option>
                          <option value="2500-">2500+</option>
                    </select>
                
                </td>
            </tr>
        </table>
            </form>
        <div id="data"></div>
        <div id="flowers"></div>
        <?php
        // put your code here
        ?>
    </body>
</html>
