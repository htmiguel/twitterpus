<?php $this->head->header('Releases - Ghostly International','Browse our entire catalog of music spanning almost a decade of quality output from Matthew Dear, Dabrye, Skeletons &amp; The Kings of All Cities, Christopher Willits and James T. Cotton.'); ?>
<script type="text/javascript">
$(document).ready(function(){
	prepareTabs();
	var uri = document.location.href;
	var str = uri.split("#")
	if(str[1]){
		setTab(str[1],'release');
	}
});
</script>

<div id="ptitle">
	<div id="tabs">
		<ul>
			<li class="ghostly-logo"><span id="t1" class="nonlink" title="Ghostly">Ghostly International (GI)</span></li>
			<li class="secondary-li spectral-logo"><a id="t2" href="#Spectral" class="tab release" title="Spectral">Spectral Sound (SPC)</a></li>
			<li class="secondary-li last ghostly-logo"><a id="t3" href="#GIDG" class="tabs release" title="GIDG">Ghostly Digital (GIDG)</a></li>
		</ul>
</div>
</div>

	<div id="gi" class="Ghostly">
		<div class="left_3 browse-view browse-about">
			<img class="logo" src="http://static.ghostly.com/images/assets/logo_ghostly.gif" alt="Ghostly International" />
			<p>Ghostly International is a record label that embodies music of electronic methods and humanistic aims.</p>
			<p>Our releases fall into two distinct stylistic halves:</p>
			<img class="logo" src="http://static.ghostly.com/images/assets/logo_avantpop.gif" alt="Avant Pop" />
			<p><strong>Avant-Pop</strong>, a space for cutting edge music with an electronic methodology and a pop sensibility. It follows no formula, but you know it when you hear it. Acts like <a href="http://ghostly.com/artists/dabrye" alt="Dabrye">Dabrye</a>, <a href="http://ghostly.com/artists/matthew-dear" alt="Matthew Dear">Matthew Dear</a>, <a href="http://ghostly.com/artists/solvent" alt="Solvent">Solvent</a> and <a href="http://ghostly.com/artists/skeletons" alt="Skeletons &amp; The Kings of All Cities">Skeletons &amp; The Kings of All Cities</a> exemplify this convergence of the avant-garde and the popular.</p>
			<img class="logo" src="http://static.ghostly.com/images/assets/logo_smm.gif" alt="SMM" />
			<p><strong>SMM</strong> is a mysterious acronym that encompasses enigmatic ambient and experimental music with an emphasis on textural and melodic expanses. <a href="http://ghostly.com/artists/twine" alt="Twine">Twine</a>, <a href="http://ghostly.com/artists/aeroc" alt="Aeroc">Aeroc</a>, <a href="http://ghostly.com/artists/lusine" alt="Lusine">Lusine</a>, <a href="http://ghostly.com/artists/kiln" alt="Kiln">Kiln</a>, and <a href="http://ghostly.com/artists/cepia" alt="Cepia">Cepia</a> are some of the artists exploring the limitlessness of the SMM sound.</p>
		</div>
		<div class="right_10 browse-view release-list">
			<div class="release-container">
				<?php echo $ghostly; ?>
			</div>
		</div>
	</div>
		<div class="porque"></div>
	<div id="spc" class="hide Spectral">
		<div class="left_3 browse-view browse-about">
			<img class="logo" src="http://static.ghostly.com/images/assets/logo_spectral_fill_alt.gif" alt="Spectral Sound" />
			<p>With its focus on the dancefloor, Spectral Sound releases music for the deepest hours of night.  Spectral artists combine elements of techno, house and other classic dance styles with a modern touch. Artists like <a href="http://ghostly.com/artists/audion" alt="Audion">Audion</a>, <a href="http://ghostly.com/artists/james-t-cotton" alt="James T. Cotton">James T. Cotton</a>, <a href="http://ghostly.com/artists/osborne" alt="osborne">Osborne</a> and <a href="http://ghostly.com/artists/kate-simko" alt="Kate Simko">Kate Simko</a> embody this unique blend of music.</p>
		</div>
		<div class="right_10 browse-view release-list">
			<div class="release-container">
				<?php echo $spectral; ?>
			</div>
		</div>
	</div>	
	<div id="gdg" class="hide GIDG">
		<div class="left_3 browse-view browse-about">
			<img class="logo" src="http://static.ghostly.com/images/assets/logo_ghostly.gif" alt="Ghostly Digital" />
			<p>Ghostly Digital (GIDG) offers new material from artists who are in-between albums as well as provide an outlet for download-only singles from new and established artists.</p>
		</div>
		<div class="right_10 browse-view release-list">
			<div class="release-container">
				<?php echo $gidg; ?>
			</div>
		</div>
	</div>
</div>

<?php $this->head->footer(); ?>