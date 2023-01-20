<?php
    include 'includes/headlog.php';
    require "includes/header.php";

    if (isset($_POST['Done'])) {
        $titre = $_POST['title'];
        $content = $_POST['contenue'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $profile_type = $_FILES['profile']['type'];
        if ($profile_type==="image/png"||$profile_type==="image/jpg"||$profile_type==="image/jpeg") {
            move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            $sql = "INSERT INTO Mission (titre,contenu,image) VALUES ('$titre','$content','$profile')";
            $res = $conn->exec($sql);
            if (isset($res)) {
                header("Location:dashboard.php");
            }else {
                header("Location:Add_mission.php");
            }
        }
        else {
            header("Location:Add_mission.php");
        }
    }
?>

<div class="registerBox form">
        <h2>Mairie add Site mission</h2>
        <form action="./Add_mission.php" method="post" enctype="multipart/form-data">
            <p>Title</p>
            <input type="text" name="title" id="" placeholder="Enter title">
            <p>Set Story</p>
            <textarea name="contenue" rows="13" placeholder="the content"></textarea><br><br>
            <p>image</p>
            <input type="file" name="profile" required>
            <input type="submit" value="Done" name="Done">
        </form>
</div>


<?php
    require "includes/footer.php";
?>