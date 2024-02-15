<?php include('./config/constants.php'); ?>
<?php include('./partiales-front/menu.php');?>

	<br>
	<div id="recipes-01">
		<hr>
		<br>
	    <span>02</span>
        <strong>Our<br>Recipes</strong>
    </div>
    <br>
    <div id="recipes-02">
        	<img src="images/arrow.png">
        	<p>The best recipes all around the world from top ten ranked countries,incridible lean, hight in protein, and low in fat generic including all types of food appetizers, main courses, and desserts step by step cooking.</p>
    </div>

    </div>
	</header>
	<br>
	<hr>
	<br>
	<div class="recipes-arangment">

		<?php
		//create sql query to display categories from db
		$sql = "SELECT * FROM tbl_recipe ";
		//execute the query
		$result = mysqli_query($conn,$sql);
		//count rows for categories
		$count = mysqli_num_rows($result);
		if ($count>0) {
			//category availabe
			while ($row = mysqli_fetch_assoc($result)) {
				//get values like ,id,titlte,image name
				$id = $row['id'];
				$title = $row['title'];
				$image_name = $row['image_name'];
				?>
	            <a href="<?php echo SITEURL;?>category-food.php?category_id=<?php echo $id;?>">
				<div id="images-arangment">
	                  
	                  	<?php 
	                  	//check whether image is availabe or not
	                  	if ($image_name=="") {
	                  		//display message
	                  		echo "<div class='error'>Image not availabe</div>";
	                  	}else{
	                  		//image is availabe
	                  		?>
	                  		<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>">
	                  		<?php
	                  	}

	                  	 ?>
	                   <strong><?php echo $title;?></strong>
	            </div>

				<?php
			}
		}else{
			//category not availabe
			echo "<div class='error'>Category not added.</div>";	
		}

        ?>
    </div> 
</a>
    <br>
    <section>
    	
    <div class="food">
    	<h1>Food Menu</h1>
    	<div class="food-search">
    		
    		<form action="<?php echo SITEURL;?>food-search.php" method="POST">
    			<input id="search-text" type="search" name="search" placeholder="Search for food..."Required>
    			<input  type="submit" name="submit" value="Search" id="search-btn">
    		</form>
        </div>
    	
    	<?php
         //getting food from database that are featured
    	 //write sql code to retrieve data
    	 $sql2 = "SELECT * FROM tbl_food WHERE featured = 'Yes' LIMIT 3";
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
			    	<div class="food-menu-box test">
			    		<div class="food-menu-img">
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
			    			
			    			<p class="food-detail"><?php echo $description;  ?></p>
			    			<br>
			    			<a href="<?php echo SITEURL;?>recipe1.php?food_id=<?php echo $id;?>" class="form-control reset">See Recipe</a>
			    	</div>
			    			
			    	</div>
			        <br>
			    	

    	 		<?php
    	 		
    	 	}
    	 }else{
    	 	//food is not available
    	 	echo "<div class='error'>Food is not availabe.</div>";
    	 }

         ?>
         </div>
   </section>

    <?php include('./partiales-front/footer.php');  ?>