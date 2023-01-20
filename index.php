<?php
    include 'Admin/includes/headlog.php';

    if (isset($_SESSION['username'])) {
        header('Location:Admin/dashboard.php');
    }else {
        $req = "SELECT * FROM Site";
        $res1 = $conn->query($req);
        $tab=$res1->fetchAll();
        if ($tab) {
            $path= $tab[0]['theme_name'];
            header("Location:Thèmes/$path/index.php");
        }else { 
            header('Location:Thèmes/mix_thème/index.php');
        }
    } 
   
?>