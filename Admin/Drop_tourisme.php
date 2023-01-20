<?php
    include 'includes/headlog.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM Tourisme WHERE id='$id'";
        $conn->exec($sql);
        header("Location:Tourisme.php");
    }
?>