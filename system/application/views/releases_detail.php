<?php 
$header = $artist->name." presents ".$album->name." - Ghostly International";
$this->head->header($header,substr(trim(strip_tags($this->textile->TextileThis($album->description))),0,200)); 
?>

	<div id="ptitle" class='release-detail'>
	<?php
		# CHECK TO SEE IF THIS IS A VARIOUS ARTIST -  IF SO, DON'T SHOW THIS
		if($artist->name != 'Various Artists'){ ?>
		<h1><?php echo "<a href='".site_url('artists/'.$artist->slug.'')."'>".$artist->name."</a>"; ?></h1>
		<?php } else { ?>
		<h1><?php echo $artist->name; ?></h1>
		<?php } ?>
		<h2><?php echo $album->name; ?></h2>
	</div>

	<div class="left_8 albums">
		<div class="album-description">
			<?php echo "<img src='http://static.ghostly.com/images/artists/".$artist->id."/albums/".$album->id."/".$image->name."' id='album_cover' alt='".$album->name."' title='".$album->name."' />"; ?>
			<?php echo $this->textile->TextileThis($album->description); ?>
		</div>
		<?php 
			# CHECK TO SEE IF THIS IS A VARIOUS ARTIST -  IF SO, DON'T SHOW THIS
			if($artist->name != 'Various Artists'){
		?>	
			<div class="about-artist">
			<?php echo "<a href='".site_url('artists/'.$artist->slug.'')."'>".$biopic."</a>"; ?>
			<h3>About <?php echo $artist->name; ?></h3>
			<?php echo substr($this->textile->TextileThis($artistbio->description),0,200)."...<a href='".site_url('artists/'.$artist->slug.'')."'>check out ".$artist->name."'s page and other releases</a>"; ?>
		</div>
		<?php } ?>
	</div>

	<div class="right_5 release-meta">
		<div class="album-meta-module">
			<ul class="album-meta">
				
					<?php
						switch($meta->label_id){
							case 1:
							$label_name = "Ghostly International";
							if($meta->sub_label_id == 1) {
								echo "<li class='logo'><img src='http://static.ghostly.com/images/assets/logo_ghostly.gif' /><img src='http://static.ghostly.com/images/assets/logo_smm.gif' /></li>";
							} elseif($meta->sub_label_id == 2) {
								echo "<li class='logo'><img src='http://static.ghostly.com/images/assets/logo_ghostly.gif' /><img src='http://static.ghostly.com/images/assets/logo_avantpop.gif' /></li>";
							} else {
								echo "<li class='logo'><img src='http://static.ghostly.com/images/assets/logo_ghostly.gif' /></li>";
							}							
							break;
							case 2:
							$label_name = "Spectral Sound";
							echo "<li class='logo'><img src='http://static.ghostly.com/images/assets/logo_spectral_fill_alt.gif' /></li>";
							break;
							case 3;
							$label_name = "Ghostly Digital";
							echo "<li class='logo'><img src='http://static.ghostly.com/images/assets/logo_ghostly.gif' /></li>";
							break;							
						}
					?>
					
					
					
				
				<li class='label-name'><?php echo $label_name; ?></li>
				<li class='cat-num'><?php echo $meta->cat_num; ?></li>
				<li class='format-title'>formats:</li>
				<li class='formats'><?php echo $meta->release_formats; ?></li>
				<li class='date-title'>release date:</li>
				<li class='date'><?php echo $this->helpers->fix_date($meta->official_release_date); ?></li>
			</ul>

			<ul class="buy-buttons">
				<li class='buy-title'>Buy This Release</li>
				<?php if($album->out_of_print == 1){echo "<img src='http://static.ghostly.com/images/assets/buttons/button_outofprint.gif' border='0' />";} else { ?>
				<?php echo $buy_now_ghostly; ?>
				<?php echo $buy_now; } ?>
					
				<li class='share'>Share This Release</li>
				<li class='share-icon'><script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><style> html .fb_share_link { padding:2px 0 0 20px; height:16px; background:url(http://static.ghostly.com/images/assets/share_facebook.gif) no-repeat top left; }</style><a href="http://www.facebook.com/share.php?u=<?php echo site_url('releases/'.$album->slug.''); ?>" onclick="return fbs_click()" target="_blank" class="fb_share_link" title='Share on Facebook'></a></li>
				<li class='share-icon'><a class="savelink" href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=4&noui&jump=close&url='+encodeURIComponent('<?php echo site_url('releases/'.$album->slug.''); ?>')+'&title='+encodeURIComponent('Ghostly International'),'delicious', 'toolbar=no,width=700,height=400'); return false;" title='Share on Del.icio.us'><img src="http://static.ghostly.com/images/assets/share_delicious.gif"/></a></li>
				<li class='share-icon'><a href="http://www.stumbleupon.com/submit?url=<?php echo site_url('releases/'.$album->slug.''); ?>" target='blank' title='Share on Stumbleupon'><img border="0" src="http://static.ghostly.com/images/assets/share_stumbleupon.gif" alt="StumbleUpon" /></a></li>		
			</ul>
		</div>

		<?php if($album->slug == "ghostly-swim"){ ?>	
		<div class="release-detail-promo">
			<a href="http://www.adultswim.com/williams/music/ghostlyswim/index.html"><img src="http://static.ghostly.com/images/promo/ghostlyswim/ghostlyswim_download.gif" alt="Ghostly Swim" /></a>
		</div>			
		<?php } ?>
				<div class="porque"></div>
		<div class="tracklisting">
			<div class="box-inner">
			<h3>Tracklisting</h3>
			<?php echo $tracklist; ?>
			</div>
		</div>
			<?php echo $video; ?>
		<?php if($press != ''){ ?>
			<div class="module press-module release-press">
				<h3>Press</h3>
				<?php echo $press; ?>
			</div>	
		<?php } ?>
		<div class="video">
		</div>	
	</div>



		<?php if($album->slug == "ghostly-swim"){ ?>	
			<script type="text/javascript" src="http://cetrk.com/pages/scripts/0004/1247.js"> </script>
		<?php } ?>

	
<?php $this->head->footer(); ?>