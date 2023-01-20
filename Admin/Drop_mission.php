<?php
    include 'includes/headlog.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM Mission WHERE id='$id'";
        $conn->exec($sql);
        header("Location:dashboard.php");
    }
?>