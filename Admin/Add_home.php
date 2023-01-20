<?php
    include 'includes/headlog.php';
    include 'includes/header.php';
    if (isset($_POST['Done'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $sql = "INSERT INTO Site(nom,theme_name) VALUES ('$title', '$content')";
        // use exec() because no results are returned
        $res = $conn->exec($sql);
        if ($res) {
            header("Location:home.php");
            $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
        }
        else {
            header("Location:Add_home.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }

?>

    <div class="registerBox form">
        <h2>Annonce</h2>
        <form action="Add_home.php" method="post" enctype="multipart/form-data">
            <p>nom site</p>
            <input type="text" name="title" id="" placeholder="Enter titre">
            <p>thème</p>
            <select name="content" id="">
                <option value="soft_thème">soft_thème</option>
                <option value="mix_thème">mix_thème</option>
            </select>
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