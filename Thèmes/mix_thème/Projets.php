<?php
    include '../../Admin/includes/headlog.php';
    $_home = json_decode(file_get_contents("../../Admin/includes/home.json"), true);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/accueil.css">
  <title>My Website</title>
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
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
          <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
          ?>
          <h1><span><?= $tab[0]['nom']?></span></h1>
          <?php
              }
              else {
          ?>
            <h1><span>Sit</span>e <span>de</span> Commu<span>ne</span></h1>
          <?php
              }
          ?>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="index.php" data-after="Home">Home</a></li>
            <li><a href="./Projets.php#hero" data-after="Projets">Projets</a></li>
            <li><a href="./presentation.php" data-after="présentation">présentation</a></li>
            <li><a href="./tourisme.php" data-after="About">About</a></li>
            <li><a href="./annonces.php" data-after="Annonces">Annonces</a></li>
            <li><a href="./Activités.php" data-after="Activités">Activités</a></li>
            <?php
              if (isset($_SESSION['username'])) {
            ?>
            <li><a href="../../Admin/logout.php" data-after="Contact">logout</a></li>
            <?php
                }else {
                
            ?>
            <li><a href="../../Admin/login.php" data-after="Contact">login</a></li>
            <?php    
                }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Bienvenu, <span></span></h1>
        <h1>Visualiser  <span></span></h1>
        <h1>Nos projets <span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Nos <span>Pro</span>jets</h1>
      </div>
      <div class="service-bottom">
          <?php
            $req = "SELECT * FROM Projet order by id desc";
            $res1 = $conn->query($req);
            if ($res1) {
                
              $all = $res1->fetchAll();
              foreach ($all as $publisher) {
                          
        ?>
        <div class="service-item">
          <div class="icon"><img src="../../images/<?php echo $publisher['image']; ?>" /></div>
          <h2><?php echo $publisher['nom']; ?></h2>
          <h3>Début:<?php echo $publisher['debut']; ?>&nbsp&nbsp&nbsp&nbspFin:<?php echo $publisher['fin']; ?></h3>
          <h2>Deroulement du Projet</h2>
            <p><?php echo $publisher['deroulement']; ?></p>
        </div>
        <?php
              }
            }else {

        ?>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Web Design</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Web Design</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Web Design</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Web Design</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
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
  <button class="view"><a href="../../Admin/Projets.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
  <?php
      }
  ?>
  <!-- End Service Section -->

  <!-- Footer -->
  <section id="footer">
  <div class="footer container">
      <div class="brand">
      <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
          ?>
          <h1><span><?= $tab[0]['nom']?></span></h1>
          <?php
              }
              else {
          ?>
            <h1><span>Sit</span>e <span>de</span> Commu<span>ne</span></h1>
          <?php
              }
          ?>
      </div>
      <h2>Cms de gnération de sites</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="../../images/icon/icons8-facebook.svg" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="../../images/icon/icons8-linkedin-circled.svg" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="../../images/icon/icons8-whatsapp.svg" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="../../images/icon/icons8-bbb.svg" /></a>
        </div>
        
          
      </div>
      <p>Copyright © 2022 BrownofDarkness and Team22. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="js/app.js"></script>
</body>

</html>