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
 
 <?php include 'includes/headdashboard.php'; ?>

<body class="sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- header -->
    <?php include 'includes/headeradmin.php'; ?>
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>


    <div class="content-wrapper">
     <!-- include "carousel.php"?> -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class='post-entry-1'>
                <div class='post-entry-1-contents'>
                    <h2 style="text-left: center; text-transform: uppercase"><a href="#"><b><?php echo $row['blogName'];?></b></a></h2>
                    <? echo "title: ", $row['blogName'], date_format(date_create($row['blogDate']),'d/m/Y'); ?>
                    <span class='meta d-inline-block mb-3'>Created: <?php echo date_format(date_create($row['blogDate']),'d/m/Y'); ?></span>
                    <div style="text-align: justify;" ><?php echo $row['blogContent'];?></div>
                </div>
            </div>   
        </div>
      </div>
    </section> <!-- END .site-section -->
    </div>
    <!-- /.content-wrapper -->
    <?php $pdo->close(); ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  <!-- Footer -->
  <?php include 'footeradmin.php'; ?>
  </div>
  <!-- ./wrapper -->

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