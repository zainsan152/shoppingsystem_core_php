

<?php

require_once("head.php");


session_start();


require_once("./Process/db_connection.php");

$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>








<?php require_once ("head.php")?>
<body>
<?php require_once ("top_nav.php")?>
<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
   <?php require_once ("menu.php")?>
        </div>
    </section>
    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
        <h4><span>New products</span></h4>
    </section>
    <section class="main-content">

        <div class="row">
            <div class="span9">
                <ul class="thumbnails listing-products">
                    <?php
                    if (isset($_GET['PID']))
                    {
                        $id = intval($_GET['PID']);
                    }
                    else
                    {
                        $_GET['PID'] = 0;
                        $id =  $_GET['PID'] ;
                    }
                    $product_array = $db_handle->runQuery("SELECT * FROM tblproduct where brand_Id = '$id' ");
                    if (!empty($product_array)) {
                    foreach($product_array as $key=>$value){
                    ?>
                    <form method="post" action="product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&PID=<?php echo  $_GET['PID']; ?>">

                    <li class="span3">
                        <div class="product-box">
                            <span class="sale_tag"></span>
                            <img alt="" src=<?php echo $product_array[$key]["image"]; ?>><br/>
                            <a href="product_detail.html" class="title"><?php echo $product_array[$key]["name"]; ?></a><br/>

                            <p class="price"><?php echo $product_array[$key]["price"]; ?></p>
                            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                        </div>
                    </li>
                    </form>
                        <?php
                    }
                    }
                    ?>
                </ul>

                <hr>

               <!-- <div class="pagination pagination-small pagination-centered">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>-->
            </div>

        </div>
    </section>
    <?php require_once ("footer.php")?>
    <section id="copyright">
        <span>Copyright 2013 bootstrappage template  All right reserved.</span>
    </section>
</div>
<script src="themes/js/common.js"></script>
</body>
</html>