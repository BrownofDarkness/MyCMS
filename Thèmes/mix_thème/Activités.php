<?php
    include '../../Admin/includes/headlog.php';
    $_home = json_decode(file_get_contents("../../Admin/includes/home.json"), true);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    :root{
      --image : url('../../images/<?= $_home["fond"]["image"]?>');
    }
    #hero{
      background-image: var(--image);
      }
  </style>

</head>
<body>
    
<!-- header section starts      -->

<header>
        <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
        <a href="#" class="logo"><?= $tab[0]['nom']?></a>
        <?php
            }
            else {
        ?>
        <h1><span>Sit</span>e <span>de</span> Commu<span>ne</span></h1>
        <?php
            }
        ?>

    <nav class="navbar">
        <a class="active" href="index.php">home</a>
        <a href="Activités.php#hero">Activités</a>
        <a href="annonces.php#hero">anonces</a>
        <a href="presentation.php#hero">presenatations</a>
        <a href="Projets.php#hero">projets</a>
        <a href="tourisme.php#hero">tourisme</a>
        <?php
            if (isset($_SESSION['username'])) {
        ?>
        <a href="../../Admin/logout.php" data-after="logout">logout</a>
        <?php
            }else {
            
        ?>
        <a href="../../Admin/login.php" data-after="login">login</a>
        <?php    
            }
        ?>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    </div>

</header>

<!-- header section ends-->

<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>


<!-- Hero Section  -->
<section id="hero">
    <div class="hero container">
      <div>
        <h1>Hello, <span></span></h1>
        <h1>Parcourez <span></span></h1>
        <h1>Nos activités <span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->


<!-- menu section starts  -->

<section class="menu" id="menu">

    <h3 class="sub-heading"> Nos Activités </h3>
    <h1 class="heading"> Activités </h1>


    <div class="box-container">

        <?php
            $req = "SELECT * FROM Activité order by id desc";
            $res1 = $conn->query($req);
            if ($res1) {
                
                $all = $res1->fetchAll();
                foreach ($all as $publisher) {
                        
        ?>
        <div class="box">
            <div class="image">
                <img src="../../images/<?php echo $publisher['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $publisher['Titre']; ?></h3>
                <p><?php echo $publisher['description']; ?></p>
            </div>
        </div>

        <?php
                }
            }else {
        
            
        ?>

        <div class="box">
            <div class="image">
                <img src="images/menu-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-3.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-4.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-5.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-6.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-7.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-8.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-9.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>
        <?php
            }
        ?>

    </div>

    <?php
      if (isset($_SESSION['username'])) {
  ?>
  <button class="view"><a href="../../Admin/activités.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
  <?php
      }
  ?>
</section>

<!-- menu section ends -->



<!-- review section ends -->



<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>locations</h3>
            <a href="#">yaoundé</a>
            <a href="#">douala</a>
            <a href="#">ngaoundérer</a>
            <a href="#">bafoussam</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">histoire</a>
            <a href="#">conseil</a>
            <a href="#">personnel</a></a>
            <a href="#">Misions</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+237-6-5666-1455</a>
            <a href="#">+237-6-5666-1455</a>
            <a href="#">shadow@gmail.com</a>
            <a href="#">darkness@gmail.com</a>
            <a href="#">yaoundé Cameroun</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <div class="credit"> copyright &copy 2022 by <span>BrownofDarkness and Team22</span> </div>

</section>

<!-- footer section ends -->

<!-- loader part  -->





















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>