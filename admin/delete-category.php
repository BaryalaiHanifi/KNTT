<?php 
  //includ constants file
  include('../config/constants.php');
 //check for id and image name 
 if (isset($_GET['id']) AND isset($_GET['image_name'])){
 	//get the value and delete
 	$id = $_GET['id'];
 	$image_name = $_GET['image_name'];
 	//remove the physical image file if availabe
 	if ($image_name != "") {
 	   //remove the image
 		$path = "../images/category/".$image_name;
 	   //remove the image
 		$remove = unlink($path);
 	   //if failed to remove the message 
 		if ($remove == FALSE) {
 			//set session image
 			$_SESSION['remove'] = "<div class='error'>Failed to remove the category image...</div>";
 			//redirect to manage category page
 			header('location:'.SITEURL.'admin/manage-categories.php');
            //stop the process
            die();
 			
 		}
 	}
 	//delete data from database
 	//write sql query
 	$sql="DELETE FROM tbl_recipe WHERE id = $id";
 	//execute query
 	$result = mysqli_query($conn,$sql);
 	//check whether data is deleted from db or not
 	if ($result == TRUE) {
 	    //set session message
 	    $_SESSION['delete'] = "<div class='success'>Category deleted successfully...</div>";
 	    //redirect to manage category
 	    header('location:'.SITEURL.'admin/manage-categories.php');
 	}else{
 		//set failed message
 		$_SESSION['delete'] = "<div class='error'>Failed to delete category...</div>";
 	    //redirect to manage category
 	    header('location:'.SITEURL.'admin/manage-categories.php');
 	}
 }else{
 	//redirect to manage category
 	header('location:'.SITEURL.'admin/manage-categories.php');

 }
?>