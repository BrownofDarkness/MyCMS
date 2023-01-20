<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $nom = $_POST['firstname'];
            $prenom = $_POST['lastname'];
            $qualif = $_POST['qualif'];
            $file = $_FILES['profile'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE  conseil SET nom='$nom', prenom='$prenom', qualification='$qualif' WHERE id='$id'";
                $res = $conn->prepare($sql);
                $val= $res->execute();
            }else {
                if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
                    move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                    $sql = "UPDATE  conseil SET nom='$nom', prenom='$prenom', qualification='$qualif', photo ='$profile' WHERE id='$id'";
                    $res = $conn->prepare($sql);
                    $val= $res->execute();
                }
                else {
                    header("Location:MD_cons.php?id=$id");
                    $_SESSION['message'] = "une erreur c'est produite ";
                }
            }
            if ($val) {
                header("Location:dashboard.php");
            }
            else {
                header("Location:MD_cons.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM conseil WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>Conseil Member</h2>
        <form action="./MD_cons.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <p>firstName</p>
            <input type="text" name="firstname" id="" placeholder="Enter firstName" value="<?php echo $publisher['nom']; ?>">
            <p>lastName</p>
            <input type="text" name="lastname" id="" placeholder="Enter lastName" value="<?php echo $publisher['prenom']; ?>">
            <p>Qualification</p>
            <input type="text" name="qualif" id="" placeholder="The Qualification" value="<?php echo $publisher['qualification']; ?>">
            <p>image</p>
            <span><?php echo $publisher['photo']?></span>
            <input type="file" name="profile" >
            <input type="submit" value="Done" name="Done">
        </form>
            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
        </form>
</div> 


<?php
            }
        }                            
    }
    require "includes/footer.php";
?>