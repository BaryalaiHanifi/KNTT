 <footer id="main-footer">
 	<div class="conatainer-fluid">
 		<div class="row" id="footer">
 		<div class="col-md-6" >
		<span>01</span>
		<strong><a href="index.php">Home</a></strong>
    	<hr>
		<span>02</span>
		<strong><a href="mission.php">Mission</a></strong>
		<hr>
		<span>03</span>
    	<strong><a href="visas.php">Visas</a></strong>
		<hr>
		<span>04</span>
    	<strong><a href="contact.php">Contact</a></strong>
		<hr>	
		</div>
		<div class="col-md-6" style="display:grid; place-items:center;margin-bottom:50px;">
		<p style="margin-left: 20px;">We acknowledge your participation in social media with 
    		Kabul Night Travel & Tours family, as well your
    		sugestion about our services and 
    		share your best travel experinces!
			<br><br>
			<a href="https://www.facebook.com/profile.php?id=61553712674280"><img src="images/facebook.png"></a>
    		<a href="https://www.instagram.com/kabulnights4?igsh=MWoyd2xmZGx5cjFvZQ=="><img src="images/insta.png"></a>
    		<a href="info@kabulnight.com"><img src="images/mail.png"></a>
		</p>
		</div>
		<div class="col-md-12" id="copyrigt" style="display:grid; place-items:center;margin-bottom:50px;">
			<p>&copy;
        <?php
        $startYear = 2023;
        $currentYear = date('Y');
        if ($startYear==$currentYear) {
             echo $currentYear;
        }
        else
        {
             echo "$startYear&ndash;$currentYear";
        } 
         ?>
        Developed by-Baryalai Hanifi</p>
		</div>
    </footer>

</body>
</html>