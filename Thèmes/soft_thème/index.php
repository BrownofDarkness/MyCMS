<?php
    include '../../Admin/includes/headlog.php';
    $_home = json_decode(file_get_contents("../../Admin/includes/home.json"), true);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Accueil</title>
  <style>
    :root{
      --image : url('../../images/<?= $_home["fond"]["image"]?>');
    }
      .view{
        position: fixed;
        border: none;
        outline: none;
        height: 50px;
        width: 50px;
        bottom: 5px;
        right: 5px;
        border-radius:50%;
        z-index: 1000;
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
        <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
        <a href="#hero">
            <h1><?= $tab[0]['nom']?></h1>
          </a>
        <?php
             }
             else {
        ?>
          <a href="#hero">
            <h1><span>c</span>m<span>s</span>new<</h1>
          </a>
        <?php
             }
        ?>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero">Accueil</a></li>
            <li><a href="#services">Présentation</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#Activité">Activités</a></li>
            <li><a href="#about">Annonces</a></li>
            <li><a href="#contact">tourisme</a></li>
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
        <h1>Ici commence <span></span></h1>
        <h1>Notre<span></span></h1>
        <h1>Site de commune<span></span></h1>
        
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Presen<span>tation</span></h1>
      </div>
      <div class="all-projects">
     
        <div class="project-item">
          <div class="project-info">
            <h1>Project Commune</h1>
            <h2>Description globale des partisants de la mairie</h2>
            <p><?= $_home["home"]["presentation"]?></p>

              <button><a href="presentation.php">voir plus</a></button>
          </div>
          
        </div>
    
      </div>
    </div>
  </section>
  <!-- Service Section end -->
  

  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Projects</span></h1>
      </div>
      <div class="all-projects">
     
        <div class="project-item">
          <div class="project-info">
            <h1>nos projets</h1>
            <h2>Nos informations sur les projets</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
              <a href="Projets.php" class="cta">voir Plus</a>
          </div>
          <div class="project-img">
            <img src="./img/thumb-1920-361863.jpg" alt="img">
          </div>
        </div>
    
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- Annonces Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="./img/thumb-1920-323913.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Nos<span>Annonces</span></h1>
        <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
        <h2><?= $tab[0]['nom']?></h2>
        <?php
             }
             else {
        ?>
          <h2>Nom_<span>site</span></h2>
        <?php
             }
        ?>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, velit alias eius non illum beatae atque
          repellat ratione qui veritatis repudiandae adipisci maiores. At inventore necessitatibus deserunt
          exercitationem cumque earum omnis ipsum rem accusantium quis, quas quia, accusamus provident suscipit magni!
          Expedita sint ad dolore, commodi labore nihil velit earum ducimus nulla quae nostrum fugit aut, deserunt
          reprehenderit libero enim!</p>
        <a href="annonces.php" class="cta">voir plus</a>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- touristique Section -->
  <section id="contact">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Sites <span>touristique</span></h1>
      </div>
      <div class="all-projects">
     
        <div class="project-item">
         
          <div class="project-info">
            <h1>nos lieux de tourisme</h1>
            <h2>Nos informations sur les lieux touristique</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <button><a href="tourisme.php" >voir plus</a></button>
        </div>
    
      </div>
    </div>
  </section>
  <!-- End touristique Section -->


  <!-- publicite Section -->
  <section id="Activité">
    <div class="about container">
      <div class="col-left">
        
      </div>
      <div class="col-right">
        <h1 class="section-title">Nos <span>Activités</span></h1>
        <?php
            $req = "SELECT * FROM Site";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
          <h2><?= $tab[0]['nom']?></h2>

        <?php
             }
             else {
        ?>
          <h2>Mairie de Yaounde</h2>
        <?php
             }
        ?>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, velit alias eius non illum beatae atque
          repellat ratione qui veritatis repudiandae adipisci maiores. At inventore necessitatibus deserunt
          exercitationem cumque earum omnis ipsum rem accusantium quis, quas quia, accusamus provident suscipit magni!
          Expedita sint ad dolore, commodi labore nihil velit earum ducimus nulla quae nostrum fugit aut, deserunt
          reprehenderit libero enim!</p>
        <a href="Activités.php" class="cta">voir plus</a>
      </div>
    </div>
  </section>
    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <button class="view"><a href="../../Admin/home.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
    <?php
      }
    ?>
  <!-- End publicite Section -->

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
        <a href="#hero">
            <h1><span><?= $tab[0]['nom']?></span></h1>
          </a>
        <?php
             }
             else {
        ?>
          <a href="#hero">
            <h1><span>c</span>m<span>s</span>new<</h1>
          </a>
        <?php
             }
        ?>
      </div>
      <h2>Your Complete Web Solution</h2>
      
      <p>Copyright &copy 2022 BrownofDarkness & CO. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./js/app.js"></script>
</body>

</html>