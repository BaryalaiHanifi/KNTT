<?php include('partiales/menu.php');  ?>
<?php
//check whether id is set or not
 	if (isset($_GET['id'])) {
 		//get all the details
 		$id = $_GET['id'];
 		//write query for selected food
 		$sql2 = "SELECT * FROM tbl_food WHERE id = $id";
 		//execute query
 		$result2 = mysqli_query($conn,$sql2);
 		//get the value based on query execution
 		$row2 = mysqli_fetch_assoc($result2);
 		//get individual values
 		$id = $row2['id'];
 		$title = $row2['title'];
 		$description = $row2['description'];
 		$current_image = $row2['image_name'];
 		$current_category = $row2['recipe_id'];
 		$featured = $row2['featured'];
 	}else{

 		//redirect to manage food
 		header('location:'.SITEURL.'admin/manage-food.php');


 	}




?>
<div class="backend-main">
	 <div class="wrapper">
	 	<h1>Update Food</h1>
	 	  <!--update form start-->
	    <form method="post" action="" enctype="multipart/form-data">
        	<table class="tbl-30">
        		<tr>
        			<td>Title:</td>
        			<td>
        				<input class="form-control" type="text" name="title" value="<?php echo $title;  ?>">
        			</td>
        		</tr>
        		<tr>
        			<td>Description:</td>
        			<td>
        				<textarea class="form-control" name="description" cols="30" rows="5"><?php echo $description;  ?></textarea>
        			</td>
        		</tr>
        		<tr>
        			<td>Current Image:</td>
        			<td>
        				<?php

        				if($current_image != ""){
        					//display the image
        					?>
        					<img src="<?php echo SITEURL;?>images/food/<?php echo $current_image; ?>" width="100px">
        					<?php
        				}else{
        					echo "<div class='error'>Image not added</div>";

        				}
        				?>
        			</td>
        		</tr>

        		<tr>
                    <td>New Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                    	<select name="category">
                    		<?php
                    		//query to get featured categories
                    		$sql = "SELECT * FROM tbl_recipe WHERE featured = 'Yes'";
                    		//execute the query
                    		$result = mysqli_query($conn,$sql);
                    		//counnt rows
                    		$count = mysqli_num_rows($result);
                    		//check whether category is available or not
                    		if ($count>0) {
                    			//category availabe
                    			while ($row = mysqli_fetch_assoc($result)) {
                    			    $category_title = $row['title'];
                    			    $category_id = $row['id'];

            // echo "<option value='$category_id'>$category_title</option>";
                    		     ?>
                    		     <option <?php if($current_category==$category_id){echo "selected";}?>
                    		     value="<?php echo $category_id;?>"
                    		      
                    		      ><?php echo $category_title; ?></option>

                    		     <?php	           
                    			}

                    		}else{
                    			//category is not availabe
                    			echo "<option value = '0'>Category not available</option";
                    		}
                            ?>
                     	</select>
                    </td>
                </tr>
        		<tr>
        			<td>Featured:</td>
        			<td>
        		    Yes<input <?php if($featured=="Yes"){echo "checked";} ?>  type="radio" name="featured" value="Yes">
        			No<input <?php if($featured=="No"){echo "checked";} ?>   type="radio" name="featured" value="No">

        			<td>
        		</tr>
        		<tr>
        			<td>
        				<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        				<input type="hidden" name="id" value="<?php echo $id; ?>">
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Update Food">
        			</td>
        		</tr>

        		
        	</table>
        </form>
        <!--update form end-->
        <?php
        if (isset($_POST['submit'])){
        	//1.get all values from form
        	$id = $_POST['id'];
        	$title = $_POST['title'];
        	$description = $_POST['description'];
        	$current_image = $_POST['current_image'];
        	$category = $_POST['category'];
        	$featured = $_POST['featured'];
        	//2.upload the image if selecte
        	//check whether the image is selected or not
        	if (isset($_FILES['image']['name'])){
        		//upload button clicked
        		//get the image details
        		$image_name = $_FILES['image']['name'];
        		if ($image_name != ""){
        			//image is available
        			//A.upload new image

        		//auto rename image
                //get the extension of our image(jpg,png,gif,etc)e.g.food1.jpg
                $extension = end(explode('.',$image_name));
                //rename the image
                $image_name="Food_Name_".rand(0000,9999).'.'.$extension;
                //get source and destination path
                $source_path = $_FILES['image']['tmp_name'];

                $destination_path ="../images/food/".$image_name;
                //finally upload the image
                $upload = move_uploaded_file($source_path,$destination_path);
                //check the image is uploaded or not 
                //if the image not uploaded redirect with error message
                if ($upload==FALSE){
                    //set session message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image...</div>";
                    //redirect to add category page
                    header('location:'.SITEURL.'admin/add-category.php');
                    //stop the process
                    die();
                }
                //3.remove the image if new image is uploaded and current image exist

                //B.remove the current image if availabe
                if($current_image != ""){

                	$remove_path = "../images/food/".$current_image;
                	$remove = unlink($remove_path);
                	//check whether the image is removed or not
                	if ($remove==FALSE){
                		//failed to remove the image
                		$_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image...</div>";
        		        header('location:'.SITEURL.'admin/manage-categories.php');
        		        die();//stop the process

                	}
                }
        		
        		}else{
                    $image_name = $current_image;
                }

        	}
        	else
        	{
        		$image_name = $current_image;
        	}

        	
        	//4.upload the food in database
        	//write sql query for update
        	$sql3 ="UPDATE tbl_food SET
        	title = '$title',
        	description = '$description',
        	image_name = '$image_name',
        	recipe_id = 'category',
        	featured = '$featured'
        	WHERE id = $id";
        	//execute the query
        	$resutl3 = mysqli_query($conn,$sql3);
        	//check for query execution
        	if ($resutl3==true){
        	    //query executed and food updated
        	    $_SESSION['update']="<div class='success'>Food updated successfully...</div>";
        	    header('location:'.SITEURL.'admin/manage-food.php');
        	}else{
        		//failed to update food
        		 $_SESSION['update']="<div class='error'>Failed to update food...</div>";
        	    header('location:'.SITEURL.'admin/manage-food.php');

        	}

        	

        }



        ?>
	 </div>
</div>

<?php include('partiales/footer.php');  ?>