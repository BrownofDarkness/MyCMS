<?php
    include 'includes/headlog.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM Activité WHERE id='$id'";
        $conn->exec($sql);
        header("Location:activités.php");
    }
?>