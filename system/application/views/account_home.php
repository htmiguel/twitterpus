<?php $this->head->header('Twitterpus - account home',''); ?>

<script type="text/javascript">
$(document).ready(function(){
	if($("#success-message")){
		setTimeout('$("#success-message").fadeOut(5000)',1000);			
	}
});
</script>

<div class="user_identity"><span class="greeting">Hello</span>, <?php echo $username; ?> <a href="/logout">sign out</a></div>
<div class="message-box top">
	<div class="logo"><img src="http://static.twitterpus.com/assets/twitterpus_logo.png" /></div>
</div>
<div class="message-box mid">	
	<div class="message-box-wrapper">
		<p>1. What Are You Doing?
		<span class="numeric" id="chars_left_notice">
			<strong id="status-field-char-counter" style="color: rgb(204, 204, 204);">140</strong>
		</span>
		</p>
		<form method="post" action="account">
			<textarea rows="3" onkeyup="return updateStatusTextCharCounter(this.value, event);" onfocus="return updateStatusTextCharCounter(this.value, event);" onblur="return updateStatusTextCharCounter(this.value, event);" name="status" id="status" cols="40"></textarea>
			<?php echo $message_status; ?>
			<p>2. Which accounts do you want to update?</p>
			<?php echo $dropdown; ?>
			<div><dl id="success" class="accounts"></dl></div>
			<div id="accountstuff"><?php echo $submit; ?></div>
		</form>
			
			<div id="data"><?php echo $welcome; ?></div>
			
	</div>
</div>
<div class="message-box bottom">
</div>

<?php $this->head->footer(); ?>