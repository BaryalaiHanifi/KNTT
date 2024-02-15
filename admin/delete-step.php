<?php 
  //includ constants file
  include('../config/constants.php');
 //check for id and image name 
 if (isset($_GET['id']) AND isset($_GET['image'])){
 	//get the value and delete
 	$id = $_GET['id'];
 	$image = $_GET['image'];
 	//remove the physical image file if availabe
 	if ($image != "") {
 	   //remove the image
 		$path = "../images/step/".$image;
 	   //remove the image
 		$remove = unlink($path);
 	   //if failed to remove the message 
 		if ($remove == FALSE) {
 			//set session image
 			$_SESSION['remove'] = "<div class='error'>Failed to remove the step image...</div>";
 			//redirect to manage step page
 			header('location:'.SITEURL.'admin/manage-step.php');
            //stop the process
            die();
 			
 		}
 	}
 	//delete data from database
 	//write sql query
 	$sql="DELETE FROM tbl_step WHERE id = $id";
 	//execute query
 	$result = mysqli_query($conn,$sql);
 	//check whether data is deleted from db or not
 	if ($result == TRUE) {
 	    //set session message
 	    $_SESSION['delete'] = "<div class='success'>Step deleted successfully...</div>";
 	    //redirect to manage category
 	    header('location:'.SITEURL.'admin/manage-step.php');
 	}else{
 		//set failed message
 		$_SESSION['delete'] = "<div class='error'>Failed to delete step...</div>";
 	    //redirect to manage category
 	    header('location:'.SITEURL.'admin/manage-step.php');
 	}
 }else{
 	//redirect to manage category
 	header('location:'.SITEURL.'admin/manage-step.php');

 }
?>