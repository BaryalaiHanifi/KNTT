<?php
     //include constant.php 
     include('../config/constants.php');
	//1.get the id of the admin to be deleted
	$id = $_GET['id'];
	//2.write sql query to delete the admin
	$sql = "DELETE FROM tbl_admin WHERE id=$id";
	//execute the query
	$result = mysqli_query($conn, $sql);
	//check query execution
	if($result == TRUE){
		//query executed successfuly
		//echo "admin deleted";
		//create session variable to display message
		$_SESSION['delete'] = "<div class = 'success'>Admin deleted successfuly...</div>";
		//redirect to manage admin page
		header('location:'.SITEURL.'admin/manage-admin.php');
	}
	else
	{
		//query failed
		//echo "failed deleted";
		$_SESSION['delete'] = "<div class = 'error'>Failed to delete admin...</div>";
		//3.redirect to manage admin page(success/error)
		header('location:'.SITEURL.'admin/manage-admin.php');
	}

	

?>