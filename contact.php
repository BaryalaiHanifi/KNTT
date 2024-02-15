<?php include('./config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>contact</title>
	<link rel="stylesheet" type="text/css" href="./css/frontend.css">
    <script type="text/javascript">
        function warning(){
         var r = confirm("Are you sure!");
        }
    </script>
</head>
<body style="background-color:#f5f5dc">
 <header
       style="background-image:
       linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
       url(images/contact-back.webp);
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
        <p>Get in</p>
        <img src="images/chefs.jpeg"><span style="font-size:180px; ">Touch</span>
       </div>
    </header>
    <div class="contact-title">
           <h1>Join Us</h1>
        <h2>We are always ready to serve you!</h2>
        <?php 
        if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
          unset($_SESSION['user']);
        }


         ?>
    </div>
    <div class="contact-form">
        <form id="contact-form" method="post" action="">
            <input type="text" name="name" class="form-control" placeholder="Your name..." required>
            <br>
             <input type="email" name="email" class="form-control" placeholder="Your e-mail..." required>
            <br>
            <textarea name="message" class="form-control" placeholder="Message..."
            rows="4"></textarea><br>
            <input type="submit" name="submit" class="form-control submit" value="SEND" onclick="warning();" 
            ><br>
            <input type="reset" name= "reset"  value= "RESET" class="form-control reset" onclick="warning();" ><br> 
            </form>
            <?php
            //check whether send button is clicked or not
            if (isset($_POST['submit'])) {
              //get all the details from the form
              $user_name = $_POST['name'];
              $email = $_POST['email'];
              $message = $_POST['message'];
              //save user data in db
              //run sql query to save data
              $sql = "INSERT INTO tbl_user SET 
              user_name = '$user_name',
              user_email = '$email',
              message = '$message'
              ";
              //execute query
              $result = mysqli_query($conn,$sql);
              //check query execution
              if ($result == TRUE){
                //query executed
                $_SESSION['user'] = "<div class='success'>User data input successfully...</div>";
              }else{
                //failed to get user input
                 $_SESSION['user'] = "<div class='error'>Failed to get user input...</div>";
                 header('location:'.SITEURL.'contact.php');


              }

            }


            ?>
   </div>
     <?php include('./partiales-front/footer.php');  ?>