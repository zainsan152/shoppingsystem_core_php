<?php require_once ("head.php")?>
<body>
<?php require_once ("top_nav.php")?>
<?php

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

<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <a href="index.html" class="logo pull-left"><img style="width: 193px;height: 37px;" src="themes/images/logo.jpg" class="site_logo" alt=""></a>
            <?php require_once ("menu.php")?>
        </div>
    </section>
    <section  class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="themes/images/carousel/banner-1.jpg" alt="" />
                </li>

                <li>
                    <img src="themes/images/carousel/banner-2.jpg" alt="" />
                    <div class="intro">
                        <h1>Mid season sale</h1>
                        <p><span>Up to 50% Off</span></p>
                        <p><span>On selected items online and in stores</span></p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="header_text">
        We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates.
        <br/>Don't miss to use our cheap abd best bootstrap templates.
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <?php
                                      //
                                        $product_array_item = $db_handle->runQuery("SELECT * FROM tblproduct WHERE Featured = 1 ");
                                        if (!empty($product_array_item)) {
                                            foreach($product_array_item as $key=>$value){
                                                ?>
                                                <form method="post" action="index.php?action=add&code=<?php echo $product_array_item[$key]["code"]; ?>">

                                                    <li class="span3">
                                                        <div class="product-box">
                                                            <span class="sale_tag"></span>
                                                             <img alt="" src=<?php echo $product_array_item[$key]["image"]; ?>><br/>
                                                            <a href="index.php" class="title"><?php echo $product_array_item[$key]["name"]; ?></a><br/>

                                                            <p class="price"><?php echo $product_array_item[$key]["price"]; ?></p>
                                                            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                                                        </div>
                                                    </li>
                                                </form>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <br/>
              <!--  <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <?php
/*                                     if (isset($_GET['PID']))
                                     {
                                         $id = intval($_GET['PID']);
                                     }
                                     else
                                     {
                                         $_GET['PID'] = 0;
                                         $id =  $_GET['PID'] ;
                                     }


                                        $product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE Featured = 0 and brand_Id = '$id'  ORDER BY id ASC");
                                        if (!empty($product_array)) {
                                            foreach($product_array as $key=>$value){
                                                */?>
                                                <form method="post" action="index.php?action=add&code=<?php /*echo $product_array[$key]["code"]; */?>">

                                                    <li class="span3">
                                                        <div class="product-box">
                                                            <span class="sale_tag"></span>
                                                            <img alt="" src=<?php /*echo $product_array[$key]["image"]; */?>><br/>
                                                            <a href="index.php" class="title"><?php /*echo $product_array[$key]["name"]; */?></a><br/>

                                                            <p class="price"><?php /*echo $product_array[$key]["price"]; */?></p>
                                                            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                                                        </div>
                                                    </li>
                                                </form>
                                                <?php
/*                                            }
                                        }
                                        */?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="themes/images/feature_img_2.png" alt="" />
                                <h4>New <strong>GIFT</strong></h4>
                                <p>We Have New Beautiful And Amezing Gifts For Your People</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="themes/images/feature_img_1.png" alt="" />
                                <h4>FREE <strong>SHIPPING</strong></h4>
                                <p>We Are Giving Free Shipping All Over Pakistan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="themes/images/feature_img_3.png" alt="" />
                                <h4>24/7 LIVE <strong>SUPPORT</strong></h4>
                                <p>We Are Giving 24/7 Service And Support For You.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once ("our_client.php")?>
   <?php require_once ("footer.php")?>

</div>
<script src="themes/js/common.js"></script>
<script src="themes/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 4000,
                animationSpeed: 600,
                controlNav: false,
                directionNav: true,
                controlsContainer: ".flex-container" // the container that holds the flexslider
            });
        });
    });
</script>
</body>
</html>