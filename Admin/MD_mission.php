<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $titre = $_POST['title'];
            $content = $_POST['content'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE  Mission SET titre ='$titre', contenu='$content' WHERE id='$id'";
                $res = $conn->prepare($sql);
                $val= $res->execute();
            }else {
                if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
                    move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                    $sql = "UPDATE  Mission SET titre ='$titre', contenu='$content',image='$profile' WHERE id='$id'";
                    $res = $conn->prepare($sql);
                    $val= $res->execute();
                }else {
                    header("Location:MD_mission.php?id=$id");
                    $_SESSION['message'] = "une erreur c'est produite ";
                }
            }
            echo 'DATA updates';
            if ($val) {
                header("Location:dashboard.php");
            }
            else {
                header("Location:MD_mission.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM Mission WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Mairie UPDATE mission</h2>
        <form action="./MD_mission.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <p>Title</p>
            <input type="text" name="title" id="" placeholder="Enter title" value="<?php echo $publisher['titre']; ?>">
            <p>Set Story</p>
            <textarea name="content" rows="12" placeholder="the content"><?php echo $publisher['contenu'];?></textarea><br><br>
            <p>image</p>
            <span><?php echo $publisher['image']?></span>
            <input type="file" name="profile" >
            <input type="submit" value="Done" name="Done">
        </form>
</div> 


<?php
            }
        }                            
    }
    require "includes/footer.php";
?>