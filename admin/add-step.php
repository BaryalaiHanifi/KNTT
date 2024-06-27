<?php
	include('./partiales/menu.php');
?>
<div class="backend-main">
	 <div class="wrapper">
	    <h1>Documents Needed</h1>
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
                    <td>Food Title:</td>
                    <td>
                        <select name="food-title">
                        <?php 
                        //php codes to display categories from db
                        //1.write a query
                        $sql = "SELECT * FROM tbl_foodrecipe";
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
                            <option value="0">No available food found</option>
                            <?php

                        }    
                        ?>
                    
                        </select>

                    </td>
                </tr>
        		<tr>
        			<td>Step:</td>
        			<td>
        				<textarea class="form-control" type="text" name="step" placeholder=" Insert single step..." cols="10" rows="11">
        				</textarea>
        			</td>
        		</tr>

        		<tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
        		<tr>
        			<td>
        				<input type="submit" name="submit" class="form-control submit btn-secondary" value="Add Step">
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
        	$step = $_POST['step'];
            $foodrecipe_id = $_POST['food-title'];
        	//check whether the image is selected or not and set value for img name
            //print_r($_FILES['image']);
            //die();//break the code here
            if(isset($_FILES['image']['name'])){
                //upload the image
                //for uploading image name,source path and destination path
                $image = $_FILES['image']['name'];
                //upload image only if image is available
                if ($image!= "") {
                
                
                //auto rename image
                //get the extension of our image(jpg,png,gif,etc)e.g.food1.jpg
                $extension = end(explode('.',$image));
                //rename the image
                $image ="Food_Step_".rand(000,999).'.'.$extension;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path ="../images/step/".$image;
                //finally upload the image
                $upload = move_uploaded_file($source_path,$destination_path);
                //check the image is uploaded or not 
                //if the image not uploaded redirect with error message
                if ($upload==FALSE){
                    //set session message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image...</div>";
                    //redirect to add category page
                    header('location:'.SITEURL.'admin/add-step.php');
                    //stop the process
                    die();
                }
                }

            }else{
                //don't upload the image and set image name blank
                $image = "";
            }
        	//2.write query to insert category into the database
        	$sql = "INSERT INTO tbl_step SET
        	step ='$step',image='$image',foodrecipe_id=$foodrecipe_id";
        	//3.execute the query and save it into the database
        	$result = mysqli_query($conn,$sql);
        	//4.check query execution
        	if ($result==TRUE) {
        		//query executed successfully
        		$_SESSION['add'] = "<div class='success'>Step added successfully...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/manage-step.php');
        	}else{
        		//query failed
        		$_SESSION['add'] = "<div class='error'>Failed to add step...</div>";
        		//redirect to manage category
        		header('location:'.SITEURL.'admin/add-step.php');
        	}
        	
        }


         ?>
	   </div>
</div>




<?php
	include('./partiales/footer.php');
?>