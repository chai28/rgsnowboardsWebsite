<?php include 'includes/session.php'; ?>
<?php include 'includes/head.php'; ?>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

        
    <!-- Responsive -->
    <?php include 'includes/responsive.php'; ?>

    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <div class="site-section py-5 form-style">
        <div class="container">
            <div class=" row align-items-center">
                <div class="login-form">
                    <div class="heading-39101 mb-5">
                        <span class="backdrop backdrop-login">Login</span>
                        <span class="subtitle-39191">Member Login</span>
                        <h2>All Begins Here</h2>
                    </div>
                    <form action="verify.php" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary site-btn sb-blue" name="login"><i class="align-middle fa fa-sign-in"></i> <span class="align-middle">Sign In</span></button>
                        </div>
                        <div class="clearfix">
                            <label class="float-left checkbox-inline "><input type="checkbox" name="remember" <?php echo (isset($_COOKIE['email'])) ? 'checked="checked"' : '';?> class="align-middle"> <span>Remember me</span></label>
                            <a href="password_forgot.php" class="float-right">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

