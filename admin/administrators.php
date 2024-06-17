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
                    <span><strong>Administrators</strong> Page</span>
                </div>

                <?php 
                  if(isset($_SESSION['addedAdmin'])){
                    echo $_SESSION['addedAdmin'];
                    unset ($_SESSION['addedAdmin']);
                  }
                  
                  if(isset($_SESSION['deleteAdmin'])){
                    echo $_SESSION['deleteAdmin'];
                    unset ($_SESSION['deleteAdmin']);
                  }

                  if(isset($_SESSION['adminUpdated'])){
                    echo $_SESSION['adminUpdated'];
                    unset ($_SESSION['adminUpdated']);
                  }
                ?>

                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            
            <div class="mainBodyContentContainer">

                     
                <div class="administrators">
                    <table class="table">
                        <tr class="tblHeader">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Nationality</th>
                            <th>User Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM admins";
                            $res = mysqli_query($conn, $sql);
                            $tableID = 1;
                          if($res == TRUE){
                            $count = mysqli_num_rows($res);
                              if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $nationality = $row['nationality'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $role = $row['role'];
                                    $admin_image = $row['admin_image'];

                                    ?>
                                        <tr class="tblRow orderRow">
                                            <td class="id"><?php echo $tableID++?></td>

                                            <td class="name">
                                                <p style="text-transform:capitalize"><?php echo $name?></p>
                                            </td>

                                            <td class="nationality">            
                                                <p style="text-transform:capitalize"><?php echo $nationality?></p>
                                            </td>

                                            <td class="userNamw">
                                                <p><?php echo $username?></p>
                                            </td>

                                            <td class="contact">
                                                <p><?php echo $phone?></p>
                                            </td>

                                            <td class="email">
                                                <p><?php echo $email?></p>
                                            </td>

                                            <td class="role">
                                                <p style="text-transform:capitalize"><?php echo $role?></p>
                                            </td>
                    
                                            <td class="action">
                                               <a href="<?php echo SITEURL?>admin/adminDetails.php?id=<?php echo $id?>">
                                                    <i class="uil uil-file-info-alt icon"></i>
                                                </a>
                                                <a href="<?php echo SITEURL?>admin/deleteAdmin.php?id=<?php echo $id?>">
                                                    <i class="uil uil-times-circle icon"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>

                                    <?php 
                                    
                                  }
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