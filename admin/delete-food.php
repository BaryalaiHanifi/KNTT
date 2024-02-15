<?php
  //includ constants file
  include('../config/constants.php');
  if (isset($_GET['id']) AND isset($_GET['image_name'])){
  		//process to delete
  		//1.get id and image name
  	    $id = $_GET['id'];
 	    $image_name = $_GET['image_name'];

  		//2.remove the image if available
  		//check if image is availabe or not and delete it
  		if ($image_name != "") {
 	   //remove the image
 		$path = "../images/food/".$image_name;
 	   //remove the image
 		$remove = unlink($path);
 	   //if failed to remove the message
 	   if ($remove == FALSE) {
 			//set session image
 			$_SESSION['upload'] = "<div class='error'>Failed to remove the food image...</div>";
 			//redirect to manage category page
 			header('location:'.SITEURL.'admin/manage-food.php');
            //stop the process
            die();
 			
 	     	} 
 	    }
        //3.delete image from db
        //write sql query
 	    $sql="DELETE FROM tbl_food WHERE id = $id";
 	    //execute query
 	    $result = mysqli_query($conn,$sql);
 	    //check whether data is deleted from db or not
 	    //4.reidrect to manage food page
 	    if ($result == TRUE) {
 	    //set session message
 	    $_SESSION['delete'] = "<div class='success'>Food deleted successfully...</div>";
 	    //redirect to manage category

 	    header('location:'.SITEURL.'admin/manage-food.php');
 	    }else{
 		//set failed message
 		$_SESSION['delete'] = "<div class='error'>Failed to delete food...</div>";
 	    //redirect to manage category
 	    header('location:'.SITEURL.'admin/manage-food.php');
 	    }

  		

  }
  else
  {
  		
  	//reidrect to manage food page
  		$_SESSION['unauthorized'] = "<div class = 'error'>Unauthorized access...</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
  }






?>