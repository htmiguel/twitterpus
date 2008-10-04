<?php

class Head extends Model {
	
    function Head()
    {
        // Call the Model constructor
        parent::Model();
    }

	function header($page)
	{
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><?php echo $page; ?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />		
		<script language='javascript' type='text/javascript' src='http://static.twitterpus.com/scripts/jquery.js'></script>
		<script language='javascript' type='text/javascript' src='http://static.twitterpus.com/scripts/script.js'></script>
		<?php echo "<link media='screen' rel='stylesheet' href='http://static.twitterpus.com/styles/reset.css' media='screen' />\n"; ?>
		<?php echo "<link media='screen' rel='stylesheet' href='http://static.twitterpus.com/styles/style.css' media='screen' />\n"; ?>
	</head>
	<body>
		<div class="wrapper">
			<div class="container">	

	<?php
	}

	function footer()
	{
	?>
		
				<div class="footer">
					<span class="twi">Twitterpus&trade;</span> is not affiliated with Twitter&trade;. It was designed and built for fun, we hope you like it. <a href="mailto:twitterpus@gmail.com">Send feedback</a></span>
				</div>
			</div>
			<div class="push"></div>	
		</div>
			
		<div class="ocean-floor">
				<div id="f_mid">
					<div id="f_front">
					</div>
				</div>
		</div>

		
			<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			var pageTracker = _gat._getTracker("UA-251156-12");
			pageTracker._trackPageview();
			</script>
		</body>
		</html>
	<?php
	}
}

?>