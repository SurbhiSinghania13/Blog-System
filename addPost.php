<?php
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $error = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $image_url = $_POST["image_url"];
        $content = $_POST["content"];

        $stmt = $connect->prepare("INSERT INTO blog_posts (user_id, title, image_url, content) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            $error = "Error preparing the statement: " . $connect->error;
        } else {
            $stmt->bind_param("isss", $user_id, $title, $image_url, $content);

            if ($stmt->execute()) {
                header("Location: user_dashboard.php");
                exit();
            } else {
                $error = "Error adding the post: " . $stmt->error;
            }

        $stmt->close();
        }
    }

    $connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Add Post</h1>
                <a href="user_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>

            <div id="addPostForm" class="mt-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="image_url" name="image_url">
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>

                    <button type="submit" name="addPost" class="btn btn-primary">Add Post</button>
                </form>
            </div>
        </div>

    <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
    ?>

    </body>
</html>
