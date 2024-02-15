<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	 <div class="wrapper">
	    <h1>Add Category</h1>
	    <!--category form start-->
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
	    
        <form method="post" action="" enctype="multipart/form-data">
        	<table class="tbl-30">
        		<tr>
        			<td>Title:</td>
        			<td>
        				<input class="form-control" type="text" name="title" placeholder="Category title...">
        			</td>
        		</tr>

        		<tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image"></td>
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
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Add Category">
        			</td>
        		</tr>

        		
        	</table>
        </form>
        <!--category form end-->
        <?php 
         //check submit button
        if (isset($_POST['submit'])) {
        	//echo "Clicked";
        	//1.get the values of form
        	$title = $_POST['title'];
        	//for radio butto check whether the button is selected or not
        	if (isset($_POST['featured'])) {
        		//get the value from the form 
        		$featured = $_POST['featured'];
        	}else{
        		//set the default value
        		$featured = "No";
        	}
            //check whether the image is selected or not and set value for img name
            //print_r($_FILES['image']);
            //die();//break the code here
            if(isset($_FILES['image']['name'])){
                //upload the image
                //for uploading image name,source path and destination path
                $image_name = $_FILES['image']['name'];
                //upload image only if image is available
                if ($image_name != "") {
                
                
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
                }

            }else{
                //don't upload the image and set image name blank
                $image = "";
            }
        	//2.write query to insert category into the database
        	$sql = "INSERT INTO tbl_recipe SET
        	title ='$title',image_name='$image_name',featured='$featured'";
        	//3.execute the query and save it into the database
        	$result = mysqli_query($conn,$sql);
        	//4.check query execution
        	if ($result==TRUE) {
        		//query executed successfully
        		$_SESSION['add'] = "<div class='success'>Category added successfully...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/manage-categories.php');
        	}else{
        		//query failed
        		$_SESSION['add'] = "<div class='error'>Failed to add category...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/add-category.php');
        	}
        	
        }


         ?>
	   </div>
</div>




<?php
	include('./partiales/footer.php');
?>