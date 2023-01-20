<?php
    include 'includes/headlog.php';
    include "includes/header.php";
    if (isset($_SESSION['username'])) {
    
?>
            


            <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Publicités de la Mairie</h2> <br>
                        <a href="./Add_pub.php" class="btn">Add0ne</a>
                    </div>  

                        <table>
                        <tbody>
                        <?php
                            $req = "SELECT * FROM pub order by id desc";
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
                                <h4><?php echo $publisher['contenu']; ?></h4>
                            </td>
                            <td>
                                <span class="status inProgress"><a href="MD_pub.php?id=<?php echo $publisher['id']; ?>"><img src="../images/interact.png"  width="30px" alt=""></a></span>
                            </td>
                            <td>
                                 <span class="status return"><a href="Drop_pub.php?id=<?php echo $publisher['id']; ?>"><img src="../images/button_cancel.png"  width="30px" alt=""></a></span>
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