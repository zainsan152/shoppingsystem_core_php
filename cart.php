<?php require_once ("head.php")?>
<?php
require_once ("./Process/db_connection.php");
session_start();
//$_SESSION["total_amount"];
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
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
<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
            <?php require_once ("menu.php")?>
        </div>
    </section>
    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
        <h4><span>Shopping Cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
                <?php
                if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item){
                    $item_price = $item["quantity"]*$item["price"];
                    ?>
                    <tr>
                        <td><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
                        <td><a href="product_detail.html"><img src="<?php echo $item["image"]; ?>"</a></td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo "$ ".$item["price"]; ?></td>
                        <td><?php echo $item["quantity"] * $item["price"] ; ?></td>

                    </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"]*$item["quantity"]);
                        $_SESSION["total_amount"] =  $total_price;
                    }
                    ?>


                    <tr>
                        <td colspan="3" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                    <?php
                } else {
                    ?>
                    <div class="no-records"><h3>Your Cart is Empty</h3></div>
                    <?php
                }
                ?>



                <hr/>
                <p class="buttons center">

                    <a href="index.php"><button class="btn" type="button">Continue</button></a>
                    <button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
                </p>
            </div>

        </div>
    </section>
   <?php require_once ("footer.php")?>

</div>
<script src="themes/js/common.js"></script>
<script>
    $(document).ready(function() {
        $('#checkout').click(function (e) {
            document.location.href = "checkout.php";
        })
    });
</script>
</body>
</html>