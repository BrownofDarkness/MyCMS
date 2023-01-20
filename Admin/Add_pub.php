<?php
    include 'includes/headlog.php';
    include 'includes/header.php';
    if (isset($_POST['Done'])) {

        $content = $_POST['content'];
        $file = $_FILES['profile'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
        $sql = "INSERT INTO pub(contenu ,image) VALUES ('$content','$profile')";
        // use exec() because no results are returned
        $res = $conn->exec($sql);
        if ($res) {
            header("Location:Pubs.php");
            $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
        }
        else {
            header("Location:Add_pub.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }

?>

    <div class="registerBox form">
        <h2>publicité</h2>
        <form action="Add_pub.php" method="post" enctype="multipart/form-data">
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