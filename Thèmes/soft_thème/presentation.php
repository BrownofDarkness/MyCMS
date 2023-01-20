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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dash.css">
    <title>Presentation</title>
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
            <li><a href="#histoire">Notre histoire</a></li>
            <li><a href="#personnel">Personnel</a></li>
            <li><a href="#conseil">conseil</a></li>
            <li><a href="#missions">Missions</a></li>
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
        <h1>DEtails <span></span></h1>
        <h1>Sur<span></span></h1>
        <h1>Site de commune<span></span></h1>
        
      </div>
    </div>
  </section>    


    <!--accueil end-->

    <!--histoire section start-->


    <section class="histoire" id="histoire">

        <center><h1 style="font-size: 5rem;">L'histoire de la mairie</h1></center>
        <?php
            $req = "SELECT * FROM presentation";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
                
        ?>
        <div class="grand">
            <div class="div">
            <div class="un">
                <p><?= $tab[0]['Story']?></p>
                
            </div>
            </div>
                    
        </div>
        <?php
             }
             else {
        ?>
        <div class="grand">
            <div class="div">
            <div class="un">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias amet eos ducimus vitae, natus consequatur similique, recusandae nemo, quod quam suscipit. Pariatur, repellendus! Labore, id ratione! Pariatur rem fuga consequuntur.</p>
                
            </div>
            </div>
            
                    
        </div>
        <?php
             }
        ?>
    </section>


      <!--histoire section end-->
      <!--histoire section start-->

        
    <section class="histoire" id="conseil">

        <center><h1 class="section-title" style="font-size: 3rem;">le <span>Conseil</span> municipal</h1></center>
        <div class="row">
        <?php
            $req = "SELECT * FROM conseil order by id desc";
            $res1 = $conn->query($req);
            if ($res1) {
                
                $all = $res1->fetchAll();
                foreach ($all as $publisher) {
                            
        ?>
            <div class="col">
                <div class="card">
                    <img src="../../images/<?php echo $publisher['photo']; ?>" alt="Jane" style="width:100%;height: 200px;">
                    <div class="contain">
                    <h2><?php echo $publisher['nom']; ?></h2>
                    <p class="title"><?php echo $publisher['qualification']; ?></p>
                    <p>example@example.com</p>
                    </div>
                </div>
            </div>
            <?php
                    }                            
                }
            ?>
        </div>
    </section>
    

      <!--histoire section end-->

      <!--section municipal start-->

      <section class="histoire" id="personnel">

        <center><h1 class="section-title" style="font-size: 3rem;">le <span>personnel</span> de la Mairie</h1></center>
        <div class="row">
        <?php
            $req = "SELECT * FROM personnel order by id desc";
            $res1 = $conn->query($req);
            if ($res1) {
                
                $all = $res1->fetchAll();
                foreach ($all as $publisher) {
                            
        ?>
            <div class="col">
                <div class="card">
                    <img src="../../images/<?php echo $publisher['image']; ?>" alt="<?php echo $publisher['nom']; ?>" style="width:100%; height: 200px;">
                    <div class="contain">
                    <h2><?php echo $publisher['nom']; ?>&nbsp&nbsp<?php echo $publisher['Prenom']; ?></h2>
                    <p class="title"><?php echo $publisher['fonction']; ?></p>
                    <p><?php echo $publisher['email']; ?></p>
                    <p><button class="button"><a href="" download="../cv/<?php echo $publisher['cv']; ?>">Download Cv</a></button></p>
                    </div>
                </div>
            </div>
            <?php
                    }                            
                }
            ?>
        </div>
    </section>

    <section class="histoire" id="missions">

        <center><h1 class="section-title" style="font-size: 3rem;">les <span>Missions</span> de la Mairie</h1></center>
        <div class="row">
            <?php
                $req = "SELECT * FROM Mission order by id desc";
                $res1 = $conn->query($req);
                if ($res1) {
                    
                    $all = $res1->fetchAll();
                    foreach ($all as $publisher) {
                                
            ?>
            <div class="col">
                <div class="card">
                    <img src="../../images/<?php echo $publisher['image']; ?>" alt="Jane" style="width:100%;height: 200px;">
                    <div class="contain">
                    <h2><?php echo $publisher['titre']; ?></h2>
                    <p><?php echo $publisher['contenu']; ?></p>
                    </div>
                </div>
            </div>
            <?php
                    }                            
                }
            ?>
        </div>
    </section>

      <!--section conseil municipal end-->
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
        
        <p>Copyright &copy &tan 2022 BrownofDarkness & CO. All rights reserved</p>
    </div>
    </section>
    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <button class="view"><a href="../../Admin/dashboard.php" ><img src="../../images/edit.png" width="100%" alt=""></a></button>
    <?php
      }
    ?>
    <!-- End Footer -->
    <script src="./js/app.js"></script>
  
</body>
</html>