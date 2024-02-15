	<?php
	include('./partiales/menu.php');
	 ?>
	<!--main section start-->
	<div class="backend-main">
		<div class="wrapper ">
		     <h1>DASHBOARD</h1>
		     <br><br>
		     <?php
				if (isset($_SESSION['login'])){
				echo $_SESSION['login'];
				unset($_SESSION['login']);
				}
		
				?>
			<br><br>
		     <div class="col-4 text-center">
		     	<h1>3</h1>
		     	<br>
		     	Categories
		     </div>
		     <div class="col-4 text-center">
		     	<h1>3</h1>
		     	<br>
		     	Categories
		     </div>
		     <div class="col-4 text-center">
		     	<h1>3</h1>
		     	<br>
		     	Categories
		     </div>
		     <div class="col-4 text-center">
		     	<h1>3</h1>
		     	<br>
		     	Categories
		     </div>
		     <div class="clearfix"></div>
	    </div> 
		
	</div>
	<!--man section end-->
	<?php
	include('./partiales/footer.php');
	?>
	

