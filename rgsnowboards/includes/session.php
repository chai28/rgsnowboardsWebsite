<?php
	include 'includes/connection.php';
	//session_start();

	if(isset($_SESSION['admin'])){
		header('location: home.php');
	}

	if(isset($_SESSION['user'])){
		header('location: index.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>
