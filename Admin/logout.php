<?php
    include 'includes/headlog.php';
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        header('Location:../index.php');
    }else {
        header('Location:../index.php');
    }
?>