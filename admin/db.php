<?php 
include('./adminPartials/adminHeader.php');
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenu.php');
       ?>
        
         <div class="mainBody">
            <div class="topSection flex">
                <div class="title">
                    <span><strong>Delivery Boys</strong> Page</span>
                </div>

                <?php 
                  if(isset($_SESSION['addedDB'])){
                    echo $_SESSION['addedDB'];
                    unset ($_SESSION['addedDB']);
                  }
                  
                  if(isset($_SESSION['deleteDB'])){
                    echo $_SESSION['deleteDB'];
                    unset ($_SESSION['deleteDB']);
                  }

                  if(isset($_SESSION['dbUpdated'])){
                    echo $_SESSION['dbUpdated'];
                    unset ($_SESSION['dbUpdated']);
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Nationality</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM deliveryboys";
                            $res = mysqli_query($conn, $sql);
                            $tableID = 1;
                          if($res == TRUE){
                            $count = mysqli_num_rows($res);
                              if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $nationality = $row['nationality'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $db_image = $row['db_image'];

                                    ?>
                                        <tr class="tblRow orderRow">
                                            <td class="id"><?php echo $tableID++?></td>

                                            <td class="name">
                                                <p style="text-transform:capitalize"><?php echo $name?></p>
                                            </td>

                                            <td class="contact">
                                                <p><?php echo $phone?></p>
                                            </td>

                                            <td class="contact">
                                                <p><?php echo $email?></p>
                                            </td>
                    
                                            <td class="nationality">            
                                                <p style="text-transform:capitalize"><?php echo $nationality?></p>
                                            </td>

                                            <td class="action">
                                               <a href="<?php echo SITEURL?>admin/dbDetails.php?id=<?php echo $id?>">
                                                    <i class="uil uil-file-info-alt icon"></i>
                                                </a>
                                                <a href="<?php echo SITEURL?>admin/deletedb.php?id=<?php echo $id?>">
                                                    <i class="uil uil-times-circle icon"></i>
                                                </a>
                                                
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

 