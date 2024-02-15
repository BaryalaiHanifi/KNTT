<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	 <div class="wrapper">
	    <h1>Add Recipe</h1>
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
	    <!--recipe form start-->
	     <form method="post" action="" enctype="multipart/form-data">
        	<table class="tbl-30">
        		<tr>
        			<td>Title:</td>
        			<td>
        				<input class="form-control" type="text" name="title" placeholder="Recipe title...">
        			</td>
        		</tr>
        		<tr>
        			<td>Confirm Title:</td>
        			<td>
        				<select name="food">
        				<?php 
        				//php codes to display foods from db
        				//1.write a query
        				$sql = "SELECT * FROM tbl_food WHERE featured='Yes'";
        				$result = mysqli_query($conn,$sql);
        				$count = mysqli_num_rows($result);
        				if($count>0){
        					//we have category
        					while ($row = mysqli_fetch_assoc($result)) {
        						//get values from db
        						$id=$row['id'];
        						$title = $row['title'];
        						?>
        					    <option value="<?php echo $id;?>" >
        							<?php echo $title;?>
        						</option>	
        						<?php
        					}

        				}else{
        					//we don't have category
        					?>
        					<option value="0">No food found</option>
        					<?php

        				}	 
        				?>
        			
        				</select>

        			</td>
        		</tr>
        		<tr>
        			<td>Description:</td>
        			<td>
        				<input class="form-control" type="text" name="description" placeholder="Recipe description...">
        			</td>
        		</tr>
        		<tr>
        			<td>Ingridents:</td>
        			<td>
        				<input class="form-control" type="text" name="ingridents" placeholder="Recipe ingridents...">
        			</td>
        		</tr>
        		
                
        		<tr>
        			<td>
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Add Recipe">
        			</td>
        		</tr>

        		
        	</table>
        </form>
        <!--recipe form end-->
        <?php
        if(isset($_POST['submit'])) {
        	//echo "Clicked";
        	//1.get the values of form
        	$title = $_POST['title'];
      		$description = $_POST['description'];
       		$ingridents = $_POST['ingridents'];
       		
       		//2.write query to insert recipe into the database
       		$sql2 = "INSERT INTO tbl_foodrecipe SET
        	title ='$title',description='$description',ingridents='$ingridents',
        	food_id = $id";
        	//3.execute the query and save it into the database
        	$result2 = mysqli_query($conn,$sql2);
        	//4.check query execution
        	if ($result2==TRUE) {
        		//query executed successfully
        		$_SESSION['add'] = "<div class='success'>Recipe added successfully...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/manage-recipe.php');
        	}else{
        		//query failed
        		$_SESSION['add'] = "<div class='error'>Failed to add recipe...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/add-recipe.php');
        	}
       	
        	}


        ?>

   </div>
</div>
<?php
	include('./partiales/footer.php');
?>