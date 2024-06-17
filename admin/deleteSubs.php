<?php 

include('../config/config.php');

// get individual ID ====================>
$deleteDbBtn = $_GET['id'];

$sql = "DELETE FROM subscribers WHERE id= $deleteDbBtn";
$result = mysqli_query($conn, $sql);
if($result==TRUE){
    $_SESSION['deleteSub'] = '<span class="success">Subscriber deleted successfully!</span>';
    header('location:' .SITEURL. 'admin/subscribers.php');
}
else{
    $_SESSION['deleteSub'] = '<span class="fail">Failed to delete Delivery Boy</span>';
    header('location:' .SITEURL. 'admin/subscribers.php');
}

?>