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
                    <span><strong>Customer Reviews</strong> Page</span>
                </div>

                
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            <div class="mainBodyContentContainer">
                <div class="reviews flex">

                <?php 
                        $sql = "SELECT * FROM reviews";
                        $res = mysqli_query($conn, $sql);
                          if($res == TRUE){
                            $count = mysqli_num_rows($res);
                                if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $reviewer = $row['reviewer'];
                                    $note = $row['note'];
                                    $date = $row['date'];
                                    ?>
                                      <div class="singleReview"> 
                                        <span class="name" style="text-transform:capitalize"><?php echo $reviewer?></span>
                                        <p><?php echo $note?></p>
                                        <i class='bx bxs-quote-alt-right quoteIcon' ></i>
                                        <span class="dateDiv flex">
                                            <span class="date">
                                            <?php echo $date?>
                                            </span>

                                            <div class="stars flex">
                                              <i class='bx bxs-star icon'></i>
                                              <i class='bx bxs-star icon'></i>
                                              <i class='bx bxs-star icon'></i>
                                              <i class='bx bxs-star icon'></i>
                                              <i class='bx bxs-star-half icon' ></i>
                                          </div>
                                        </span>
                                      </div>
                                    <?php 
                                  }
                                }

                              else{
                                echo '<span class="blank">No customer reviews yet!</span>';
                              }
                          }
                      ?>
                </div>
            </div>

         </div>
    </div>
<?php 
include('./adminPartials/adminFooter.php');
?>