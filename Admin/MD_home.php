<?php
    include 'includes/headlog.php';
    include 'includes/json.php';
    require "includes/header.php";
    $_home = json_decode(file_get_contents("includes/home.json"), true);
    if (isset($_GET['id'])){
        $id= $_GET['id'];
         if (isset($_POST['Done'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $presentation = $_POST['content2'];
            $file = $_FILES['profile'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            $_home["home"]["presentation"]=$presentation;
            if (!empty($profile)) {
                $_home["fond"]["image"]=$profile;
                move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            }
            file_put_contents("includes/home.json", json_encode($_home));
            $sql = "UPDATE Site SET nom ='$title', theme_name='$content' WHERE id='$id'";
            $res = $conn->prepare($sql);
            $val= $res->execute();  
            if ($val) {
                header("Location:home.php");
            }
            else {
                header("Location:MD_home.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
            
    
    
        }
        $req = "SELECT * FROM Site WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Update Annonce</h2>
        <form action="./MD_home.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
            <p>Nom</p>
            <input type="text" name="title" id="" placeholder="Enter titre" value="<?php echo $publisher['nom']; ?>">
            <p>Thème</p>
            <select name="content" id="">
                <?php
                    if ($publisher['theme_name']==='mix_thème') {
                        
                ?>
                <option value="mix_thème" >mix_thème</option>
                <option value="soft_thème">soft_thème</option>
                <?php
                    }else {
                    
                ?>
                <option value="soft_thème">soft_thème</option>
                <option value="mix_thème">mix_thème</option>
                <?php
                   } 
                ?>
            </select>
            <p>presentation</p>
            <textarea name="content2" id=""  rows="8"><?= $_home["home"]["presentation"]?></textarea>
            <p>fond</p>
            <input type="file" name="profile" id="profile">
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