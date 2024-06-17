<?php 
include('./adminPartials/adminHeader.php');
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenuA.php');
       ?>

         <div class="mainBody">
            <div class="topSection flex">
                <div class="title">
                    <span><strong>Subscribers</strong> Page</span>
                </div>

                <?php 
                   if (isset($_SESSION['deleteSub'])) {
                    echo $_SESSION['deleteSub'];
                    unset($_SESSION['deleteSub']);
                   }
                ?>  

                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            <div class="mainBodyContentContainer">
                <div class="subscribers">
                    <table class="table">
                        <tr class="tblHeader">
                            <th>Subscriber ID</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM subscribers";
                            $res = mysqli_query($conn, $sql);
                            $tableID = 1;
                            if($res == TRUE){
                            $count = mysqli_num_rows($res);
                              if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $email = $row['email'];
                                    $date = $row['date'];
                                    
                                    ?>
                                    <tr class="tblRow orderRow">
                                        <td class="id"><p><?php echo $tableID++ ?></td>

                                        <td class="contact">
                                            <p><?php echo $email?></p>
                                        </td>
                
                                        <td class="date">            
                                            <p><?php echo $date ?></p>
                                        </td>

                                        <td class="action">
                                          <i class="uil uil-times-circle icon" title="Only Managers can delete!"></i> 
                                        </td>
                                    </tr>

                                    <?php 
                                    
                                  }
                              }
                              else{
                                echo '<span class="blank">No Subscribers yet!</span>';
                              }
                          }
                        ?>


                    </table>
                </div>
                
               
            </div>

         </div>
    </div>


<?php 
include('./adminPartials/adminFooter.php');
?>