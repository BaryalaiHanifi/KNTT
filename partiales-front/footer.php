 <footer id="main-footer">
   	<div class="container2">
   		<div id="footer">
    	<span>We acknowledge your participation in social media with 
    		Kabul Night Travel & Tours family, as well your
    		sugestion about our services and 
    		share your best travel experinces!!!
			<br><br>
			<a href="#" style="float: right;"><img src="images/facebook.png"></a>
    		<a href="#" style="float: right;"><img src="images/insta.png"></a>
    		<a href="#" style="float: right;"><img src="images/email.JPG"></a>
		</span>
		</div>
   		<strong><a href="mission.php">Mission</a></strong>
   		<span>01</span>
    	<hr>
    	<strong><a href="recipes.php">Recipes</a></strong>
    	<span>02</span>
    	<hr>
    	<strong><a href="contact.php">Contact</a></strong>	
    	<span>03</span>
    	<hr>
    	<div id="copyrigt">

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
        Powered by:Baryalai Hanifi</p>
    	<img src="images/logo2.png">
        </div>
        </div>
    	
    </footer>

</body>
</html>