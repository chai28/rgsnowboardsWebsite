<?php include 'includes/head.php'; ?>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <!-- Responsive -->
    <?php include 'responsive.php'; ?>

    <!-- Header -->
    <?php include 'header.php'; ?>

    <div class="site-section py-5 form-style">
        <div class="container">
            <div class=" row align-items-center">
                <div class="signUp-form">
                    <div class="heading-39101 mb-5">
                        <span class="backdrop backdrop-login">Sign Up</span>
                        <span class="subtitle-39191">New Member</span>
                        <h2>Be part of the community</h2>
                    </div>
                    <?php
                        if(isset($_SESSION['error'])){
                        echo "
                            <div class='callout bg-danger text-center'>
                            ".$_SESSION['error']."
                            </div>
                        ";
                        unset($_SESSION['error']);
                        }

                        if(isset($_SESSION['success'])){
                        echo "
                            <div class='callout bg-success text-center'>
                            ".$_SESSION['success']."
                            </div>
                        ";
                        unset($_SESSION['success']);
                        }
                    ?>
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php if(isset($_COOKIE["firstname"])) { echo $_COOKIE["firstname"]; } ?>" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php if(isset($_COOKIE["lastname"])) { echo $_COOKIE["lastname"]; } ?>" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="repassword">Re-type Password</label>
                            <input type="password" class="form-control" name="repassword" placeholder="Retype Password" required>
                        </div>
                        <?php
                            if(!isset($_SESSION['captcha'])){
                            echo '
                                <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeiqbQUAAAAAJKVi6rvu504v853JiUMpk2Zu1lt"></div>
                                </div>
                            ';
                            }
                        ?>
                        <hr>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary site-btn sb-blue" name="register"><i class="align-middle fa fa-pencil"></i> <span class="align-middle">Register</span></button>
                        </div>
                        <div class="clearfix signup">
                            <a href="login.php">I already have a membership</a><br>
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

