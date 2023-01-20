<?php

    include "includes/headlog.php";
    include "includes/json.php";
    require_once "includes/header.php";
    $_home = json_decode(file_get_contents("includes/home.json"), true);
    $req = "SELECT * FROM Site";
    $res1 = $conn->query($req);
    $tab=$res1->fetchAll();
    if ($tab) {
?>
            <?php
                $req = "SELECT * FROM Site";
                $res1 = $conn->query($req);
                $tab=$res1->fetchAll();
                if ($tab) {
            ?>
            <button class="view"><a href="../Thèmes/<?= $tab[0]['theme_name']?>/index.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                }else {  
            ?>
            <button class="view"><a href="../Thèmes/mix_thème/index.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                } 
            ?>
<div class="story">
    <div>
        <div class="title">
            <h2>Infos du site</h2>
        </div>
        <hr>
        <div class="content">NOM: <?= $tab[0]['nom']?></div>
        <div class="content">Thème: <?= $tab[0]['theme_name']?></div>
        <div class="content">image: <?= $_home["fond"]["image"]?></div>
    </div>
    <span class="status pending"><a href="MD_home.php?id=<?php echo $tab[0]['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
</div>
<?php
        }
        else {
?>
<div class="story">
    <div>
        <div class="title">
            <h2>Nom du site</h2>
        </div>
        <hr>
        <div class="content">SiteCommune</div>
        <div class="content">nom_thème</div>
        <span class="status pending"><a href="./Add_home.php"><img src="../images/add_user.png"  width="30px" alt=""></a></span>
    </div>
</div>
<?php
        }
    require_once "includes/footer.php";
?>