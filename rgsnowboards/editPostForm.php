<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    $blogId = $_GET['id'];

    try{
        $stmt = $conn->prepare("SELECT blogName, blogContent, blogDate, blogCatID FROM blog WHERE blogId = :blogId");
        $stmt->execute(['blogId'=>$blogId]);
        $row1 = $stmt->fetch();

        $stmt = $conn->prepare("SELECT blogcategory FROM blogcategory WHERE blogCatID = :catId");
        $stmt->execute(['catId'=>$row1['blogCatID']]);
        $row2 = $stmt->fetch();                        
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
        <form action="editPost.php?id=<?php $blogId ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category" style="margin-top: 10px; margin-left: 20px;">Post Category</label>
                <input list="categories" class="form-control" style="width:250px; margin-left: 40px;" name="category" value="<?php echo $row2['blogcategory']; ?>" required>
                <datalist id="categories">
                    <?php
                        echo '<option value="'.$row2['blogcategory'].'">';
                    ?>
                    
                </datalist>
            </div>
            <div class="form-group">
                <label for="title" style="margin-left: 20px;">Post Title</label>
                <input type="title" class="form-control" style="width:700px; margin-left: 40px;" name="title"  
                    value= "<?php echo $row1['blogName']?>";>
            </div>
            <div class="form-group">
                <label for="title" style="margin-left: 20px;">Thumbnail Photo</label>
                <input name="thumbnail" class="form-control" type="file" style="width:700px; margin-left: 40px;" />
            </div>
            <div class="form-group">
                <label for="body" style="margin-left: 20px;">Post Body</label>
                <textarea name="editor1" id="editor" style="height:500px;"><?php echo $row1['blogContent']?></textarea>
            </div> 
            <!-- <div class="form-group">
                <div class="table-responsive">
                    //include 'carouselTable.php?id="'.$blogId.'"'; ?>
                </div>
            </div> -->
            <div class="form-group text-center" style="float:right;">
                <button type="submit" class="btn btn-secondary site-btn sb-blue " style="margin-right: 40px;" name="post">
                    <i class="align-middle fa fa-sign-in"></i> <span class="align-middle">Edit</span>
                </button>
            </div>

        </form>
        </div>
    </div>
</div>

<?php  $pdo->close();?>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>