<?php $this->head->header('Twitterpus - account home',''); ?>

<div class="user_identity"><span class="greeting">Hello</span>, <?php echo $username; ?> <a href="/logout">sign out</a></div>
<div class="message-box top">
	<div class="logo"><img src="http://static.twitterpus.com/assets/twitterpus_logo.png" /></div>
</div>
<div class="message-box mid landing">	
	<h1 class='landing'>Way to go!</h1>
	<h2 class='landing'>You've updated all your selected accounts with:</h2>
	<span class="quotes">"<?php echo $status; ?>"</span>
	<a href="/account">Send Another Update &raquo;</a>
</div>
<div class="message-box bottom">
</div>

<?php $this->head->footer(); ?>