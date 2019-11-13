<?php 
include 'includes/session.php';
$conn = $pdo->open();
$content = $_POST['editor1'];

try{
    $stmt = $conn->prepare("UPDATE about SET content = :editor1");
    $stmt->execute(['editor1'=>$content]);

}catch(PDOException $e){
    echo"ERROR!!!!";
    echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close(); 
header('location: aboutEdit.php');
?>