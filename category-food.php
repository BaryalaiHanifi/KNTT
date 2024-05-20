<?php include('./partiales-front/menu.php');  ?>
<?php include('./config/constants.php'); ?>

<?php 
 //check whether id is passed or not
 if (isset($_GET['category_id'])){
 	//category id is set and get the id
 	$category_id = $_GET['category_id'];
 	//get title based on gategory id
 	$sql = "SELECT title FROM tbl_recipe WHERE id = $category_id";
 	//execute the query
 	$result = mysqli_query($conn,$sql);
 	//get the value from database
 	$row = mysqli_fetch_assoc($result);
 	//get the title
 	$category_title = $row['title'];

 }else{
 	//category id is not passed
 	//redierect to recipe page
 	header('location:'.SITEURL.'recipes.php');
 }

?>

<div class="container-fluid" id="visa-types">
	<div class="row">
		<div class="col-md-12">
		  <hr>
		  <h3 style="text-align: center;">Visas on "<?php echo $category_title;?>"</h3>
		  <hr>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row" style="display: flex;
	justify-content: center;
	align-items: center;">
		<?php
         //getting food from database that are featured
    	 //write sql code to retrieve data
		 $sql2 = "SELECT * FROM tbl_food WHERE recipe_id = $category_id";
    	 //execute the query
    	 $result2 = mysqli_query($conn,$sql2);
    	 //count row
    	 $count2 = mysqli_num_rows($result2);
    	 //check food is available or not
    	 if($count2>0){
    	 	//food availabe
    	 	while ($row2 = mysqli_fetch_assoc($result2)) {
    	 		//get all values
    	 		$id = $row2['id'];
    	 		$title = $row2['title'];
    	 		$description = $row2['description'];
    	 		$image_name = $row2['image_name'];
    	 		?>
			    
			    <div class="col-md-3" id="food-menu-box">
			    <?php

			    			//check image is available or not
			    			if ($image_name=="") {
			    				//image is not availabe
			    				echo "<div class='error'>Image is not availabe.</div>";
			    			}else{
			    				//image is availabe
			    				?>
			    				<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>">

			    				<?php

			    			} 
			    		    ?>
			    		    <h4><?php echo $title;  ?></h4>
			    			
			    			<p id="food-detail" style="width:100; height:100px"><?php echo $description;  ?></p>
			    			<a href="<?php echo SITEURL;?>recipe1.php?food_id=<?php echo $id;?>"  id="food-menu-desc">Full Information</a>
			    </div>

    	<?php
    	 		
    	 	}
    	 }else{
    	 	//food is not available
    	 	echo "<div class='error'>Visa is not availabe.</div>";
    	 }

         ?>
	</div>	
</div>
<?php include('./partiales-front/footer.php');  ?>