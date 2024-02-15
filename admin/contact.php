 <?php
	include('./partiales/menu.php');
?>
	<!--main section start-->
	<div class="backend-main">
		<div class="wrapper ">
		     <h1>Contact</h1>
		     <br><br>
		     <?php 
		     	if (isset($_SESSION['update'])) {
		     		echo $_SESSION['update'];
		     		unset($_SESSION['update']);
		     	}
		     ?>
		     <table class="tbl-full">
		     	<tr>
		     		<th>S.N.</th>
		     		<th>User_Name</th>
		     		<th>User_Email</th>
		     		<th>Message</th>
		     		<th>Actions</th>
		     	</tr>
		     	<?php
		     	//get all values of user from db
		     	$sql = "SELECT * FROM tbl_user ORDER BY id DESC";
		     	//run query
		     	$result = mysqli_query($conn,$sql);
		     	//count row 
		     	$count = mysqli_num_rows($result);
		     	//check for data existence
		     	$sn = 1;
		     	if($count>0){
		     		//user availabe
		     		///get user details
		     		while($row = mysqli_fetch_assoc($result)){
		     			
		     			$id = $row['id'];
		     			$user_name = $row['user_name'];
		     			$email = $row['user_email'];
		     			$message = $row['message'];
		     			?>
		     				<tr>
		     				<td><?php echo $sn++; ?>.</td>
		     				<td><?php echo $user_name;?></td>
		     				<td><?php echo $email; ?></td>
		     				<td><?php echo $message;?></td>
		     				<td>
		     				<a href="<?php echo SITEURL;?>admin/update-user.php?id=<?php echo $id;?>" class="btn-secondary">Update User</a>
		     	
		     	           	</td>
		        	        </tr>

		     			<?php
		     		}


		     	}else{
		     		//user not available
		     		echo "<div class='error'>User not available...</div>";

		     	}


		     	?>
		     	
		     	
		     		
		     </table>
		     
		    
		     
		   
	    </div> 
		
	</div>
	<!--main section end-->
	<?php
	include('./partiales/footer.php');
	?>