<?php
	include 'includes/session.php';
	$conn = $pdo->open();
	
	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		$time = time() + 1800; // 30 minutes

		if($_POST['remember']) {
			setcookie('email', $email, $time);
		}
		elseif(!$_POST['remember']) {
			if(isset($_COOKIE['email'])) {
				$past = time() - 100;
				setcookie(email, "", $past);
			}
		}

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM user WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($password ==$row['password']){
					$_SESSION['login'] = true;
					if($row['userType'] == 1){
						$_SESSION['admin'] = $row['userId'];
						$_SESSION['firstname'] = $row['firstname'];
						
					}else{
						$_SESSION['user'] = $row['userId'];
					}
				}
				else{
					$_SESSION['error'] = 'Incorrect Password';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	if(isset($_SESSION['admin'])){
		header('location: adminhome.php');
	}

	if(isset($_SESSION['user'])){
		header('location: index.php');
	}

	$pdo->close();

	


?>
