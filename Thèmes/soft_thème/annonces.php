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
  <title>Annonces</title>
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
            <li><a href="index.php#hero">Accueil</a></li>
            <li><a href="presentation.php#hero">Présentation</a></li>
            <li><a href="Projets.php#hero">Projects</a></li>
            <li><a href="Activités.php#hero">Activités</a></li>
            <li><a href="annonces.php#hero">Annonces</a></li>
            <li><a href="tourisme.php#hero">tourisme</a></li>
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
        <h1>Présentation <span></span></h1>
        <h1>De Nos<span></span></h1>
        <h1>Différentes Annonces<span></span></h1>
        
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->
  

  <!-- Projects Section -->
  <?php
    $req = "SELECT * FROM Annonce order by id desc";
    $res1 = $conn->query($req);
    if ($res1) {
        
        $all = $res1->fetchAll();
        foreach ($all as $publisher) {
                    
?>
  <section id="projects">
    <div class="projects container">
      <div class="all-projects">
     
        <div class="project-item">
          <div class="project-info">
            <h1><?php echo $publisher['titre']; ?></h1>
            <h2>Contenu de L'Annonce</h2>
            <p><?php echo $publisher['description']; ?></p>
          </div>
          <div class="project-img">
            <img src="../../images/<?php echo $publisher['image']; ?>" alt="img">
          </div>
        </div>
    
      </div>
    </div>
  </section>
  <?php
          }                            
      }
  ?>

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
      
      <p>Copyright &copy 2022 BrownofDarkness & Co. All rights reserved</p>
    </div>
  </section>
  <?php
      if (isset($_SESSION['username'])) {
  ?>
  <button class="view"><a href="../../Admin/annonces.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
  <?php
      }
  ?>
  <!-- End Footer -->
  <script src="./js/app.js"></script>
</body>

</html>