<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	 <div class="wrapper">
	  <h1>Add Food</h1>
	    <?php
	    	if (isset($_SESSION['upload'])) {
         	 		echo $_SESSION['upload'];
         			unset($_SESSION['upload']);
                }
        ?>
	  <form method="post" action="" enctype="multipart/form-data">
        	<table class="tbl-30">
        		<tr>
        			<td>Title:</td>
        			<td>
        				<input class="form-control" type="text" name="title" placeholder="Food title...">
        			</td>
        		</tr>
        		<tr>
        			<td>Description:</td>
        			<td>
        				<textarea class="form-control" cols="30" rows="5" type="text" name="description" placeholder="Food description..."></textarea>
        			</td>
        		</tr>


        		<tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
        			<td>Category:</td>
        			<td>
        				<select name="category">
        				<?php 
        				//php codes to display categories from db
        				//1.write a query
        				$sql = "SELECT * FROM tbl_recipe WHERE featured='Yes'";
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
        							<?php echo $title; ?>
        						</option>

        						<?php
        					}

        				}else{
        					//we don't have category
        					?>
        					<option value="0">No category found</option>
        					<?php

        				}	 
        				?>
        			
        				</select>

        			</td>
        		</tr>
        		<tr>
        			<td>Featured:</td>
        			<td>
        		    Yes<input type="radio" name="featured" value="Yes">
        			No<input type="radio" name="featured" value="No">

        			</td>
        		</tr>
        		<tr>
        			<td>
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Add Food">
        			</td>
        		</tr>

        		
        	</table>
        </form>
        <!--food form ends-->
       <?php

	   if (isset($_POST['submit'])){
		//add the food into db
	    //1.get the form values

		$title = $_POST['title'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		//check radio button for featured
		if (isset($_POST['featured'])) {
			$featured = $_POST['featured'];
		}
		else
		{
			//default value to no
			$featured = "No";
		}
		//2.upload the iamge if selected
		 if(isset($_FILES['image']['name']))
		 {	//get the details of selected image
		 	$image_name = $_FILES['image']['name'];
		 	//second condition to check whether image is selected or not
		 	if ($image_name!="") {
		 		//image is selected
		 		//A.rename the image
		 		//get the extension of our image(jpg,png,gif,etc)e.g.food1.jpg
                $ext = end(explode('.',$image_name));
		 		
		 		 //rename the image
                $image_name="Food_Name_".rand(0000,9999).'.'.$ext;
		 		//B.upload the image
		 		//get the source and destination path
		 		$src = $_FILES['image']['tmp_name'];
		 		$dest ="../images/food/".$image_name;
		 		//finally upload the image
                $upload = move_uploaded_file($src,$dest);
                //check the image is uploaded or not 
                if ($upload==FALSE) {
                	//failed to upload image
                	//redirect to add food page
                	  $_SESSION['upload'] = "<div class='error'>Failed to upload image...</div>";
                	   header('location:'.SITEURL.'admin/add-food.php');
                	//stop the process
                	die();
                	
                }
		 		
		 	}
		 }
		 else
		 {
		 	$image_name = "";//set default image name as blank
		 }
		//3.insert into the database
		//write query to insert category into the database
		 $sql2 = "INSERT INTO tbl_food SET
        	title ='$title',
        	description = '$description',
        	image_name='$image_name',
        	recipe_id = $category,
        	featured='$featured'";
        //execute the query and save it into the database
          $result2 = mysqli_query($conn,$sql2);
          //check query execution
          if ($result2==TRUE) {
          //query executed successfully
        		$_SESSION['add'] = "<div class='success'>Food added successfully...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/manage-food.php');
          }
          else{
          	
        		//query failed
        		$_SESSION['add'] = "<div class='error'>Failed to add food...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/manage-food.php');

          }
		//4.redirect to manage food page




        }
         ?>
	 </div>
</div>

<?php
	include('./partiales/footer.php');
?>