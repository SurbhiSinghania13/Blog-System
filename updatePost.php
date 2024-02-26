<?php
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $error = "";

    // Check if post_id is provided in the URL
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

        // Fetch the post data
        $sql = "SELECT * FROM blog_posts WHERE post_id = $post_id AND user_id = $user_id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row['title'];
            $content = $row['content'];
            $image_url = $row['image_url'];
        } else {
            header("Location: user_dashboard.php");
            exit();
        }
    } else {
        header("Location: user_dashboard.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newTitle = $_POST["newTitle"];
        $newImageURL = $_POST["newImageURL"];
        $newContent = $_POST["newContent"];

        $stmt = $connect->prepare("UPDATE blog_posts SET title = ?, image_url = ?, content = ? WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("sssii", $newTitle, $newImageURL, $newContent, $post_id, $user_id);

        if ($stmt->execute()) {
            header("Location: user_dashboard.php");
            exit();
        } else {
            $error = "Error updating the post.";
        }

        $stmt->close();
    }

    $connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Update Post</h1>
                <a href="user_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>

            <div id="updatePostForm" class="mt-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="newTitle">Title:</label>
                        <input type="text" class="form-control" id="newTitle" name="newTitle" value="<?= htmlspecialchars($title); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="newImageURL">Image URL:</label>
                        <input type="text" class="form-control" id="newImageURL" name="newImageURL" value="<?= htmlspecialchars($image_url); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="newContent">Content:</label>
                        <textarea class="form-control" id="newContent" name="newContent" rows="5" required><?= htmlspecialchars($content); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
            <?php
                if (!empty($error)) {
                    echo "<p class='error'>$error</p>";
                }
            ?>
        </div>

    </body>
</html>
