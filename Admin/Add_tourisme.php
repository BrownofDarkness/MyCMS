<?php
    include 'includes/headlog.php';
    include 'includes/header.php';
    if (isset($_POST['Done'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $img_type=$_FILES['profile']['type'];
        if ($img_type==="image/png"||$img_type==="image/jpg"||$img_type==="image/jpeg") {
            move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            $sql = "INSERT INTO Tourisme(nom,description ,image) VALUES ('$title', '$content','$profile')";
            // use exec() because no results are returned
            $res = $conn->exec($sql);
        }else {
            header("Location:Add_tourisme.php");
             $_SESSION['message'] = "une erreur c'est produite sur l'image ";
        }
        if ($res) {
            header("Location:Tourisme.php");
            $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
        }
        else {
            header("Location:Add_tourisme.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }

?>

    <div class="registerBox form">
        <h2>Activité</h2>
        <form action="Add_tourisme.php" method="post" enctype="multipart/form-data">
            <p>Titre</p>
            <input type="text" name="title" id="" placeholder="Enter titre">
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