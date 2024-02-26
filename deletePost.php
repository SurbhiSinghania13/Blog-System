<?php
    include('connect.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $error = "";

    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

        // Delete the post
        $stmt = $connect->prepare("DELETE FROM blog_posts WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $post_id, $user_id);

        if ($stmt->execute()) {
            header("Location: user_dashboard.php");
            exit();
        } else {
            $error = "Error deleting the post.";
        }

        $stmt->close();
    } else {
        header("Location: user_dashboard.php");
        exit();
    }

    $connect->close();
?>
