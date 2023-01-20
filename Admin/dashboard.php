<?php
    include 'includes/headlog.php';
    include "includes/header.php";
    if (isset($_SESSION['username'])) {
    
?>
      <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,504</div>
                    <div class="cardName">Daily Views</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>


            <div class="card">
                <div>
                    <div class="numbers">284</div>
                    <div class="cardName">Comments</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
            <?php
                $req = "SELECT * FROM Site";
                $res1 = $conn->query($req);
                $tab=$res1->fetchAll();
                if ($tab) {
            ?>
            <button class="view"><a href="../Thèmes/<?= $tab[0]['theme_name']?>/presentation.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                }else {  
            ?>
            <button class="view"><a href="../Thèmes/mix_thème/presentation.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                } 
            ?>
            
            

        </div>
        <?php
            $req = "SELECT * FROM presentation";
            $res1 = $conn->query($req);
            $tab=$res1->fetchAll();
            if ($tab) {
        ?>
        <div class="story">
            <div>
                <div class="title">
                    <h2>Story</h2>
                </div>
                <hr>
                <div class="content"><?= $tab[0]['Story']?></div>
            </div>
            <span class="status pending"><a href="MD_story.php?id=<?php echo $tab[0]['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
            <span class="status return"><a href="Drop_story.php?id=<?php echo $tab[0]['id']; ?>"><img src="../images/button_cancel.png"  width="30px" alt=""></a></span>
        </div>
        <?php
             }
             else {
        ?>
        <div class="story">
            <div>
                <div class="title">
                    <h2>Story</h2>
                </div>
                <hr>
                <div class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, excepturi quaerat. Autem dignissimos expedita magnam dolores soluta. Recusandae, aliquam! Explicabo cumque ipsa sint illum aliquam culpa beatae modi totam dicta.</div>
                <span class="status pending"><a href="./Add_story.php"><img src="../images/add_user.png"  width="30px" alt=""></a></span>
            </div>
        </div>
        <?php
             }
        ?>


        <!-- ================ Order Details List ================= -->
        <div class="details">
            
    
        </div>
        <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Personnel</h2>
                        <a href="Add_personnel.php" class="btn">Add0ne</a>
                    </div>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Fonction</td>
                                <td>Modifier</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $req = "SELECT * FROM personnel order by id desc";
                                $res1 = $conn->query($req);
                                if ($res1) {
                                 
                                    $all = $res1->fetchAll();
                                    foreach ($all as $publisher) {
                                                
                            ?>
                            
                            <tr>
                                <td><?php echo $publisher['nom']; ?></td>
                                <td><?php echo $publisher['fonction']; ?></td>
                                <td><span class="status pending"><a href="MD_personnel.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span></td>
                                <td><span class="status return"><a href="Drop_pers.php?id=<?php echo $publisher['id']; ?>"><img src="../images/delete_user.png"  width="30px" alt=""></a></span></td>
                            </tr>
                            <?php
                                    }                            
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Missions de la Mairie</h2>
                        <a href="Add_mission.php" class="btn">Add0ne</a>
                    </div>  

                        <table>
                        <tbody>
                        <?php
                            $req = "SELECT * FROM Mission order by id desc";
                            $res1 = $conn->query($req);
                            if ($res1) {
                                
                                $all = $res1->fetchAll();
                                foreach ($all as $publisher) {
                                            
                        ?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../images/<?php echo $publisher['image']; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4><?php echo $publisher['titre']; ?></h4>
                            </td>
                            <td>
                                <span class="status inProgress"><a href="MD_mission.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
                            </td>
                            <td>
                                 <span class="status return"><a href="Drop_mission.php?id=<?php echo $publisher['id']; ?>"><img src="../images/button_cancel.png"  width="30px" alt=""></a></span>
                            </td>
                        </tr>
                        <?php
                                }                            
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Conseil Municipal</h2>
                        <a href="Add_cons.php" class="btn">Add0ne</a>
                    </div>
                    <hr>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Qualification</td>
                                <td>Modifier</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $req = "SELECT * FROM conseil order by id desc";
                                $res1 = $conn->query($req);
                                if ($res1) {
                                 
                                    $all = $res1->fetchAll();
                                    foreach ($all as $publisher) {
                                                
                            ?>
                            <tr>
                                <td><?php echo $publisher['nom']; ?></td>
                                <td><?php echo $publisher['qualification']; ?></td>
                                <td><span class="status pending"><a href="MD_cons.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span></td>
                                <td><span class="status return"><a href="Drop_cons.php?id=<?php echo $publisher['id']; ?>"><img src="../images/delete_user.png"  width="30px" alt=""></a></span></td>
                            </tr>
                            <?php
                                    }                            
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

<?php
     }
     else {
         header('location:../index.php');
     }
?>
<?php
    include "includes/footer.php";
?>