<?php include('partiales/menu.php');  ?>

<div class="backend-main">
	 <div class="wrapper">
	 	<h1>Update Category</h1>
	 	<?php
	 	//check whether the id is set or not 
	 	if (isset($_GET['id'])){
	 		//get all details
	 		$id = $_GET['id'];
	 		//write the query for update
	 		$sql="SELECT * FROM tbl_recipe WHERE id=$id";
	 		//execute query
	 		$result = mysqli_query($conn,$sql);
	 		//count the rows to check if id is valid
	 		$count = mysqli_num_rows($result);
	 		if ($count==1) {
	 			//get all data
	 			$row = mysqli_fetch_assoc($result);
	 			$title = $row['title'];
	 			$current_image = $row['image_name'];
	 			$featured = $row['featured'];


	 		}else{
	 			//redirect to manage category page
	 			$_SESSION['no-category-found']="<div class='error'>Category not found...</div>";
	 			header('location:'.SITEURL.'admin/manage-categories.php');

	 		}

	 	}else{
	 		//redirect to manage category page
	 		header('location:'.SITEURL.'admin/manage-categories.php');

	 	}



	 	?>
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
        			<td>Current Image:</td>
        			<td>
        				<?php

        				if($current_image != ""){
        					//display the image
        					?>
        					<img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="100px">
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
        			<td>Featured:</td>
        			<td>
        		    Yes<input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">
        			No<input <?php if($featured=="No"){echo "checked";} ?>  type="radio" name="featured" value="No">

        			<td>
        		</tr>
        		<tr>
        			<td>
        				<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        				<input type="hidden" name="id" value="<?php echo $id; ?>">
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Update Category">
        			</td>
        		</tr>

        		
        	</table>
        </form>
        <!--update form end-->
        <?php
        if (isset($_POST['submit'])) {
        	//get all values from form
        	$id = $_POST['id'];
        	$title = $_POST['title'];
        	$current_image = $_POST['current_image'];
        	$featured = $_POST['featured'];
        	//updating the new image if selected
        	//check whether the image is selected or not
        	if (isset($_FILES['image']['name'])) {
        		//get the image details
        		$image_name = $_FILES['image']['name'];
        		if ($image_name != "") {
        			//image is available
        			//A.upload new image

                //auto rename image
                //get the extension of our image(jpg,png,gif,etc)e.g.food1.jpg
                $extension = end(explode('.',$image_name));
                //rename the image
                $image_name="Food_Category_".rand(000,999).'.'.$extension;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path ="../images/category/".$image_name;
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
        		//B.remove the current image if availabe
                  if($current_image != "")
                  {
                	$remove_path = "../images/category/".$current_image;
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
        	}else{
        		$image_name = $current_image;
        	}

        	//write query for update
        	$sql2 = "UPDATE tbl_recipe SET
        	title='$title',
        	image_name='$image_name',
        	featured='$featured' WHERE id=$id";
        	//execute above query
        	$result2 = mysqli_query($conn,$sql2);
        	//redirect to manage category
        	//check whether the qury is executed or not
        	if ($result2==TRUE) {
        		//set session
        		$_SESSION['update'] = "<div class='success'>Category updated successfully...</div>";
        		header('location:'.SITEURL.'admin/manage-categories.php');

        	}else{
        		$_SESSION['update'] = "<div class='error'>Failed to update category...</div>";
        		header('location:'.SITEURL.'admin/manage-categories.php');

        	}



        }


        ?>

	 </div>
</div>



<?php include('partiales/footer.php');  ?>