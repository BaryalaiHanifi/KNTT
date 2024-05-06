<?php include('./config/constants.php'); ?>
<?php include('./partiales-front/menu.php');?>

<div class="container-fluid" style="background-color:white;font-family:'Times New Roman', Times, serif;color: #043927" id="main-header-01">
<div class="row">
	<div class="col-md-6" style="margin-top:100px;" id="vertical-line">
	<span>03</span>
	<p>Discoverd effortless recipes was born to define global
	best recipes for it's paticipants from a simple desire to
	use what is on our plates to make positive change for our
	environment,health & communites.</p>
	</div>
	<div class="col-md-6" style="margin-top:86px;" id="mission-01">
	<hr>
	<strong>Our<br>Visas</strong>
	<img src="images/arrow.png" class="img-fluid">
	</div>
</div>
<hr>
</div>

<!--end of block-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
</div>

	<div class="container-fluid" id="recipes-arangment">
		<div class="row">
			<div class="col-md-4" style="display: flex;">
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
	           
				<div id="images-arangment">
				<a style="text-decoration: none;" href="<?php echo SITEURL;?>category-food.php?category_id=<?php echo $id;?>">
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
	                   <strong><?php echo $title;?></strong> </a>
	            </div> 

				<?php
			}
		}else{
			//category not availabe
			echo "<div class='error'>Category not added.</div>";	
		}

        ?>
		</div>   
    </div> 
</div> 
	<!--end of visa Categories-->
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