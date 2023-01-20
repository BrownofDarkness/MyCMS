<?php
    include 'includes/headlog.php';
    require "includes/header.php";
    if (isset($_POST['Done'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $fonction = $_POST['fonct'];
        $cv = $_FILES['cv']['name'];
        $cv_type = $_FILES['cv']['type'];
        $cv_dir = $_FILES['cv']['tmp_name'];
        $profile = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $profile_type = $_FILES['profile']['type'];
        echo $profile_type, $cv_type;
        if ($cv_type==="application/pdf"&&($profile_type==="image/png"||$profile_type==="image/jpg"||$profile_type==="image/jpeg")) {
            move_uploaded_file($tmp_dir, __DIR__."/../images/".$profile);
            move_uploaded_file($cv_dir, __DIR__."/../cv/".$cv);
            $sql = "INSERT INTO personnel(nom,Prenom,email,fonction ,cv,image) VALUES ('$firstname','$lastname','$email','$fonction','$cv','$profile')";
            // use exec() because no results are returned
            $res = $conn->exec($sql);
            if ($res) {
                header("Location:dashboard.php");
                $_SESSION['message'] = "<p style= 'color:green;'>succesful</p>";
            }
            else {
                header("Location:Add_personnel.php");
                $_SESSION['message'] = "<p style='color:red;'>error</p>";
            } 
        }else {
            header("Location:Add_personnel.php");
            $_SESSION['message'] = "<p style='color:red;'>error</p>";
        }
    }
?>

<div class="registerBox form">
        <h2>ADD Personnel</h2>
        <form action="./Add_personnel.php" method="post" enctype="multipart/form-data">
            <p>firstName</p>
            <input type="text" name="firstname" id="" placeholder="Enter firstName" required>
            <p>lastName</p>
            <input type="text" name="lastname" id="" placeholder="Enter lastName" required>
            <p>email</p>
            <input type="email" name="email" id="email" placeholder="Enter email" required>
            <p>fonction</p>
            <input type="text" name="fonct" id="" placeholder="the function" required>
            <p>CV</p>
            <input type="file" name="cv" required>
            <p>image</p>
            <input type="file" name="profile" required>
            <input type="submit" value="Done" name="Done">
            <?php
                if ($_SESSION['message']) {
                    echo $_SESSION['message'];
                    unset ($_SESSION['message']);
                }
            ?>
        </form>
</div>

<?php

    require "includes/footer.php";
?>