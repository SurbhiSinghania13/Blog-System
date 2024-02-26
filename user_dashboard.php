<?php
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT blog_posts.*
            FROM blog_posts
            JOIN users ON blog_posts.user_id = users.user_id
            WHERE blog_posts.user_id = $user_id
            ORDER BY blog_posts.post_date DESC";

    $result = $connect->query($sql);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>My Posts</h1>
                <div>
                    <a href="addPost.php" class="btn btn-primary">Add Post</a>

                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>

            <div id="posts" class="mt-4">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='card mb-4'>";
                            echo "<div class='card-body'>";
                            echo "<h2 class='card-title'>{$row['title']}</h2>";
                            echo "<p class='card-text'>{$row['content']}</p>";
                            echo "<p class='card-text'><small class='text-muted'>Published on: {$row['post_date']}</small></p>";
                            echo "<a href='updatePost.php?post_id={$row['post_id']}' class='btn btn-warning'>Update</a>";
                            echo "<a href='deletePost.php?post_id={$row['post_id']}' class='btn btn-danger'>Delete</a>";
                            echo "</div>";
                            echo "</div>";
                    }
                    } else {
                        echo "No posts found.";
                    }
                ?>
            </div>
        </div>    
    </body>
</html>

<?php
    $connect->close();
?>
