<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['post'])){

        $category = $_POST['category'];
		$title = $_POST['title'];
		$thumbnail = $_FILES['thumbnail']['name'];
		$body = $_POST['editor1'];
		$carousel = $_FILES['carousel']['name'];
        $categoryid ;
        
        $id = $_GET['blogId'];

		// Count # of uploaded files in array
		$total = count($carousel);
		echo "count:", $total;


		try{
            //Check the category list
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM blogCategory WHERE blogcategory = :category GROUP by blogCatID");
			$stmt->execute(['category'=>$category]);
            $row = $stmt->fetch();
			if($row['numrows'] > 0){
				$categoryid = $row['blogCatID'];
			}
			else{
				$stmt = $conn->prepare("INSERT INTO blogCategory (blogcategory) values (:category)");
				$stmt->execute(['category'=>$category]);
				$categoryid = $conn->lastInsertId();
			}
			move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'images/'.$thumbnail);
			$filename =  'images/'.$thumbnail;
			
            //Insert into blog Table 
			$stmt = $conn->prepare("UPDATE blog SET blogName=:title, thumbnail=:thumbnail, blogContent=:body, blogCatID=:categoryid) WHERE blogId=:blogId");
			$stmt->execute(['title'=>$title, 'thumbnail'=>$filename, 'body'=>$body, 'categoryid'=>$categoryid, 'blogId'=>$id]);
			$id = $conn->lastInsertId();

			
			// // Loop through each file
			// for( $i=0 ; $i < $total ; $i++ ) {

			// 	//Get the temp file path
			// 	$tmpFilePath = $_FILES['carousel']['tmp_name'][$i];
			// 	//Make sure we have a file path
			// 	if ($tmpFilePath != ""){
			// 		//Setup our new file path
			// 		$newFilePath = "images/" . $_FILES['carousel']['name'][$i];
			// 		$filename = $newFilePath;

			// 		//Upload the file into the temp dir
			// 		if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			// 			//Insert into blog_carousel Table 
			// 			$stmt = $conn->prepare("UPDATE blog_carousel SET image=:photo WHERE blogId=:blogId");
			// 			$stmt->execute(['filename'=>$filename]);

			// 		}
			// 	}
			// }
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Unable to post blog';
	}
	
    $pdo->close();
    header('location: blogAdmin.php');

	

	


?>
