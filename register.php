<?php require_once ("head.php")?>
<body>
<?php require_once ("header.php")?>
<?php require_once ("top_nav.php")?>
<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <a href="index.html" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
            <nav id="menu" class="pull-right">
                <ul>
                    <li><a href="./products.html">Woman</a>
                        <ul>
                            <li><a href="./products.html">Lacinia nibh</a></li>
                            <li><a href="./products.html">Eget molestie</a></li>
                            <li><a href="./products.html">Varius purus</a></li>
                        </ul>
                    </li>
                    <li><a href="./products.html">Man</a></li>
                    <li><a href="./products.html">Sport</a>
                        <ul>
                            <li><a href="./products.html">Gifts and Tech</a></li>
                            <li><a href="./products.html">Ties and Hats</a></li>
                            <li><a href="./products.html">Cold Weather</a></li>
                        </ul>
                    </li>
                    <li><a href="./products.html">Hangbag</a></li>
                    <li><a href="./products.html">Best Seller</a></li>
                    <li><a href="./products.html">Top Seller</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
        <h4><span>Login or Regsiter</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span5">
                <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
                <form action="./Process/login_process.php" method="post">
                    <input type="hidden" name="next" value="/">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="email" name="email" placeholder="Enter your username" id="username" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="psw" placeholder="Enter your password" id="password" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
                            <hr>
                            <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="span7">
                <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
                <form action="Process/signUp_process.php" method="post" class="form-stacked">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <input type="text" name="name" placeholder="Enter your username" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email address:</label>
                            <div class="controls">
                                <input type="email" name="email" placeholder="Enter your email" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password:</label>
                            <div class="controls">
                                <input type="password" name="password" placeholder="Enter your password" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Mobile:</label>
                            <div class="controls">
                                <input type="text" name="phone" placeholder="Enter your Mobile" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Address:</label>
                            <div class="controls">
                                <input type="text" name="address" placeholder="Enter your Address" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">State:</label>
                            <div class="controls">
                                <input type="text" name="state" placeholder="Enter your State" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">City:</label>
                            <div class="controls">
                                <input type="text" name="City" placeholder="Enter your City" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
                        </div>
                        <hr>
                        <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <section id="footer-bar">
        <div class="row">
            <div class="span3">
                <h4>Navigation</h4>
                <ul class="nav">
                    <li><a href="./index.html">Homepage</a></li>
                    <li><a href="./about.html">About Us</a></li>
                    <li><a href="./contact.html">Contac Us</a></li>
                    <li><a href="./cart.html">Your Cart</a></li>
                    <li><a href="./register.html">Login</a></li>
                </ul>
            </div>
            <div class="span4">
                <h4>My Account</h4>
                <ul class="nav">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">Newsletter</a></li>
                </ul>
            </div>
            <div class="span5">
                <p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
                <br/>
                <span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
            </div>
        </div>
    </section>
    <section id="copyright">
        <span>Copyright 2013 bootstrappage template  All right reserved.</span>
    </section>
</div>
<script src="themes/js/common.js"></script>
<script>
    $(document).ready(function() {
        $('#checkout').click(function (e) {
            document.location.href = "checkout.html";
        })
    });
</script>
</body>
</html>