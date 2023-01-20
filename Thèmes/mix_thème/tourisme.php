<?php
    include '../../Admin/includes/headlog.php';
    $_home = json_decode(file_get_contents("../../Admin/includes/home.json"), true);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/tourisme.css">
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
            <li><a href="#hero" data-after="tourisme">tourisme</a></li>
            <li><a href="presentation.php" data-after="Présentation">Présentaion</a></li>
            <li><a href="Projets.php#hero" data-after="Projets">Projets</a></li>
            <li><a href="annonces.php#hero" data-after="Annonces">Annonces</a></li>
            <li><a href="Activités.php" data-after="Activités">Activités</a></li>
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
        <h1>Sur nos  <span></span></h1>
        <h1>Sites touristiques<span></span></h1>
        <a href="#projects" type="button" class="cta">start Now</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->



  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title"><span>Si</span>tes tour<span>istiques</span></h1>
      </div>
      <div class="all-projects">
        <?php
          $req = "SELECT * FROM Tourisme order by id desc";
          $res1 = $conn->query($req);
          if ($res1) {
              
              $all = $res1->fetchAll();
              foreach ($all as $publisher) {
                            
        ?>
        <div class="project-item">
          <div class="project-info">
            <h1><?php echo $publisher['nom']; ?></h1>
            <h2>Details sur le site Touristique</h2>
            <p><?php echo $publisher['description']; ?></p>
          </div>
          <div class="project-img">
            <img src="../../images/<?php echo $publisher['image']; ?>" alt="img">
          </div>
        </div>
        <?php
              }
            }else {
            
        ?>
        <div class="project-item">
          <div class="project-info">
            <h1>Site 1</h1>
            <h2>Details sur le site</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./images/dish-2.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Site 2</h1>
            <h2>Details sur le site</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./images/dish-3.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Site 3</h1>
            <h2>Details sur le site</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./images/dish-6.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Site 4</h1>
            <h2>Details sur le site</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./images/dish-4.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Site 5</h1>
            <h2>Details sur le site</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./images/dish-1.png" alt="img">
          </div>
        </div>
        <?php
            }
        ?>
        
      </div>
    </div>
    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <button class="view"><a href="../../Admin/Tourisme.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
    <?php
        }
    ?>
  </section>
  <!-- End Projects Section -->


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