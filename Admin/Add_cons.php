<?php
    include 'includes/headlog.php';
    require "includes/header.php";

    if (isset($_POST['Done'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $qualif = $_POST['qualif'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $profile_type = $_FILES['profile']['type'];
        if ($profile_type==="image/png"||$profile_type==="image/jpg"||$profile_type==="image/jpeg") {
            move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            $sql = "INSERT INTO conseil(nom,prenom,qualification,photo) VALUES ('$firstname', '$lastname', '$qualif','$profile')";
            // use exec() because no results are returned
            $res = $conn->exec($sql);
            if (isset($res)) {
                header("Location:dashboard.php");
                $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
            }
            else {
                header("Location:Add_cons.php");
                $_SESSION['message'] = "<p style='color:red;'>error</p>";
            }
        }else {
            header("Location:Add_cons.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }
?>
<div class="registerBox form">
        <h2>Conseil Member</h2>
        <form action="./Add_cons.php" method="post" enctype="multipart/form-data">
            <p>firstName</p>
            <input type="text" name="firstname" id="" placeholder="Enter firstName">
            <p>lastName</p>
            <input type="text" name="lastname" id="" placeholder="Enter lastName">
            <p>Qualification</p>
            <input type="text" name="qualif" id="" placeholder="The Qualification">
            <p>image</p>
            <input type="file" name="profile" required>
            <input type="submit" value="Done" name="Done">
        </form>
</div>
<?php

    require "includes/footer.php";
?>