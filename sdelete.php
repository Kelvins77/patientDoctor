<?php 
include('config.php');
$id = $_GET['specialist_id'];
//create query 
$sql = "DELETE FROM tbl_specialis WHERE specialist_id = $id";
//execute query
$res = mysqli_query($conn,$sql);
//chack whether the 	uery executed successfully
if ($res==TRUE) {
    // echo "Specialist deleted successfully";
    // create a session variable to display message
       header('Location: clindash.php');
 } else{
 	// echo "Deletion of Specialist failed";
 	 header('Location: clindash.php');
 	 exit();

 }

?>