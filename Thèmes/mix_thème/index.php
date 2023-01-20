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
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#present" data-after="Présentation">Présentation</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="#about" data-after="About">Annonces</a></li>
            <li><a href="#contact" data-after="Contact">Publicité</a></li>
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
  <section id="hero" >
    <div class="hero container">
      <div>
        <h1>Bienvenu <span></span></h1>
        <h1>sur notre  <span></span></h1>
        <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
          ?>
          <h1><?= $tab[0]['nom']?><span></span></h1>
          <?php
              }
              else {
          ?>
            <h1><span>Sit</span>e <span>de</span> Commu<span>ne</span></h1>
          <?php
              }
          ?>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->
  <section id="present" >
    <div class="about container">
      <div class="col-right">
        <h1 class="section-title" >Présen<span>tation</span></h1>
        <h2>Voici</h2>
        <p><?= $_home["home"]["presentation"]?></p>
        <a href="./presentation.php" class="cta">Continuer dessus</a>
      </div>
    </div>
  </section>
  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Ser<span>vi</span>ces</h1>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Activités</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
            <a href="./Activités.php" class="cta">Voir plus</a>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Projets</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
            <a href="./Projets.php" class="cta">Voir plus</a>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>tourisme</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
            <a href="./tourisme.php" class="cta">Voir plus</a>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>espace PUB</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
            <a href="#contact" class="cta">Voir plus</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->


  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="./images/loader.gif" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Nos <span>Annonces</span></h1>
        <h2>Front End Developer</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, velit alias eius non illum beatae atque
          repellat ratione qui veritatis repudiandae adipisci maiores. At inventore necessitatibus deserunt
          exercitationem cumque earum omnis ipsum rem accusantium quis, quas quia, accusamus provident suscipit magni!
          Expedita sint ad dolore, commodi labore nihil velit earum ducimus nulla quae nostrum fugit aut, deserunt
          reprehenderit libero enim!</p>
        <a href="./annonces.php" class="cta">Continuer dessus</a>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Espace <span>PUBSsS</span></h1>
      </div>
      <div class="contact-items">
      <?php
        $req = "SELECT * FROM pub order by id desc";
        $res1 = $conn->query($req);
        if ($res1) {
            
            $all = $res1->fetchAll();
            foreach ($all as $publisher) {
                          
      ?>
        <div class="contact-item">
          <div class="icon"><img src="../../images/<?php echo $publisher['image']; ?>" /></div>
          <div class="contact-info">
          <p><?php echo $publisher['contenu']; ?></p>
              
        </div>
      <?php
            }
          }else {
            
      ?>
      <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+1 234 123 1234</h2>
            <h2>+1 234 123 1234</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>info@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Fatikchhari, Chittagong, Bangladesh</h2>
          </div>
        </div>
        <div class="contact-item">
            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
            <div class="contact-info">
              <h1>Address</h1>
              <h2>Fatikchhari, Chittagong, Bangladesh</h2>
            </div>
        </div>
      <?php
          }
      ?>
        
        
        
    </div>
  </section>
  <!-- End Contact Section -->

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
      <?php
      if (isset($_SESSION['username'])) {
      ?>
      <button class="view"><a href="../../Admin/home.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
      <?php
        }
      ?>
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