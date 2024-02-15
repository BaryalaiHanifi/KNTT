<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	<div class="wrapper ">
		<h1>Update User</h1>
		<?php
		if (isset($_GET['id'])) {
			//get the user details
			//1.get the id of selected user
		 	$id = $_GET['id'];
		 	//2.write the query of update
			$sql = "SELECT * FROM tbl_user WHERE id = $id";
			//execute the query
		 	$result = mysqli_query($conn,$sql);
		 	//count row
		 	$count = mysqli_num_rows($result);
		 	if ($count==1) {
		 		//details available
		 		$row = mysqli_fetch_assoc($result);
		 		//now get all details from db
		 		$user_name = $row['user_name'];
		 		$email = $row['user_email'];
		 		$message = $row['message'];

		 	}else{
		 		//details not available and redirect
		 		header('location:'.SITEURL.'admin/contact.php');
		 	}
		}
		else
		{
			//redirect to contact.php
			header('location:'.SITEURL.'admin/contact.php');
		}
		 
		 
		 
		 //check query execution



		?>
		<div class="contact-form">
        <form id="contact-form" method="post" action="">
            <input type="text" name="user_name" class="form-control" value="<?php echo $user_name;?>">
            <br>
            <input type="text" name="user_email" class="form-control"  value="<?php echo $email;?>">
            <br>
            <input type="hidden" name="id" class="form-control"  value="<?php echo $id;?>">
            <br>
             <textarea name="message" class="form-control" value="<?php echo $message;  ?>" rows="4"></textarea><br>
            <input type="submit" name="submit" class="form-control submit" value="Update User" onclick="warning();" 
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
	 $user_name = $_POST['user_name'];
     $email = $_POST['user_email'];
	 $message = $_POST['message'];
    //create sql query for update
     $sql2 = "UPDATE tbl_user SET
     user_name = '$user_name',
     user_email= '$email',
     message = '$message'
     WHERE id = '$id'";
    //execute the query
     $result2 = mysqli_query($conn,$sql2);
    //check query run or not
     if($result2 == TRUE){
     	//session
     	$_SESSION['update'] = "<div class = 'success'>User updated successfully...</div>";
     	//redirect to manage admin page
     	header('location:'.SITEURL.'admin/contact.php');


     }
     else
     {	//failed the query
     	$_SESSION['update'] = "<div class = 'error'>Failed to update user...</div>";
     	//redirect to manage admin page
     	header('location:'.SITEURL.'admin/contact.php');


     }
   }
?>

<?php
	include('./partiales/footer.php');
?>