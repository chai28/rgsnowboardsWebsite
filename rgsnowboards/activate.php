<?php include 'includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h5><i class="icon fa fa-warning"></i> Error!</h5>
                Code to activate account not found.
            </div>
            <h5>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h5>
		';
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
            <h5><i class="icon fa fa-warning"></i> Error!</h5>
            Account already activated.
          </div>
          <h5>You may <a href="login.php">Login</a> or back to <a href="index.php">Homepage</a>.</h5>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
              <h5><i class="icon fa fa-check"></i> Success!</h5>
              Account activated - Email: <b>'.$row['email'].'</b>.
            </div>
            <h5>You may <a href="login.php">Login</a> or back to <a href="index.php">Homepage</a>.</h5>
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
              <h5><i class="icon fa fa-warning"></i> Error!</h5>
              '.$e->getMessage().'
            </div>
            <h5>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h5>
					';
				}

			}

		}
		else{
			$output .= '
				<div class="alert alert-danger">
          <h5><i class="icon fa fa-warning"></i> Error!</h5>
          Cannot activate account. Wrong code.
        </div>
        <h5>You may <a href="signup.php">Signup</a> or back to <a href="index.php">Homepage</a>.</h5>
			';
		}

		$pdo->close();
	}
?>

<body>
     <!-- Responsive -->
     <?php include 'responsive.php'; ?>

    <!-- Header -->
    <?php include 'header.php'; ?>

	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>
