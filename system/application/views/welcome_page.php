<?php $this->head->header('Twitterpus',''); ?>

<div class="user_identity login">
	<form method="post" action="http://twitterpus.com/login">
		<input type="text" name="username" value="" class="input" />
		<input type="password" name="password" value=""  class="input" /> 
		<input type="submit" value="login" id="login-button" />
	</form>

</div>
<div class="message-box top-light">
	<div class="logo"><a href="/"><img border="0" src="http://static.twitterpus.com/assets/twitterpus_logo.png" /></a></div>
</div>
<div class="message-box mid-light">	
	<div class="notice">
		<span>Twitterpus&trade;</span> lets you manage multiple Twitter accounts!
	</div>
	<div class="info">
		<p>Create a new account to get started:</p>
		<form id="signup-form" method="post" action="http://twitterpus.com">
			<?php if($error == TRUE){ echo "<span class='flash error'>This account must already exist.</span>"; }?>
			<span class="input-title">Email</span><input type='text' id="email" name='username' value="" class="input" /><br />
			<span class="input-title">Password</span><input type='password' name='password' value=""  class="input" />
			<input type='submit' value='Sign Up' class="submit" id="signup-submit" />
			<!--><input type='submit' value='Login' onclick="isEmail('email'); return false;" class="submit" id="signup-submit" /> -->
		</form>
	</div>
</div>
<div class="message-box bottom-light">
</div>

<?php $this->head->footer(); ?>

