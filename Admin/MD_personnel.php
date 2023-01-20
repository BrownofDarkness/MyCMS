<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        if (isset($_POST['Done'])) {
            $firstname = $_POST['nom'];
            $lastname = $_POST['Prenom'];
            $email = $_POST['email'];
            $fonction = $_POST['fonction'];
            $profile = $_FILES['profile']['name'];
            $tmp_dir = $_FILES['profile']['tmp_name'];
            $img_type=$_FILES['profile']['type'];
            if (empty($profile)) {
                $sql = "UPDATE personnel SET nom='$firstname',Prenom='$lastname',email='$email',fonction='$fonction' WHERE id='$id'";
                $res = $conn->prepare($sql);
                $val= $res->execute();
            }else {
                if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
                    move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
                    $sql = "UPDATE personnel SET nom='$firstname',Prenom='$lastname',email='$email',fonction='$fonction',image='$profile' WHERE id='$id'";
                    $res = $conn->prepare($sql);
                    $val= $res->execute();
                }else {
                    header("Location:MD_personnel.php?id=$id");
                     $_SESSION['message'] = "une erreur c'est produite sur l'image ";
                }
            }
            if ($val) {
                header("Location:dashboard.php");
            }
            else {
                header("Location:MD_personnel.php?id=$id");
                $_SESSION['message'] = "une erreur c'est produite ";
            }
    
    
        }
        $req = "SELECT * FROM personnel WHERE id = '$id'";
        $res1 = $conn->query($req);
        if ($res1) {
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {

    
?>
<div class="registerBox form">
        <h2>UPDATE Personnel</h2>
        <form action="./MD_personnel.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <p>firstName</p>
            <input type="text" name="nom" id="" placeholder="Enter firstName"  value="<?php echo $publisher['nom']; ?>">
            <p>lastName</p>
            <input type="text" name="Prenom" id="" placeholder="Enter lastName" value="<?php echo $publisher['Prenom']; ?>">
            <p>email</p>
            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo $publisher['email']; ?>">
            <p>fonction</p>
            <input type="text" name="fonction" id="" placeholder="the function" value="<?php echo $publisher['fonction']; ?>">
            <p>image</p>
            <span><?php echo $publisher['image']?></span>
            <input type="file" name="profile" >
            <input type="submit" value="Done" name="Done">
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