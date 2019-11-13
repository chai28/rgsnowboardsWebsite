<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    try{
        $no_of_records_per_page = 3;
        $offset = 0;
        $total_pages_sql = $conn->prepare("SELECT COUNT(*) as numrows FROM blog");
        $total_pages_sql->execute();
        $total_rows = $total_pages_sql->fetch();
        $total_pages = ceil($total_rows['numrows'] / $no_of_records_per_page);

            $sql = "SELECT * FROM blog ORDER BY blogId (DESC)";
            $sql->execute();
            $row = $sql->fetch();
            echo $row;
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }
    

	$pdo->close();

?>

