<?php
    include('./partiales/menu.php');
?>
<script type="text/javascript">
        function warning(){
         var r=confirm("Are you sure!");
        }
</script>
<div class="backend-main">
			<div class="wrapper ">
			     <h1>Change Password</h1>
			     <?php
			     if (isset($_GET['id'])) {
			     	$id = $_GET['id'];
			     }

			     ?>
			     <div class="contact-form">
			     <form id="contact-form" method="post" action="">
			     	<input type="password" name="current_password" class="form-control" placeholder="Your current password..." required>
                    <br>
                    <input type="password" name="new_password" class="form-control" placeholder="Your new password..." required>
                    <br>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password..." required>
                    <br>
                    <input type="hidden" name="id" class="form-control"  value="<?php echo $id;?>">
                    <br>
                    <input type="submit" name="submit" class="form-control submit" value="Change Password" onclick="warning();" >
                    <br>
                    <input type="reset" name= "reset"  value= "RESET" class="form-control reset" onclick="warning();" >
                    <br> 

			     </form>
			 </div>
	    </div> 
	</div>
<?php
	//check the submit button is clicked or not
    if (isset($_POST['submit'])) 
    {
    	//echo "Clicked";
    	//1.get the form data
    	 $id = $_POST['id'];
    	 $current_password =md5($_POST['current_password']);
    	 $new_password = md5($_POST['new_password']);
    	 $confirm_password = md5($_POST['confirm_password']);
    	//2.check whether the current user and password is available or not
    	 $sql = "SELECT * FROM tbl_admin
    	        WHERE id=$id AND
    	        password='$current_password'";
    	//execute query
    	 $result = mysqli_query($conn,$sql);
    	 if($result == TRUE)
    	 {
    	 	//check data existence
    		$count = mysqli_num_rows($result);
    		if($count==1)
    		{
    			//user exists and password can be change
    			//echo "User found...";
    			//check the new password and confirm password match or not
    			if ($new_password == $confirm_password)
    			{
    				//update password
    				//write query
    				$sql2 = "UPDATE tbl_admin SET password='$new_password'
    				WHERE id=$id";
    				//execute the query
    				$result2 = mysqli_query($conn,$sql2);
    				//check whether the query executed or not
    				if ($result2==TRUE)
    				{
    					//display successfull message
    					$_SESSION['password-changed'] = "<div
    					 class ='success'>Password changed successfully...</div>";
    			        //redirect to manage admin page
     	                header('location:'.SITEURL.'admin/manage-admin.php');

    				}else{
    					//display error message
    					$_SESSION['password-changed'] = "<div class = 'error'>Failed to change password...</div>";
    			       //redirect to manage admin page
     	               header('location:'.SITEURL.'admin/manage-admin.php');

    				}
    			}else{
    				//redirect to manage admin page with error message
    				$_SESSION['password-not-match']="<div class='error'>Password did not match...</div>";
    			    //redirect to manage admin page
    			    header('location:'.SITEURL.'admin/manage-admin.php');
    			}
    		}else{
    			//user doesn't exist set message and redirect 
    			$_SESSION['user-not-found']="<div class='error'>User not found...</div>";
    			//redirect to manage admin page
    			header('location:'.SITEURL.'admin/manage-admin.php');

    		}

    	 }

    }
    
    
?>
<?php
	include('./partiales/footer.php');
?>