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
        <h4><span>Sucess Message</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="accordion" id="accordion2">

                  <h1>Your Order Successfully Submit</h1>

                </div>
            </div>
        </div>
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
    </section>

    <?php require_once ("our_client.php")?>
    <?php require_once ("footer.php")?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>