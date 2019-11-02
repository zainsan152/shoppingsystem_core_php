<?php require_once ("head.php")?>
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
<body>
<?php require_once ("top_nav.php")?>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
            <?php require_once ("menu.php")?>
        </div>
    </section>
    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
        <h4><span>Check Out</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="accordion" id="accordion2">

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Account &amp; Billing Details</a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
    <form action="Process/checkout_process.php" method="post">
                                    <div class="span6">
                                        <h4>Your Address</h4>
                                        <div class="control-group">
                                            <label class="control-label"> Street Address:</label>
                                            <div class="controls">
                                                <input type="text"name="address" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> City:</label>
                                            <div class="controls">
                                                <input type="text" name="city" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group"> <!-- Date input -->
                                            <label class="control-label" for="date">Delivery Date</label>
                                            <div class="controls">
                                            <input readonly class="form-control" id="date" name="date"  type="text" required/>
                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="required">*</span> Post Code:</label>
                                            <div class="controls">
                                                <input type="text" name="code" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">

                                            <div class="controls">
                                                <label class="control-label"><span class="required">*</span> Cash On Delivery :</label>
                                                <input type="checkbox" name="paymentType" placeholder="" class="input-xlarge">
                                            </div>
                                        </div>
                                        <button class="btn btn-inverse pull-right">Confirm order</button>
                                    </div>
    </form>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </section>
    <?php require_once ("footer.php")?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>