<?php
    $blogId = $_GET['id'];
    
    try{
      $stmt = $conn->query("SELECT image FROM blog_carousel WHERE blogId= $blog");
      echo '
        <div class="site-section">
        <div class="container">
        <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
        $addActive="";
      //Get the images for carousel display
      while($row1 = $res->fetch_assoc()){
        for($i=0; $i<count($row1); $i++){
            if($i==0){
              $addActive="active";
            }
            else{
              $addActive="";
            }
          echo '<div class="carousel-inner">
                  <div class="carousel-item ' . $addActive . '">
                    <img class="d-block w-100" src="'.$image[$i]['image'].'">
                  </div>
                </div>';
        }
      }
        echo '
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>';

    }catch(PDOException $e){
        echo"ERROR!!!!";
        echo "There is some problem in connection: " . $e->getMessage();
    }
?>

