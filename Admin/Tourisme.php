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
            <button class="view"><a href="../Thèmes/<?= $tab[0]['theme_name']?>/tourisme.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                }else {  
            ?>
            <button class="view"><a href="../Thèmes/mix_thème/tourisme.php" ><img src="../images/eye.png" width="100%" alt=""></a></button>
            <?php
                } 
            ?>
            <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Sites touristiques de la Mairie</h2> <br>
                        <a href="Add_tourisme.php" class="btn">Add0ne</a>
                    </div>  

                        <table>
                        <tbody>
                        <?php
                            $req = "SELECT * FROM Tourisme order by id desc";
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
                                <h4><?php echo $publisher['nom']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $publisher['description']; ?></h4>
                            </td>
                            <td>
                                <span class="status inProgress"><a href="MD_tourisme.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
                            </td>
                            <td>
                                 <span class="status return"><a href="Drop_tourisme.php?id=<?php echo $publisher['id']; ?>"><img src="../images/button_cancel.png"  width="30px" alt=""></a></span>
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