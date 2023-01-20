<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $type = $_POST['type'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE Annonce SET titre ='$title', description='$content', type='$type' WHERE id='$id'";
                $res = $conn->prepare($sql);
                $val= $res->execute();
            }else {
                if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
                    move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                    $sql = "UPDATE Annonce SET titre ='$title', description='$content', type='$type', image ='$profile' WHERE id='$id'";
                    $res = $conn->prepare($sql);
                    $val= $res->execute();
                }else {
                    header("Location:MD_annonce.php?id=$id");
                     $_SESSION['message'] = "une erreur c'est produite sur l'image ";
                }
            }
            if ($val) {
                header("Location:annonces.php");
            }
            else {
                header("Location:MD_annonce.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM Annonce WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Update Annonce</h2>
        <form action="./MD_annonce.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
            <p>Titre</p>
            <input type="text" name="title" id="" placeholder="Enter titre" value="<?php echo $publisher['titre']; ?>">
            <p>description</p>
            <textarea name="content" id="" rows="10" placeholder="Enter description"><?php echo $publisher['description']; ?></textarea>
            <p>type</p>
            <select name="type" id="">
                <option value="Mariage">Mariage</option>
                <option value="Décret">Décret</option>
                <option value="Marcher public">Marcher public</option>
            </select>
                <?php
                    if ($publisher['type']==='Mariage') {
                        
                ?>
                <option value="Mariage">Mariage</option>
                <option value="Décret">Décret</option>
                <option value="Marcher public">Marcher public</option>
                <?php
                    }elseif ($publisher['type']==='Décret') {
                    
                ?>
                <option value="Décret">Décret</option>
                <option value="Mariage">Mariage</option>
                <option value="Marcher public">Marcher public</option>
                <?php
                    }else {
                    
                ?>
                <option value="Marcher public">Marcher public</option>
                <option value="Décret">Décret</option>
                <option value="Mariage">Mariage</option>
                <?php
                   } 
                ?>
            <p>image</p>
            <span><?php echo $publisher['image']; ?></span>
            <input type="file" name="profile" id="profile" >
            <input type="submit" value="Done" name="Done">
        </form>
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