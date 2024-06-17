<?php 

include('../config/config.php');

// get individual ID ====================>
$deleteDbBtn = $_GET['id'];

$sql = "DELETE FROM deliveryboys WHERE id= $deleteDbBtn";
$result = mysqli_query($conn, $sql);
if($result==TRUE){
    $_SESSION['deleteDB'] = '<span class="success">Delivery Boy deleted successfully!</span>';
    header('location:' .SITEURL. 'admin/db.php');
}
else{
    $_SESSION['deleteDB'] = '<span class="fail">Failed to delete Delivery Boy</span>';
    header('location:' .SITEURL. 'admin/db.php');
}

?>