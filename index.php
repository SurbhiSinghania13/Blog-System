<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Blogs</h1>
                <a href="login.php" class="btn btn-primary ml-3" id="loginButton">Login</a>
            </div>

            <div id="blogs" class="mt-4">
                <?php
                    include('connect.php');
                    $sql = "SELECT blog_posts.*, users.username
                            FROM blog_posts
                            JOIN users ON blog_posts.user_id = users.user_id
                            ORDER BY blog_posts.post_date DESC";

                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='card mb-4'>";
                            echo "<div class='card-body'>";
                            echo "<h2 class='card-title'>{$row['title']}</h2>";
                            echo "<p class='card-text'>{$row['content']}</p>";
                            echo "<p class='card-text'><small class='text-muted'>Published on: {$row['post_date']} by <span class='highlight-username'>{$row['username']}</span></small></p>";
                            echo '</div>';
                            echo '</div>';
                            echo '<hr>';
                        }

                    } else {
                        echo "No blog posts found.";
                    }
                ?>
            </div>
        </div>    
    </body>
</html>