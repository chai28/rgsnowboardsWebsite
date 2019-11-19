<?php
    $blogId = $_GET['id'];
    
    try{
      $stmt = "SELECT image FROM blog_carousel WHERE blogId= :id";
      $sql = $conn->prepare($stmt, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $sql->execute(['id'=>$blogId]);   
      echo '
        <div class="site-section">
        <div class="container">
        <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
        $addActive="";
      //Get the images for carousel display
      $i=0;
      while($image = $sql->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
            if($i==0){
              $addActive="active";
            }
            else{
              $addActive="";
            }
          echo '<div class="carousel-inner">
                  <div class="carousel-item ' . $addActive . '">
                    <img class="d-block w-100" src="'.$image[0].'">
                  </div>
                </div>';
          $i=1;
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

