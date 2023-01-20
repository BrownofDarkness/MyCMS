<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $title = $_POST['title'];
            $start = $_POST['debut'];
            $end = $_POST['fin'];
            $content = $_POST['content'];
            $file = $_FILES['profile'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE Projet SET nom ='$title',debut='$start',fin='$end', deroulement='$content' WHERE id='$id'";
                $res = $conn->prepare($sql);
                $val= $res->execute();
            }else {
                if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
                    move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                    $sql = "UPDATE Projet SET nom ='$title',debut='$start',fin='$end', deroulement='$content',image='$profile' WHERE id='$id'";
                    $res = $conn->prepare($sql);
                    $val= $res->execute();
                }else {
                    header("Location:MD_project.php?id=$id");
                     $_SESSION['message'] = "une erreur c'est produite sur l'image ";
                }
            }
            if ($val) {
                header("Location:Projets.php");
            }
            else {
                header("Location:MD_project.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM Projet WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Update Activité</h2>
        <form action="./MD_projet.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
            <p>Titre</p>
            <input type="texte" name="title" id="" placeholder="Enter titre" value="<?php echo $publisher['nom']; ?>">
            <p>début</p>
            <input type="date" name="debut" id="" value="<?php echo $publisher['debut']; ?>">
            <p>fin</p>
            <input type="date" name="fin" id="" value="<?php echo $publisher['fin']; ?>">
            <p>deroulement</p>
            <textarea name="content" id="" rows="8" placeholder="Enter description"><?php echo $publisher['deroulement']; ?></textarea>
            <p>image</p>
            <span><?php echo $publisher['image']; ?></span>
            <input type="file" name="profile" id="profile">
            <input type="submit" value="Done" name="Done">
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>


<?php
            }
        }                            
    }
    require "includes/footer.php";
?>