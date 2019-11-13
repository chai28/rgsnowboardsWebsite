<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    $blogId = $_GET['blogId'];

    echo "<table class='table m-0'>";
    echo "<thead>
            <tr>
            <th>Carouse Images</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>";

    try{
        $stmt = "SELECT image FROM blog_carousel WHERE blogId=:id";
        $sql = $conn->prepare($stmt, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $sql->execute(['id'=>$blogId]);
        while($blog_info_row = $sql->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
            $image=$blog_info_row[0];
            echo "<tr>
                    <td>$image</td>
                    <td>
                    <a href='singlePostEdit.php?id=$id' class='badge badge-success'>Change</a>
                    <a href='deleteblog.php?id=$id' OnClick=\"return confirm('Are you sure to delete?');\" class='badge badge-danger'>Delete</a>
                    </td>
                </tr>";
        }

        echo '</tbody>
        </table>';
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }
    

	$pdo->close();





?>