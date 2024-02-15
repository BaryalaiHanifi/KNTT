<?php include('./config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Food-Step</title>
	<link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body style="background-color:#f5f5dc">
 <header
       style="background-image:
       linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
       url(images/mission-1.jpeg);
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
        <p>How to</p>
        <img src="images/chefss.jpeg"><span style="font-size:180px; ">Make it!</span>
       </div>
    </header>
    <?php  
    //check whether recipe is set or not
    if (isset($_GET['recipe_id'])){
	//get the recipe id and details of seleted recipe
	$recipe_id=$_GET['recipe_id'];
	//get the details of food
	$sql = "SELECT * FROM tbl_step WHERE foodrecipe_id = $recipe_id";
	//execute the query
	$result = mysqli_query($conn,$sql);
	//count rows
	$count = mysqli_num_rows($result);
	//check data is availabe or not
	if($count>0) {
		//we have data
		while($row = mysqli_fetch_assoc($result)){
		//now get food data
		$step = $row['step'];
		$image=$row['image'];
		?>
	    <div class="food-recipe">
	    <section id="make-recipe1">
	    <div id="text-recipe1">
	    <p><?php echo $step;?>
	    <?php 
	    //check whether image is available or not
	    //check whether image is availabe or not
	       if ($image=="") {
	                //display message
	                echo "<div class='error'>Image not availabe</div>";
	          }else{
	                  		//image is availabe
	          ?>
	          <img src="<?php echo SITEURL;?>images/step/<?php echo $image; ?>">
	          <?php
	                  	}
	        ?>
     
		</p>
	    </div>
	    </section>
        </div>
        <?php
		
	}
	}
	else{
		//we don't have data
		//redirect to
	    header('location:'.SITEURL.'recipe1.php');
	}

}else{
	//redirect to recipe page
	header('location:'.SITEURL.'recipe1.php');
}
?>
<div>
		    <div id="recipe1-img2">
					<img src="images/bruschetta3.jpeg">
		    </div>
		  
</div>


<?php include('./partiales-front/footer.php');?>