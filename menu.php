<?php include('./config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/menu-back.jpg);
      height: 100vh;
      background-size: cover;
      background-position:center;>
      <header id="menu-header">
         <div id="menu-navbar">
            <a class="active" href="<?php echo SITEURL;?>index.php">Home</a>
         </div>
         <div id="menu-h3-h6-sty">
           <h3>Kabul Nights<br>
           <p>Travel & Tours</p></h3>
         </div>
    </header>
    <br><br>
    <section id="menu-section">
    <div class="container2">
        <div id="menu-1">
        <span>We acknowledge your participation in social media with 
    		Kabul Night Travel & Tours family, as well your
    		sugestion about our services and 
    		share your best travel experinces!
            <br><br>
            <a href="https://www.facebook.com/profile.php?id=61553712674280"><img src="images/facebook.png" style="border: none;"></a>
            <a href="https://www.instagram.com/kabulnights4?igsh=MWoyd2xmZGx5cjFvZQ=="><img src="images/insta.png" style="border: none;"><br></a>
            <a href="#">info@kabulnight.com</a><br><br>
            <b>WhatsApp: +93790903736, +93795797707</b><br><br>
		       	<img src="images/address.png" style="border: none;"><b>11th Street Wazir Akbar Khan, Kabul</b> 
        </span>
        </div>
        <div id="xn">
        <span>01</span>
        <strong><a href="<?php echo SITEURL;?>mission.php">Mission</a></strong>
        <hr>
        <br>
        <span>02</span>
        <strong><a href="<?php echo SITEURL;?>visas.php">Visas</a></strong>
        <hr>
        <br> 
        <span>03</span>
        <strong><a href="<?php echo SITEURL;?>contact.php">Contact</a></strong>  
        <hr>
     </section>

</body>
</html>