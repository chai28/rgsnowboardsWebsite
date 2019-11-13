<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    $blogId = $_GET['id'];
    echo $blogId;

    try{
        $stmt = $conn->prepare("DELETE FROM blog WHERE blogId = :blogId");
        $stmt->execute(['blogId'=>$blogId]);  
        
        $stmt = $conn->prepare("DELETE FROM blog_carousel WHERE blogId = :blogId");
        $stmt->execute(['blogId'=>$blogId]); 
    }catch(PDOException $e){
        echo"ERROR!!!!";
        echo "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();
    header('location: blogAdmin.php');

?>