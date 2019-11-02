<nav id="menu" class="pull-right">
    <ul>
        <?php
        require_once("./Process/db_connection.php");
        $db_handle = new DBController();
        $product_array = $db_handle->runQuery("SELECT * FROM category ");
        if (!empty($product_array)) {

            foreach($product_array as $key=>$value){
                $cat_id = $product_array[$key]["category_Id"];
                ?>
                <li><a href="product.php"><?php echo $product_array[$key]["name"]; ?></a>
                    <ul>
                        <form method="get" action="#">
                            <?php
                            $product_array_brand = $db_handle->runQuery("SELECT * FROM brand where category_Id = '$cat_id' ");
                            if (!empty($product_array_brand)) {
                                foreach($product_array_brand as $key=>$value){
                                    $GLOBALS['z']  = $product_array_brand[$key]["brand_Id"];
                                    $_SESSION["brandid"] =$product_array_brand[$key]["brand_Id"];
                                    ?>
                                    <li > <a href="product.php?PID=<?php echo $GLOBALS['z']; ?>"><?php echo $product_array_brand[$key]["name"]; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</nav>