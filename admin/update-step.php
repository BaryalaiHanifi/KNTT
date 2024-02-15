<?php include('partiales/menu.php');  ?>
<div class="backend-main">
<div class="wrapper">
<h1>Update Step</h1>
<?php
//check whether the id is set or not 
if (isset($_GET['id'])){
//get all details
$id = $_GET['id'];
//write the query for update
$sql="SELECT * FROM tbl_step WHERE id=$id";
//execute query
$result = mysqli_query($conn,$sql);
//count the rows to check if id is valid
$count = mysqli_num_rows($result);
if ($count==1) {
//get all data
$row = mysqli_fetch_assoc($result);
$step = $row['step'];
$current_image = $row['image'];

}else{
//redirect to manage category page
$_SESSION['no-step-found']="<div class='error'>Step not found...</div>";
header('location:'.SITEURL.'admin/manage-step.php');

}
}else{
//redirect to manage category page
header('location:'.SITEURL.'admin/manage-step.php');
}
?>
<!--update form start-->
<form method="post" action="" enctype="multipart/form-data">
<table class="tbl-30">
<tr>
<td>Food Title:</td>
<td>
<select name="food-title">
<?php 
//php codes to display categories from db
//1.write a query
$sql1 = "SELECT * FROM tbl_foodrecipe";
$result1 = mysqli_query($conn,$sql1);
$count1 = mysqli_num_rows($result1);
if($count1>0){
//we have category
while ($row1 = mysqli_fetch_assoc($result1)) {
//get values from db
$id=$row1['id'];
$title = $row1['title'];
?>

<option value="<?php echo $id;?>" >
<?php echo $title; ?>
</option>

<?php
}

}else{
//we don't have category
?>
<option value="0">No available food found</option>
<?php

}    
?>

</select>

</td>
</tr>
<tr>
<td>Step:</td>
<td>
<input class="form-control" type="text" name="step" value="<?php echo $step;  ?>">
</td>
</tr>
<tr>
<td>Current Image:</td>
<td>
<?php

if($current_image != ""){
//display the image
?>
<img src="<?php echo SITEURL;?>images/step/<?php echo $current_image;?>" width="100px">
<?php
}else{
echo "<div class='error'>Image not added</div>";

}
?>
</td>
</tr>

<tr>
<td>New Image:</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
<td>
<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="submit" class="form-control submit btn-secondary" value="Update Step">
</td>
</tr>


</table>
</form>
<!--update form end-->
<?php
if (isset($_POST['submit'])) {
//get all values from form
$id = $_POST['id'];
$step = $_POST['step'];
$current_image = $_POST['current_image'];
$foodrecip_id = $_POST['food-title'];
//updating the new image if selected
//check whether the image is selected or not
if (isset($_FILES['image']['name'])) {
//get the image details
$image = $_FILES['image']['name'];
if ($image!= "") {
//image is available
//A.upload new image

//auto rename image
//get the extension of our image(jpg,png,gif,etc)e.g.food1.jpg
$extension = end(explode('.',$image));
//rename the image
$image_name="Food_Step_".rand(000,999).'.'.$extension;

$source_path = $_FILES['image']['tmp_name'];

$destination_path ="../images/step/".$image;
//finally upload the image
$upload = move_uploaded_file($source_path,$destination_path);
//check the image is uploaded or not 
//if the image not uploaded redirect with error message
if ($upload==FALSE){
//set session message
$_SESSION['upload'] = "<div class='error'>Failed to upload image...</div>";
//redirect to add category page
header('location:'.SITEURL.'admin/add-step.php');
//stop the process
die();
}
//B.remove the current image if availabe
if($current_image != "")
{
$remove_path = "../images/step/".$current_image;
$remove = unlink($remove_path);
//check whether the image is removed or not
if ($remove==FALSE){
//failed to remove the image
$_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image...</div>";
header('location:'.SITEURL.'admin/manage-step.php');
die();//stop the process

}
}
}
else
{
$image = $current_image;
}
}
else{
$image = $current_image;
}

//write query for update
$sql2 = "UPDATE tbl_step SET
id = $id,
step='$step',
image ='$image'
WHERE foodrecipe_id=$foodrecipe_id";
//execute above query
$result2 = mysqli_query($conn,$sql2);
//redirect to manage category
//check whether the qury is executed or not
if ($result2==TRUE) {
//set session
$_SESSION['update'] = "<div class='success'>Step updated successfully...</div>";
header('location:'.SITEURL.'admin/manage-step.php');

}else{
$_SESSION['update'] = "<div class='error'>Failed to update step...</div>";
header('location:'.SITEURL.'admin/manage-step.php');

}



}


?>

</div>
</div>



<?php include('partiales/footer.php');  ?>