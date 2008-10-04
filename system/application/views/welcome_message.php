<h1>Welcome to Twitterpus</h1>
<h3>The easiest way to update all your Twitter accounts, at once!</h3>
<ol>
	<li>Create an account</li>
	<li>Add all your twitter accounts</li>
	<li>Start updating</li>
</ol>
<form method="post" action="/users/create">
	Email: <input type='text' name='email' /><br />
	Password: <input type='text' name='password' /><br />
	<br />
	<?php echo $dropdown; ?>
	<input type='submit' value='sign up!' />
</form>
<a href="login">login</a>



<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-251156-12");
pageTracker._trackPageview();
</script>