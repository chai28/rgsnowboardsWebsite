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


?>
<div class="row">
    <div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card">
    <div class="card-body p-0">
        <!-- Post Form -->
        <form action="updateAbout.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category" style="margin-top: 10px; margin-left: 20px;">About Content</label>
            </div>
            <div class="form-group">
                <textarea name="editor1" style="height:500px;"><?php echo $row['content'];?></textarea>
            </div> 
            <div class="form-group text-center" style="float:right;">
                <button type="submit" class="btn btn-secondary site-btn sb-blue " style="margin-right: 40px;" name="post">
                    <i class="align-middle fa fa-sign-in"></i> <span class="align-middle">Update</span>
                </button>
            </div>

        </form>
        </div>
    </div>
</div>

<?php  $pdo->close();?>

<script>({
  selector: "textarea",  // change this value according to your HTML
  plugins: "paste",
  menubar: "edit",
  toolbar: "paste",
  paste_data_images: true
});
</script>
