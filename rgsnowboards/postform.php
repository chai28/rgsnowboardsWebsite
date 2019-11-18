<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    try{
        $stmt = $conn->prepare("SELECT * FROM blogcategory ORDER BY blogCatID");
        $stmt->execute();
    }catch(PDOException $e){
        echo"ERROR!!!!";
        echo "There is some problem in connection: " . $e->getMessage();
    }


?>
<div class="row">
    <div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card">
    <div class="card-body p-0">
        <!-- Post Form -->
        <form action="postdisplay.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category" style="margin-top: 10px; margin-left: 20px;">Post Category</label>
                <input list="categories" class="form-control" style="width:250px; margin-left: 40px;" name="category"  placeholder="Category" required>
                <datalist id="categories">
                    <?php
                        foreach($stmt as $row){
                         echo '<option value="'.$row['blogcategory'].'">';
                        }
                    ?>
                    
                </datalist>
            </div>
            <div class="form-group">
                <label for="title" style="margin-left: 20px;">Post Title</label>
                <input type="title" class="form-control" style="width:700px; margin-left: 40px;" name="title"  placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="title" style="margin-left: 20px;">Thumbnail Photo</label>
                <input id="thumbnail" name="thumbnail" class="form-control" type="file" style="width:700px; margin-left: 40px;" />
            </div>
            <div class="form-group">
                <label for="body" style="margin-left: 20px;">Post Body</label>
                <textarea name="editor1" id="editor"></textarea>
            </div> 
            <div class="form-group">
                <label for="carousel" style="margin-left: 20px;">Carousel Photos</label>
                <input type="file" id="carousel" name="carousel[]" class="form-control" style="width:700px; margin-left: 40px;" multiple/>
            </div> 
            <div class="form-group text-center" style="float:right;">
                <button type="submit" class="btn btn-secondary site-btn sb-blue " style="margin-right: 40px;" name="post">
                    <i class="align-middle fa fa-sign-in"></i> <span class="align-middle">Post</span>
                </button>
            </div>

        </form>
        </div>
    </div>
</div>
<?php  $pdo->close(); ?>
<script>
    CKEDITOR.replace("editor1",
    {
        height: 500
    });
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>