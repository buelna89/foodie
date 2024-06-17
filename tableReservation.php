<?php 
include('clientPartials/clientHeader.php');
ob_start();
?>

    <!-- Table Section -->
    <section class="container section tableReservationPage">
    <div class="secContent">
        <div class="sectionIntro">
            <h1 class="secTitle">Table Reservation</h1>
            <p class="subTitle">Welcome to our chefs' listing.</p>

            <img src="./Assests/titleDesign.png" alt="Design Image">
        </div>

        <div class="tabelReservation grid">
            <div class="imgDiv flex">
                <h3>Hey, we have a table for you!</h3>
                <p class="description">Let us prepare for your family and friends!</p>
            </div>
            <div class="formDiv">
                <form action="" method="POST">
                    <div class="formRow">
                    <label for="name">First Name</label>
                    <input type="text" name="guestName" id="name" placeholder="Enter your first name" required>
                    </div>
                    <div class="formRow">
                    <label for="email">Email</label>
                    <input type="email" name="guestEmail" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="formRow">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="guestPhone" id="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="formRow">
                    <label for="tl">Number of people</label>
                    <input type="number" name="totalPeople" id="tl" value="1"  required>
                    </div>
                    <div class="formRow formRowFlex flex">
                    <div>
                    <label for="date_time">Date and time</label>
                    <input type="date" name="date" id="date"  required>
                    </div>
                    <div>
                    <label for="date_time">Date and time</label>
                    <input type="time" name="time" id="time"  required>
                    </div>
                    </div>
                    <div class="formRow">
                    <label for="message">Message</label>
                    <textarea name="guestMessage" id="message" placeholder="Leave us some message!"></textarea>
                    </div>
                    <div class="formRow"> 
                    <input type="hidden" name="status" value="booked">
                    <input type="submit" name="submit" value="Reserve It" class="submitBtn">
                    </div>
    
                </form>
                <div class="contactNumber">
                    <small>Or</small>
                    <span class="phoneNumber flex">
                        <i class='bx bxs-phone-call icon'></i>
                        +444 000 000 000
                    </span>
                    <p>Mobile service availble 24/7</p>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Table Section Ends -->

<?php 
include('clientPartials/clientFooter.php');
?>

<?php 
if(isset($_POST['submit'])){

  $guestName = $_POST['guestName'];
  $guestEmail = $_POST['guestEmail'];
  $guestPhone = $_POST['guestPhone'];
  $totalPeople = $_POST['totalPeople'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $status = $_POST['status'];
  $guestMessage = $_POST['guestMessage'];

  $sql = "INSERT INTO tablereservations SET
  guest_name = '$guestName',
  email = '$guestEmail',
  contact = '$guestPhone',
  people = '$totalPeople',
  date = '$date',
  time = '$time',
  status = '$status',
  message = '$guestMessage'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['TableReserved'] = '
        <div class="messageConatainerHome flex">
        <span class="messageCard">
            <img src="./Assests/checkIcon.png" class="checkIconHome">
            <small>Table Resereved successfully! <br>So glad to serve you!</small>
        <br><br>
        - Thank you! -

        </span>
    </div>';
    header('location:' .SITEURL);
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>