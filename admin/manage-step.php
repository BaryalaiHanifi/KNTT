<?php
	include('./partiales/menu.php');
?>
	<!--main section start-->
	<div class="backend-main">
		<div class="wrapper ">
		     <h1>Manage Step</h1>

		     <br><br>
		      <?php  
        	  if (isset($_SESSION['add'])) {
         	 		echo $_SESSION['add'];
         			unset($_SESSION['add']);
              }
              if (isset($_SESSION['remove'])) {
         			echo $_SESSION['remove'];
         			unset($_SESSION['remove']);
              }
              if (isset($_SESSION['delete'])) {
         			echo $_SESSION['delete'];
         			unset($_SESSION['delete']);
              }
              if (isset($_SESSION['no-step-found'])) {
         			echo $_SESSION['no-step-found'];
         			unset($_SESSION['no-step-found']);
              }
              if (isset($_SESSION['update'])) {
         			echo $_SESSION['update'];
         			unset($_SESSION['update']);
              }
              if (isset($_SESSION['upload'])) {
         			echo $_SESSION['upload'];
         			unset($_SESSION['upload']);
              }
              if (isset($_SESSION['failed-remove'])) {
         			echo $_SESSION['failed-remove'];
         			unset($_SESSION['failed-remove']);
              }
              ?>
              <br><br>
		     <!-- add admin -->
		     <a href="<?php echo SITEURL;?>admin/add-step.php" class="btn-primary">Add Step</a>
		     <br><br><br>
		     <table class="tbl-full">
		     	<tr>
		     		<th>S.N.</th>
		     		<th>Step</th>
		     		<th>Image</th>
		     		<th>Actions</th>
		     	</tr>
		     	<?php
		     		//query to get all categories from database
		     		$sql="SELECT * FROM tbl_step";
		     		//execute query
		     		$result=mysqli_query($conn,$sql);
		     		//count rows
		     		$count=mysqli_num_rows($result);
		     		//create serial number
		     		$sn=1;
		     		//check for data existence
		     		if($count>0){
		     			//we have data in db,get the data and display
		     			while ($row=mysqli_fetch_assoc($result)) {
		     				$id=$row['id'];
		     				$step=$row['step'];
		     				$image=$row['image'];
		     				?>
		     				<tr>
		     				<td><?php echo $sn++;?>.</td>
		     				<td width="50%"><?php echo $step;?></td>
		     				
		     				<td>
		     					<?php
		     					 //check image name is available or not
		     					if($image!=""){
		     						//display the image
		     						?>
		     						<img src="<?php echo SITEURL;?>images/step/<?php echo $image;?>" width="100px">
		     						<?php

		     					}else{
		     						//display the message
		     						echo "<div class='error'>Image not added</div>";

		     					}


		     					 ?>
		     				</td>
		     				<td>
		     					<a href="<?php echo SITEURL; ?>admin/update-step.php?id=<?php echo $id;?>&image=<?php echo $image;?>" class="btn-secondary">Update Step</a>
		     					<a href="<?php echo SITEURL; ?>admin/delete-step.php?id=<?php echo $id;?>&image=<?php echo $image;?>" class="btn-danger">Delete Step</a>
		     				</td>
		     				</tr>
		     

		     				<?php 
		     			}

		     		}else{
		     			//we don't have data in db
		     			//display message inside the table
		     			?><!--break the php-->
		     			<tr>
		     				<td colspan="6"><div class="error">No step added...</div></td>
		     			</tr>

		     			<?php
		     		}




		     	?>
		     	
		     	
		     		
		     </table>
		     
		    
		     
		   
	    </div> 
		
	</div>
	<!--main section end-->
	<?php
	include('./partiales/footer.php');
	?>