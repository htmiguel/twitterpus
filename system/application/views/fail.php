<?php $this->head->header('Twitterpus - account home',''); ?>

<div class="user_identity"><span class="greeting">Hello</span>, <?php echo $username; ?> <a href="/logout">sign out</a></div>
<div class="message-box top">
	<div class="logo"><img src="http://static.twitterpus.com/assets/twitterpus_logo.png" /></div>
</div>
<div class="message-box mid landing">	
	<h1 class='landing'>Sorry!</h1>
	<h2 class='landing'>Don't get your tenticles in a bunch...</h2>
	<a href="/account">Try Again</a>
	<a href="/account">Report a problem &raquo;</a>
</div>
<div class="message-box bottom">
</div>

<?php $this->head->footer(); ?>