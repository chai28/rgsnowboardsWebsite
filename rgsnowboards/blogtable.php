<?php
    include 'includes/session.php';
    $conn = $pdo->open();

    echo "<table class='table m-0'>";
    echo "<thead>
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Date Created</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>";

    try{
        $stmt = "SELECT blogId, blogName, blogContent, blogDate FROM blog";
        $sql = $conn->prepare($stmt, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $sql->execute();
        while($blog_info_row = $sql->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
            $id=$blog_info_row[0];
            $title = $blog_info_row[1];
            $content=$blog_info_row[2];
            $date=$blog_info_row[3];
            echo "<tr>
                    <td>$id</td>
                    <td>$title</td>
                    <td>$date</td>
                    <td>
                    <a href='singlePostEdit.php?id=$id' class='badge badge-success'>Edit</a>
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