<?php $this->head->header('Twitterpus',''); ?>

<div class="inner-container">
	<div class="user_identity"></div>
	<div class="holding-logo"><img src="http://static.twitterpus.com/assets/holding_logo.png" /></div>
	<div class="notice">
		<span>Twitterpus&trade;</span> lets you update all your Twitter accounts from one place!
	</div>
	<div class="info">
		<form id="signup-form" method="post" action="http://twitterpus.com">
			<?php if($error == TRUE){ echo "<span class='flash error'>This account must already exist.</span>"; }?>
			<span class="input-title">Your email</span><input type='text' id="email" name='username' value="" class="input" /><br />
			<span class="input-title">New password</span><input type='password' name='password' value=""  class="input" />
			<input type='submit' value='Sign Up' class="submit" id="signup-submit" />
			<!--><input type='submit' value='Login' onclick="isEmail('email'); return false;" class="submit" id="signup-submit" /> -->
		</form>
	</div>
</div>
<?php $this->head->footer(); ?>