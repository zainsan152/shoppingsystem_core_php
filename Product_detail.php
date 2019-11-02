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
        <h4><span>Product Detail</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="row">
                    <div class="span4">
                        <?php
                        if (isset($_GET['Product']))
                        {
                            $id = intval($_GET['Product']);
                        }
                        else
                        {
                            $_GET['Product'] = 0;
                            $id =  $_GET['Product'] ;
                        }
                        $product_array = $db_handle->runQuery("SELECT * FROM tblproduct where code = '$id' ");
                        if (!empty($product_array)) {
                        foreach($product_array as $key=>$value){
                        ?>
                        <a href="" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src=<?php echo $product_array[$key]["image"]; ?>></a>

                            <?php
                        }
                        }
                        ?>
                    </div>
                    <div class="span5">
                        <address>
                            <strong>Brand:</strong> <span>Apple</span><br>
                            <strong>Product Code:</strong> <span>Product 14</span><br>
                            <strong>Reward Points:</strong> <span>0</span><br>
                            <strong>Availability:</strong> <span>Out Of Stock</span><br>
                        </address>
                        <h4><strong>Price: $587.50</strong></h4>
                    </div>
                    <div class="span5">
                        <form class="form-inline">
                            <label class="checkbox">
                                <input type="checkbox" value=""> Option one is this and that
                            </label>
                            <br/>
                            <label class="checkbox">
                                <input type="checkbox" value=""> Be sure to include why it's great
                            </label>
                            <p>&nbsp;</p>
                            <label>Qty:</label>
                            <input type="text" class="span1" placeholder="1">
                            <button class="btn btn-inverse" type="submit">Add to cart</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
  <?php  require_once ("footer.php")?>

</div>
<script src="themes/js/common.js"></script>
<script>
    $(function () {
        $('#myTab a:first').tab('show');
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    })
    $(document).ready(function() {
        $('.thumbnail').fancybox({
            openEffect  : 'none',
            closeEffect : 'none'
        });

        $('#myCarousel-2').carousel({
            interval: 2500
        });
    });
</script>
</body>
</html>