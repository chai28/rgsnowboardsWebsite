<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    try{
        $stmt = $conn->prepare("SELECT * FROM about");
        $stmt->execute();
        $row = $stmt->fetch();
    }catch(PDOException $e){
        echo"ERROR!!!!";
        echo "There is some problem in connection: " . $e->getMessage();
    }

    include 'includes/head.php';

?>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
 
  <!-- Responsive -->
  <?php include 'includes/responsive.php'; ?>

  <!-- Header -->
  <?php include 'includes/header.php'; ?>
  
    
    <div class="site-section">
          <div class="row">
            <div class="row col-md-6" style="padding-left: 70px;">
                <div class='post-entry-1-contents'>
                    <h2 style="text-align: left;"><a href="#">About Me</a></h2>
                    <div style="text-align: justify;" ><?php echo $row['content'];?></div>
                </div>
            </div>   
            <div class="col-md-6">
                <div class="row-about" style="float:right;">
                    <div class="column-about col-md-3">
                        <img src="images/roman_gallery/deep-carving.jpg" style="width:100%; height:180px">
                        <img src="images/roman_gallery/flying-japow.jpg" style="width:100%; height:180px">
                        <img src="images/roman_gallery/about-me-2.jpg" style="width:100%; height:180px">
                    </div>
                    <div class="column-about col-md-3">
                        <img src="images/roman_gallery/about-me.jpg" style="width:100%; height:250px">
                        <img src="images/roman_gallery/yotei-san.jpg" style="width:100%; height:300px">
                    </div>
                </div>
            </div>
          </div>
    </div> <!-- END .site-section -->
    
    <?php $pdo->close(); ?>
    <!-- Subscribe Section -->
    <?php include 'subscribe.php'; ?>

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

