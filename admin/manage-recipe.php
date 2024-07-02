<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	 <div class="wrapper">
	    <h1>Manage Documents</h1>
	   	<br><br>
	   	<?php
	   	if (isset($_SESSION['add'])) {
         	echo $_SESSION['add'];
         	unset($_SESSION['add']);
         }
         if (isset($_SESSION['upload'])) {
         	echo $_SESSION['upload'];
         	unset($_SESSION['upload']);
         }

	   	?>
	   	<br><br>
	   	<!-- add recipe -->
		     <a href="<?php echo SITEURL;?>admin/add-recipe.php" class="btn-primary">Add Recipe</a>
		     <br><br><br>
		     <table class="tbl-full">
		     	<tr>
		     		<th>S.N.</th>
		     		<th>Title</th>
		     		<th>Description</th>
		     		<th>Ingridients</th>
		     		<th>Actions</th>
		     	</tr>
		     	<?php 
		     	//query to get all recipes from database
		     		$sql="SELECT * FROM tbl_foodrecipe";
		     		//execute query
		     		$result=mysqli_query($conn,$sql);
		     		//count rows
		     		$count=mysqli_num_rows($result);
		     		//create serial number
		     		$sn=1;
		     		//check for data existence
		     		if($count>0){
		     			//we have data and get all of them
		     			while ($row = mysqli_fetch_assoc($result)) {
		     				$id = $row['id'];
		     				$title = $row['title'];
		     				$description = $row['description'];
		     				$ingridents = $row['ingridents'];
		    				?>
		     				<tr>
		     				<td><?php echo $sn++; ?>.</td>
		     				<td><?php echo $title;  ?></td>
		     				<td width="30%"><?php echo $description; ?></td>
		     				<td width="30%"><?php echo $ingridents;?></td>
		    				<td>
		     					<a href="#" class="btn-secondary">Update Recipe</a>
		     					<a href="#" class="btn-danger">Delete Recipe</a>
		     				</td>
		     			    </tr>
		     			    <?php
		     			}
		     		}else{
		     			//we don't have data in db
		     			//display message inside the table
		     			?><!--break the php-->
		     			<tr>
		     				<td colspan="6"><div class="error">No recipe added yet...</div></td>
		     			</tr>

		     			<?php
		     		}

		     	 ?>
		     </table>
		 </div>  
   </div>
<?php
	include('./partiales/footer.php');
?>