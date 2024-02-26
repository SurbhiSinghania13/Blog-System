<?php
    $connect = mysqli_connect('localhost','root','root','blog_system');
    if (!$connect) {
        die("Connection Failed".mysqli_connect_error());
    }
?>