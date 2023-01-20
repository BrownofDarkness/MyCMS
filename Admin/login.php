<?php
    include 'includes/headlog.php';

    if (isset($_POST['singin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $req= ("SELECT * FROM User WHERE username='$username' LIMIT 1");
        $res = $conn->query($req);
        $tab = $res->fetchAll();
        $pass=$tab[0]['password'];
        if (password_verify($password,$pass)) {
            $_SESSION['username']= $username;
            header("location:dashboard.php");
        }else {
            header("location:login.php");
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="loginBox">
        <img src="../images/Flat Boy With Glasses Vector Illustration-02.jpg" alt="" class="user">
        <h2>Log In Here</h2>
        <form action="login.php" method="post">
            <p>username</p>
            <input type="text" name="username" id="" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" name="password" id="" placeholder="Enter Password">
            <input type="submit" name="singin"  value="Sing In">
            <a href="./register.php">s'inscrire</a>
        </form>
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>
</body>
</html>