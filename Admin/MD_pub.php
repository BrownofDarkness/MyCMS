<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $content = $_POST['content'];
            $file = $_FILES['profile'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE pub SET contenu='$content' WHERE id='$id'";
            }else {
                move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                $sql = "UPDATE pub SET contenu='$content', image ='$profile' WHERE id='$id'";
            }
            $res = $conn->prepare($sql);
            $val= $res->execute();
            echo 'DATA updates';
            if ($val) {
                header("Location:Pubs.php");
            }
            else {
                header("Location:MD_pub.php?id=<?php echo $id; ?>");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM pub WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Update Publicité</h2>
        <form action="./MD_pub.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
            <p>description</p>
            <textarea name="content" id="" rows="10" placeholder="Enter description"><?php echo $publisher['contenu']; ?></textarea>
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