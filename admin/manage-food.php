<?php
	include('./partiales/menu.php');
?>
	<!--main section start-->
	<div class="backend-main">
		<div class="wrapper ">
		     <h1>Manage Visa</h1>
		      <br><br>
		      <?php  
        	  if (isset($_SESSION['add'])) {
         	 		echo $_SESSION['add'];
         			unset($_SESSION['add']);
              }
              if (isset($_SESSION['unauthorized'])) {
         	 		echo $_SESSION['unauthorized'];
         			unset($_SESSION['unauthorized']);
              }
              if (isset($_SESSION['upload'])) {
         	 		echo $_SESSION['upload'];
         			unset($_SESSION['upload']);
              }
               if (isset($_SESSION['delete'])) {
         	 		echo $_SESSION['delete'];
         			unset($_SESSION['delete']);
              }
               if (isset($_SESSION['update'])) {
         	 		echo $_SESSION['update'];
         			unset($_SESSION['update']);
              }
              ?>
		     <!-- add admin -->
		     <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Visa</a>
		     <br><br><br>
		     <table class="tbl-full">
		     	<tr>
		     		<th>S.N.</th>
		     		<th>Title</th>
		     		<th>Description</th>
		     		<th>Image</th>
		     		<th>Feautured</th>
		     		<th>Actions</th>
		     	</tr>
		     	<?php
		     	//write query for it
		     	$sql = "SELECT * FROM tbl_food";
		     	//execute it
		     	$result = mysqli_query($conn,$sql);
		     	//count rows
		     	$count = mysqli_num_rows($result);
		     	$sn = 1;
		     	if ($count>0) {
		     		//we have data in db
		     		//get food from db and display
		     		while ($row = mysqli_fetch_assoc($result)) {
		     			$id = $row['id'];
		     			$title = $row['title'];
		     			$description = $row['description'];
		     			$image_name = $row['image_name'];
		     			$featured = $row['featured'];
		     			?>
		     			<tr>
		     			<td><?php echo $sn++;  ?></td>
		     			<td><?php echo $title;  ?></td>
		     			<td><?php echo $description;  ?></td>	
		     			<td>
		     				<?php
		     				//check for image
		     				if ($image_name == "") {
		     					echo "<div class = 'error'>Image not added yet.</div>";
		     					
		     				}else{
		     					//display the image
		     					?>
		     					<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;  ?>" width = "100px">


		     					<?php

		     				}

		     			  ?>
		     			 	
		     			 </td>
		     			<td><?php echo $featured;  ?></td>
		     			<td>
		     			<a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Update Food</a>
		     			<a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
		     		</td>
		     	</tr>



		     			<?php 
		     		}
		     	}else{
		     		//else we don't have data in db
		     		echo "<tr><td colspan = '7' class = 'error'>Food not added yet.</td></tr>";

		     	}
                ?>
		     	
		     	
		     		
		     </table>
		     
		     
		   
	    </div> 
		
	</div>
	<!--main section end-->
	<?php
	include('./partiales/footer.php');
	?>