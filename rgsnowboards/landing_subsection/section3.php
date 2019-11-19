
<div class="container">
    <div class="site-section">
        <div class="row justify-content-center text-center">
            <div class="col-md-7">
            <div class="heading-39101 mb-5">
                <span class="backdrop text-center">Blog</span>
                <span class="subtitle-39191">Blog</span>
                <h3>Everything about Snowboarding</h3>
            </div>
            </div>
        </div>
        <div class="row">
<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    try{
        $inc = 3;//for increment in pagination
        $rowperpage = 3;
        $stmt = $conn->prepare("SELECT blogId, blogName, blogContent, blogDate, thumbnail FROM blog ORDER BY blogId LIMIT 6");
        $stmt->execute();

        foreach($stmt as $row){
            $image = (!empty($row['thumbnail'])) ? $row['thumbnail'] : 'images/img_1.jpg';
            $inc = ($inc == 3) ? 1 : $inc + 1;
            $id = $row['blogId'];
            echo '
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="'.$image.'" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <h2 class="mb-1"><a href="singleAdmin.php?id='.$id.'" >'.$row['blogName'].'</a></h2>
                            <span class="meta d-inline-block mb-3">'
                                .date_format(date_create($row['blogDate']),'d/m/Y').'</span>
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

    </div>
    </div>
    <div class="row justify-content-center text-center">
        <a href="blog.php">
            <button type="button" class="btn btn-primary" style="border-color: #aa3105">
            View All</button>
        </a> 
    </div>
</div>