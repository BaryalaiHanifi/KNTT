<?php
	include('./partiales/menu.php');
?>
<script type="text/javascript">
        function warning(){
         var r=confirm("Are you sure!");
        }
</script>
<div class="backend-main">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<?php
		     if(isset($_SESSION['add'])){
		     	echo $_SESSION['add'];//displaying session message
		     	unset($_SESSION['add']);//removing the session message
		     }
		?>
		<div class="contact-form">
        <form id="contact-form" method="post" action="">
            <input type="text" name="full_name" class="form-control" placeholder="Your name..." required>
            <br>
            <input type="text" name="username" class="form-control" placeholder="Your username..." required>
            <br>
             <input type="password" name="password" class="form-control" placeholder="Your password..." required>
            <br>
            <input type="submit" name="submit" class="form-control submit" value="Add Admin" onclick="warning();" 
            ><br>
            <input type="reset" name= "reset"  value= "RESET" class="form-control reset" onclick="warning();" ><br> 
            </form>
       </div>
	</div>
</div>
<?php
	include('./partiales/footer.php');
?>
<?php
    //Process the value from Form and save it in database
 	//check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
    	//button clicked
    	//echo "Button Clicked";
    	//1.get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password encryption with MD5 function
        //2.sql query to save the data into the database
        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password' ";
        //3.execute the query and save it into the database
        $result = mysqli_query($conn,$sql) or die(mysqli_error());
        //4.check whether the query is executed and data is inserted or not and display the approperiate message
        if($result == TRUE){
        	//echo "Data inserted";
        	//create a session variable to display message
        	$_SESSION['add'] = "<div class ='success'>Admin added successfully...</div>";
        	//redirect page to manage admin
        	header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
        	//echo "Failed";
        	//create a session variable to display message
        	$_SESSION['add'] = "<div class = 'error'>Failed to add admin...</div>";
        	//redirect page to manage admin
        	header("location:".SITEURL.'admin/add-admin.php');
        }       

    }
 

?>