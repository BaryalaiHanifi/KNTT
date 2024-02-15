<?php include('./partiales-front/menu.php');  ?>
<?php include('./config/constants.php'); ?>
<br><br><br><br><br>
 <section>
    <div class="food">
    	<h1>Food Menu</h1>
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
    	 if ($count>0) {
    	 	//food availabe
    	 	while ($row = mysqli_fetch_assoc($result)) {

    	 		//get all values
    	 		$id = $row['id'];
    	 	    $title = $row['title'];
    	 		$description = $row['description'];
    	 		$image_name = $row['image_name'];
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
			    			<a href="<?php echo SITEURL;?>recipe1.php?food_id=<?php echo $id;?>">See Recipe</a>
			    </div>
			    </div>

    	 		<?php 
    	 	}
    	 }
    	 else
    	 { 
    	 	//else food is not available
    	 	echo "<div class='error' style ='color:white;'>Food is not found.</div>";
    	 }




    	?>
        <br><br>

    </div>

</section>
<?php include('./partiales-front/footer.php');  ?>