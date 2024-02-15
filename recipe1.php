<?php include('./config/constants.php');?>
<?php
//check whether food is set or not
if (isset($_GET['food_id'])){
	//get the food id and details of seleted food
	$food_id=$_GET['food_id'];
	//get the details of food
	$sql = "SELECT * FROM tbl_food WHERE id = $food_id";
	//execute the query
	$result = mysqli_query($conn,$sql);
	//count rows
	$count = mysqli_num_rows($result);
	//check data is availabe or not
	 if($count == 1) {
		//we have data
		$row = mysqli_fetch_assoc($result);
		//now get food data
		$title = $row['title'];
		$image_name=$row['image_name'];
	}
	else{
		//we don't have data
		//redirect to
	    header('location:'.SITEURL.'recipes.php');
	}

}else{
	//redirect to recipe page
	header('location:'.SITEURL.'recipes.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body style="background-color:#f5f5dc" class="recipe-body">
      <header
       style="background-image:
       linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
       <?php
       if ($image_name=="") {
       	//image not availabe
       	echo "<div class='error'>Image not available.</div>";
       }else{
       	//image is available
       	?>
       	 url(<?php echo SITEURL;?>images/food/<?php echo $image_name;?>);
       	<?php

       }
       ?>
       height: 100vh;
       background-size: cover;
       background-position: center;
       color: white"" id="main-header-02">
       <div id="recipes-navbar">
        <a style="color: white;" href="menu.php">Menu</a>
	   </div>
	   <div style="color:grey" id="recipes-h3-h6-sty">
		   <h3>Discovered<br>
		   <p>Effortless Recipes</p></h3>
		   <br>
	   </div>
	   <div id="recipe-name">
	   	<p><?php echo $title;  ?></p>
	   </div>
</header>
<?php
//check whether food is set or not
if (isset($_GET['food_id'])){
	//get the food id and details of seleted food
	$food_id=$_GET['food_id'];
	//get the details of food
	$sql2 = "SELECT * FROM tbl_foodrecipe WHERE food_id = $food_id";
	//execute the query
	$result2 = mysqli_query($conn,$sql2);
	//count rows
	$count2 = mysqli_num_rows($result2);
	//check data is availabe or not
	 if($count2 == 1) {
		//we have data
		$row2 = mysqli_fetch_assoc($result2);
		//now get food data
		$recipe_id = $row2['id'];
		$title = $row2['title'];
		$description = $row2['description'];
		$ingridents = $row2['ingridents'];
		?>
		<section class="recipe-container">
		<div id="food-define">
			<div id="recipe1-left-border"></div>
			<p><?php echo $description;  ?></p>
			
			<span>
                <?php echo $ingridents;  ?>
			</span>

	 	</div>
     	</section>
        

	<div class="food-recipe">
		<hr>
		<section id="make-recipe1">
			<h2><a href="<?php echo SITEURL;?>step.php?recipe_id=<?php echo $recipe_id;?>" style="color:red;">How to make it ?!</a></h2>
            <div id="text-recipe1">
            </div>
		</section>
	</div>

<?php
	}
	else{
		//we don't have data
		//redirect to
	    header('location:'.SITEURL.'recipes.php');
	}

}else{
	//redirect to recipe page
	header('location:'.SITEURL.'recipes.php');
}
?>
<?php include('./partiales-front/footer.php');?>