<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	<div class="wrapper ">
		<h1>Update Admin</h1>
		<?php 
		 //1.get the id of selected admin
		 $id = $_GET['id'];
		 //2.write the query of update
		 $sql = "SELECT * FROM tbl_admin WHERE id = $id";
		 //execute the query
		 $result = mysqli_query($conn,$sql);
		 //check query execution
		 if($result == TRUE){
		 	//check for data
		 	$count = mysqli_num_rows($result);
		 	//check whether we have admin data or not
		 	if($count == 1){
		 		//get the details
		 		//echo "Admin available...";
		 		$row = mysqli_fetch_assoc($result);

		 		$full_name = $row['full_name'];
		 		$username = $row['username'];
		 	}
		 	else
		 	{
		 		//redirect to manage admin page
		 		header('location:'.SITEURL.'admin/manage-admin.php');

		 	}
		 }
		 


		?>
		<div class="contact-form">
        <form id="contact-form" method="post" action="">
            <input type="text" name="full_name" class="form-control" value="<?php echo $full_name;?>" required>
            <br>
            <input type="text" name="username" class="form-control"  value="<?php echo $username;?>"  required>
            <br>
            <input type="hidden" name="id" class="form-control"  value="<?php echo $id;?>">
            <br>
            <input type="submit" name="submit" class="form-control submit" value="Update Admin" onclick="warning();" 
            ><br>
            <input type="reset" name= "reset"  value= "RESET" class="form-control reset" onclick="warning();" ><br> 
            </form>
       </div>

	</div>
</div>	

<?php
   if(isset($_POST['submit'])){
	//echo "Button Clicked";
	//get all values from form to be updated
	 $id = $_POST['id'];
	 $full_name = $_POST['full_name'];
     $username = $_POST['username'];
    //create sql query for update
     $sql2 = "UPDATE tbl_admin SET
     full_name = '$full_name',
     username = '$username'
     WHERE id = '$id'";
    //execute the query
     $result2 = mysqli_query($conn,$sql2);
    //check query run or not
     if($result2 == TRUE){
     	//session
     	$_SESSION['update'] = "<div class = 'success'>Admin updated successfully...</div>";
     	//redirect to manage admin page
     	header('location:'.SITEURL.'admin/manage-admin.php');


     }
     else
     {	//failed the query
     	$_SESSION['update'] = "<div class = 'error'>Failed to update admin...</div>";
     	//redirect to manage admin page
     	header('location:'.SITEURL.'admin/manage-admin.php');


     }
   }
?>


<?php
	include('./partiales/footer.php');
?>