<?php include('./partiales-front/menu.php');  ?>
<?php include('./config/constants.php'); ?>

<div class="container-fluid" id="visa-types">
	<div class="row">
		<div class="col-md-12">
		  <hr>
		  <h3 style="text-align: center;">Result of Search</h3>
		  <hr>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row" style="display: flex;
	justify-content: center;
	align-items: center;">
		<?php
      //get search keyword 
	  $search = $_POST['search'];
	  //write sql query for search
	  $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '$search'";
	  //execute the query
	  $result = mysqli_query($conn,$sql);
	   //count rows
	  $count = mysqli_num_rows($result);
	  //check food is available or not
    	 if($count>0){
    	 	//food availabe
    	 	while ($row = mysqli_fetch_assoc($result)) {
    	 		//get all values
    	 		$id = $row['id'];
    	 		$title = $row['title'];
    	 		$description = $row['description'];
    	 		$image_name = $row['image_name'];
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
			    		    <h4><?php echo $title;?></h4>
			    			
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