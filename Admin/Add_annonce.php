<?php
    include 'includes/headlog.php';
    include 'includes/header.php';
    if (isset($_POST['Done'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $type = $_POST['type'];
        $file = $_FILES['profile'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $img_type=$_FILES['profile']['type'];
        if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
            move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            $sql = "INSERT INTO Annonce(titre,description,type,image) VALUES ('$title', '$content','$type','$profile')";
            // use exec() because no results are returned
            $res = $conn->exec($sql);
        }else {
            header("Location:Add_annonce.php");
             $_SESSION['message'] = "une erreur c'est produite sur l'image ";
        }
        if ($res) {
            header("Location:annonces.php");
            $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
        }
        else {
            header("Location:Add_annonce.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }

?>

    <div class="registerBox form">
        <h2>Annonce</h2>
        <form action="Add_annonce.php" method="post" enctype="multipart/form-data">
            <p>Titre</p>
            <input type="text" name="title" id="" placeholder="Enter titre">
            <p>type</p>
            <select name="type" id="">
                <option value="Mariage">Mariage</option>
                <option value="Décret">Décret</option>
                <option value="Marcher public">Marcher public</option>
            </select>
            <p>description</p>
            <textarea name="content" id="" rows="10" placeholder="Enter description"></textarea>
            <p>image</p>
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
    include 'includes/footer.php';
?>