<?php
    include 'includes/headlog.php';
    include "includes/header.php";
    if (isset($_SESSION['username'])) {
    
?>
            

            <?php
                $req = "SELECT * FROM Site";
                $res1 = $conn->query($req);
                $tab=$res1->fetchAll();
                if ($tab) {
            ?>
            <button class="view"><a href="../Thèmes/<?= $tab[0]['theme_name']?>/Activités.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                }else {  
            ?>
            <button class="view"><a href="../Thèmes/mix_thème/Activités.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                } 
            ?>
            <button class="view"><a href="../Thèmes/soft_thème/Activités.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Activités de la Mairie</h2> <br>
                        <a href="Add_activ.php" class="btn">Add0ne</a>
                    </div>  

                        <table>
                        <tbody>
                        <?php
                            $req = "SELECT * FROM Activité order by id desc";
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
                                <h4><?php echo $publisher['Titre']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $publisher['description']; ?></h4>
                            </td>
                            <td>
                                <span class="status inProgress"><a href="MD_Activité.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
                            </td>
                            <td>
                                 <span class="status return"><a href="Drop_acivité.php?id=<?php echo $publisher['id']; ?>"><img src="../images/button_cancel.png"  width="30px" alt=""></a></span>
                            </td>
                        </tr>
                        <?php
                                }                            
                            }
                        ?>
                        </tbody>
                    </table>
                </div>

<?php
     }
     else {
         header('location:login.php');
     }
?>
<?php
    include "includes/footer.php";
?>