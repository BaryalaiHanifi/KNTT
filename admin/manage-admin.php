<?php
    include('./partiales/menu.php');
?>
		<!--main section start-->
		<div class="backend-main">
			<div class="wrapper ">
			     <h1>Manage Admin</h1>
			     <br><br>
			     <?php
			     if(isset($_SESSION['add'])){
			     	echo $_SESSION['add'];//displaying session message
			     	unset($_SESSION['add']);//removing the session message
			     }
			     if(isset($_SESSION['delete'])){
			     	echo $_SESSION['delete'];
			     	unset($_SESSION['delete']);
			     }
			     if(isset($_SESSION['update'])){
			     	echo $_SESSION['update'];
			     	unset($_SESSION['update']);
			     }
			     if(isset($_SESSION['user-not-found'])){
			     	echo $_SESSION['user-not-found'];
			     	unset($_SESSION['user-not-found']);
			     }
			     if(isset($_SESSION['password-not-match'])){
			     	echo $_SESSION['password-not-match'];
			     	unset($_SESSION['password-not-match']);
			     }
			      if(isset($_SESSION['password-changed'])){
			     	echo $_SESSION['password-changed'];
			     	unset($_SESSION['password-changed']);
			     }
			      
			     ?>
			     
			     <!-- add admin -->
			     <a href="add-admin.php" class="btn-primary">Add Admin</a>
			     <br><br><br>
			     <table class="tbl-full">
			     	<tr>
			     		<th>S.N.</th>
			     		<th>Full Name</th>
			     		<th>Username</th>
			     		<th>Actions</th>
			     	</tr>
			     	<?php
			     	    //query to earn data from admin table
			     		$sql = "SELECT * FROM tbl_admin";
			     		//execute the query
			     		$result = mysqli_query($conn,$sql);
			     		//check whether the query is executed or not
			     		if($result == TRUE){
			     			//counting rows 
			     			$count = mysqli_num_rows($result);//function for count
			     			//check the number of rows
			     			$sn = 1;//variable for counting rows
			     			if($count>0){
			     				//we have data in database
			     				while ($row = mysqli_fetch_assoc($result)) {
			     					//get all data from database
			     					//get indivdual data from database
			     					$id = $row['id'];
			     					$full_name = $row['full_name'];
			     					$username = $row['username'];
			     					//display the values in our page
			     					?><!--break php-->
				     				<tr>
				     				<td><?php echo $sn++; ?>.</td>
				     				<td><?php echo $full_name;?></td>
				     				<td><?php echo $username; ?></td>
				     				<td>
				     			<a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
				     			<a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
				     			<a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
				     		        </td>
				     	            </tr>

			     					<?php

			     				}

			     			}
			     			else
			     			{
			     				//we don't have data in database

			     			}

			     		}
			     	?>
			     	
			     		
			     </table>
			     
			   
		    </div> 
			
		</div>
		<!--main section end-->
<?php
	include('./partiales/footer.php');
?>
		
