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
<br><br><br><br><br>
<section>
    <div class="food">
    	<h1>Foods on "<?php echo $category_title;?>"</h1>
    	<?php
    		//create query the get food based on selected category
    	    $sql2 = "SELECT * FROM tbl_food WHERE recipe_id = $category_id";
    	    //execute the query
    	    $result2 = mysqli_query($conn,$sql2);
    	    //count the row
    	    $count2 = mysqli_num_rows($result2);
    	    //check whether food on category is availabe or not
    	    if ($count2>0) {
    	    	while($row2=mysqli_fetch_assoc($result2)){
    	    	$title = $row2['title'];
    	 		$description = $row2['description'];
    	 		$image_name = $row2['image_name'];
    	 		?>
    	 		<div class="food-menu-box">
			    		<div class="food-menu-img">
			    			<?php
			    			//check image is available or not
			    			if ($image_name=="") {
			    				//image is not availabe
			    				echo "<div class='error'>Image is not availabe.</div>";
			    			}else
			    			{
			    				//image is availabe
			    				?>

			    				<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>">
			    				<?php
			    			}
			    			?>
			    		</div>
			    <div class="food-menu-desc">
			    			<h4> <?php echo $title;  ?></h4>
			            	<p class="food-detail"><?php echo $description;  ?></p>
			    			<br>
			    			<a href="#">See Recipe</a>
			    </div>
			    </div>

    	 		<?php

    	 	}
    	    }else{

    	    	echo "<div class='error' style='color:white;'>Food is not availabe.</div>";

    	    }
        ?>
        <br><br>
    </div>
</section>
<?php include('./partiales-front/footer.php');  ?>