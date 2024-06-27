<?php include('./config/constants.php');?>
<?php include('./partiales-front/menu.php');?>
<br>
<div class="container-fluid" id="background-image-container">
  <div class="row">
    <div class="col-md-12" id="contact-h1" style="margin-top:50px;margin-bottom:50px;">
      <h1>Get in Touch</h1>
    </div>
  </div>
</div>

<body style="background-color:white">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" id="contact-title">
      <b>
      <?php 
        if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
          unset($_SESSION['user']);
        }
         ?>
      </b>
           <h1>Join Us</h1>
        <h2>We are always ready to serve you!</h2>
     
    </div>
  </div>
</div>

<div class="container-fluid" style="background-color:white;" id="contact-form">
  <div class="row">
      <div class="col-md-12">
        <form method="post" action="">
            <input type="text" name="name" class="form-control" placeholder="Your name..." required>
            <br>
             <input type="email" name="email" class="form-control" placeholder="Your e-mail..." required>
            <br>
            <textarea name="message" class="form-control" placeholder="Message..."
            rows="4"></textarea><br>
            <input type="submit" name="submit" class="form-control submit" value="SEND" onclick="warning();">
            <input type="reset" name= "reset"  value= "RESET" class="form-control reset" onclick="warning();" >
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
  </div>
</div>
      
<script type="text/javascript">
        function warning(){
         var r = confirm("Are you sure!");
        }
</script>
<?php include('./partiales-front/footer.php');  ?>