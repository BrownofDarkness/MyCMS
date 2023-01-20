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
        <a href="#hero">Présentaion</a>
        <a href="#about">histoire</a>
        <a href="#dishes">Conseil</a>
        <a href="#menu">personnel</a>
        <a href="#review">missions</a>
        <?php
            if (isset($_SESSION['username'])) {
        ?>
        <a href="../../Admin/logout.php" data-after="Contact">logout</a>
        <?php
            }else {
            
        ?>
        <a href="../../Admin/login.php" data-after="Contact">login</a>
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
        <h1>Bienvenu, <span></span></h1>
        <h1>Sur <span></span></h1>
        <h1>la Présentation <span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> Notre histoire </h1>

    <div class="row">
        <?php
            $req = "SELECT * FROM presentation";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
        <div class="content">
            <h3>différente evolutions/Régression de notre Mairie</h3>
            <p><?= $tab[0]['Story']?></p>
            
            
        </div>
        <?php
            }else {
            
        ?>
        <div class="content">
            <h3>différente evolutions/Régression de notre Mairie</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error illum quam rem in placeat laborum. Libero dolore quibusdam in fuga necessitatibus sint iste optio aspernatur vitae cupiditate ipsa odit ut sequi, rem ex autem reprehenderit? Voluptas distinctio nesciunt corrupti eius.</p>
            
            
        </div>
        <?php
            }
            
        ?>

    </div>

</section>

<!-- about section ends -->
<!-- dishes section starts  -->

<section class="dishes" id="dishes">

    <h3 class="sub-heading"> Nos conseillés </h3>
    <h1 class="heading"> conseillés </h1>

    <div class="box-container">
    <?php
        $req = "SELECT * FROM conseil order by id desc";
        $res1 = $conn->query($req);
        if ($res1) {
            
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {
                            
    ?>
         <div class="box">
            <img src="../../images/<?php echo $publisher['photo']; ?>" alt="">
            <h3><?php echo $publisher['nom']; ?></h3>
            <h3><?php echo $publisher['qualification']; ?></h3>
            <h1 class="sub-heading"> exemple@gmail.com </h1>
            <div class="stars">
                
            </div>
            
           
        </div>
    <?php
            }
        }else {
            
            
    ?>
        <div class="box">
            <img src="images/dish-1.png" alt="">
            <h3>conseil_name</h3>
            <h3>conseil_fonction</h3>
            <h1 class="sub-heading"> exemple@gmail.com </h1>
            <div class="stars">
                
            </div>
            
           
        </div>

        <div class="box">
            <img src="images/dish-2.png" alt="">
            <h3>conseil_name</h3>
            <h3>conseil_fonction</h3>
            <h1 class="sub-heading"> exemple@gmail.com </h1>
            <div class="stars">
                
            </div>
           
        </div>

        <div class="box">
            <img src="images/dish-3.png" alt="">
            <h3>conseil_name</h3>
            <h3>conseil_fonction</h3>
            <h1 class="sub-heading"> exemple@gmail.com </h1>
            <div class="stars">
                
            </div>
           
        </div>

        <div class="box">
            <img src="images/dish-4.png" alt="">
            <h3>conseil_name</h3>
            <h3>conseil_fonction</h3>
            <<h1 class="sub-heading"> exemple@gmail.com </h1>
            <div class="stars">
                
            </div>
           
        </div>
    <?php
        }
    ?>

    </div>

</section>

<!-- dishes section ends -->


<!-- menu section starts  -->

<section class="menu" id="menu">

    <h3 class="sub-heading"> Notre personnel </h3>
    <h1 class="heading"> personnel </h1>

    <div class="box-container">
        <?php
            $req = "SELECT * FROM personnel order by id desc";
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
                <h3><?php echo $publisher['nom']; ?>&nbsp&nbsp<?php echo $publisher['Prenom']; ?></h3>
                <p class="sub-heading"><?php echo $publisher['fonction']; ?></p>
                <a href="" download="../cv/<?php echo $publisher['cv']; ?>" class="btn">Download CV</a>
            </div>
        </div>
        <?php
                }
            }else {
            
            
        ?>
        <div class="box">
            <div class="image">
                <img src="images/menu-6.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>Personnel name</h3>
                <p class="sub-heading">Personnel fonction</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-7.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>Personnel name</h3>
                <p class="sub-heading">Personnel fonction</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-8.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>Personnel name</h3>
                <p class="sub-heading">Personnel fonction</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-9.jpg" alt="">
                
            </div>
            <div class="content">
                <h3>Personnel name</h3>
                <p class="sub-heading">Personnel fonction</p>
                <a href="#" class="btn">add to cart</a>
            </div>
        </div>

        <?php
            }
        ?>

        
    </div>

</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> Nos missions </h3>
    <h1 class="heading"> missions </h1>

    <div class="swiper-container review-slider">

        <div class="swiper">
            <?php
                $req = "SELECT * FROM Mission order by id desc";
                $res1 = $conn->query($req);
                if ($res1) {
                    
                    $all = $res1->fetchAll();
                    foreach ($all as $publisher) {
                                
            ?>
            <div class="slide">
                    <div class="user">
                        <img src="../../images/<?php echo $publisher['image']; ?>" alt="">
                        <div class="user-info">
                            <h3><?php echo $publisher['titre']; ?></h3>
                        </div>
                    </div> 
                    <p><?php echo $publisher['contenu']; ?></p>
                </div>
            <?php
                    }
                }else {
                
            ?>
                <div class="slide">
                    <div class="user">
                        <img src="images/pic-1.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                        </div>
                    </div> 
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
                <div class="slide">
                    <div class="user">
                        <img src="images/pic-2.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
    
                <div class="slide">
                    <div class="user">
                        <img src="images/pic-3.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
                </div>
            <?php
                }
            ?>

                



        </div>

    </div>
    
</section>
    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <button class="view"><a href="../../Admin/dashboard.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
    <?php
      }
    ?>

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

    <div class="credit"> copyright &copy 2022 by <span>BrownofDarkness and Team22</span></div>

</section>

<!-- footer section ends -->

<!-- loader part  -->





















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>