<?php $this->head->header('Twitterpus',''); ?>

<div class="inner-container">
	<div class="user_identity"></div>
	<div class="holding-logo"><img src="http://static.twitterpus.com/assets/holding_logo.png" /></div>
	<div class="notice"><span>Easily</span> update all your Twitter accounts from one place!</div>
	<!-- LOGIN -->
	<div id="loginForm" class="signup">
	<div class="info"><p>Login to your existing account</p></div>			
	<form action="http://twitterpus.com/login" method="post">
		<?php if($error == TRUE){ echo "<span class='flash error'>Your email or password are incorrect.</span>"; } ?>
		<label>Email</label><input type="text" name="username" class="signup-login-input" /><br />
		<label>Password</label><input type="password" name="password" class="signup-login-input" /><br />
		<input type="submit" id="signup" value="LOGIN" /> <a href="/">Not a member? Sign Up</a>
	</form>
	</div>
	<!--<div class="info">
		<p>Follow us on twitter, <a href="http://twitter.com/twtrpus">@twtrpus</a></p>
	</div>-->
</div>
<?php $this->head->footer(); ?>
