<?php include 'includes/session.php'; ?>
<?php include 'includes/headdashboard.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="wrapper">

    <!-- header -->
    <?php include 'includes/adminViewHeader.php'; ?>

    
    <div class="site-section">
      <div class="container">

       
        <div class="row">
            <?php
                $conn = $pdo->open();

                try{
                    $inc = 3;//for increment in pagination
                    $rowperpage = 3;
                    $stmt = $conn->prepare("SELECT blogId, blogName, blogContent, blogDate, thumbnail FROM blog ORDER BY blogId");
                    $stmt->execute();

                    foreach($stmt as $row){
                        $image = (!empty($row['thumbnail'])) ? $row['thumbnail'] : 'images/img_1.jpg';
                        $inc = ($inc == 3) ? 1 : $inc + 1;
                        $id = $row['blogId'];
                        echo '
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="post-entry-1 h-100">
                                    <a href="singleAdmin.php?id=$id">
                                        <img src="'.$image.'"
                                        class="img-fluid">
                                    </a>
                                    <div class="post-entry-1-contents">
                                        <h2><a href="singleAdmin.php?id='.$id.'" >'.$row['blogName'].'</a></h2>
                                        <span class="meta d-inline-block mb-3">'
                                            .date_format(date_create($row['blogDate']),'d/m/Y').'
                                            <span class="mx-2">by</span> 
                                            <span>Roman Giuliano</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        ';
                        
                    }
                }catch(PDOException $e){
                    echo"ERROR!!!!";
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                

                $pdo->close();
      
            ?>
            <div class="col-12 mt-5 text-center">
                <span class="p-3">1</span>
                <a href="#" class="p-3">2</a>
                <a href="#" class="p-3">3</a>
                <a href="#" class="p-3">4</a>
            </div>

        </div>
      </div>
    </div> <!-- END .site-section -->
    
    
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

