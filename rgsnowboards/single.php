<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    $blog = $_GET['id'];

    try{
        $stmt = $conn->prepare("SELECT blogName, blogContent, blogDate FROM blog WHERE blogId = :blog");
        $stmt->execute(['blog'=>$blog]);
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
      <div class="container">
        <div class="row">
            <div class='post-entry-1'>
                <a href='single.php'>
                    <img src='images/img_1.jpg' alt='Image'
                    class='img-fluid' style='height:250px;'>
                </a>
                <div class='post-entry-1-contents'>
                    <h2 style="text-align: center;"><a href="#"><?php echo $row['blogName'];?></a></h2>
                    <span class='meta d-inline-block mb-3'>Date Created: <?php echo date_format(date_create($row['blogDate']),'d/m/Y'); ?></span>
                    <div style="text-align: justify;" ><?php echo $row['blogContent'];?></div>
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

