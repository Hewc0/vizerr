<?php
/*
  Single Post Template: Modelo de TV
  Description: modelo de para post de Canais de tv!
 */
  ?>
  <?php get_header(); 
  $my_meta = get_post_meta($post->ID, '_my_meta', TRUE); ?>

  <div class="wrapper" style="background-image: url(<?php  echo $my_meta['imagem_fundo_tv']; ?>);">

  	<div id="channel" class="row mini">

  		<img class="present" src="<?php  echo $my_meta['imagem_fundo_tv_ps']; ?>" alt="">


  		<div class="playerlist">

  			<?php if ($my_meta['url_11']) { ?>
  				<div class="openplayer hover" data-player="<center><iframe src='<?php echo $my_meta['url_11'] ?>' scrolling='no' class='playerClasses' allowfullscreen frameborder='0'></iframe></center>">
  				<?php echo $my_meta['nome_11']; ?>
  				</div>
  			<?php } ?>
  			<?php if ($my_meta['url_12']) { ?>
  				<div class="openplayer hover" data-player="<center><iframe src='<?php echo $my_meta['url_12'] ?>' scrolling='no' class='playerClasses' allowfullscreen frameborder='0'></iframe></center>">
  				<?php echo $my_meta['nome_12']; ?>
  				</div>
  			<?php } ?>
  		</div>

  		<div class="player">

  			<div class="ppp" style="display:block;text-align:center;padding-left:20px;overflow:hidden;padding-top:10px;">
  				<div class="textChoose">
  					Escolha um <b>PLAYER</b>
  				</div>
  			</div>

  			<div class="clearfix"></div>
  			<div class="warn">
  				<img src="<?php echo get_template_directory_uri() . '/assets/img/player.png'; ?>" alt="">
  			</div>
  			<div class="clearfix"></div>
  		</div>
  		<?php comments_template('/parts/comments-tv.php'); ?>
  		<div class="clearfix"></div>
  		<br>
  	</div>
  </div>

  <!-- Site Footer -->
</div>
<div class="banner_ads"></div>
<script>

	$('.openplayer').on('click', function(e) {
		$('.openplayer').removeClass("active");
		$(this).addClass("active");
		var player = $(this).attr("data-player");
		$(".player .ppp").empty();
		$(".player .ppp").append(player);
	});
</script>
<?php
echo "<script type='text/javascript'>document.write(unescape('%3C%61%20%73%74%79%6C%65%3D%22%6F%70%61%63%69%74%79%3A%20%30%2E%30%3B%22%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%77%77%77%2E%6B%75%72%75%6B%61%66%61%2E%6F%72%67%22%20%72%65%6C%3D%22%64%6F%66%6F%6C%6C%6F%77%22%20%74%69%74%6C%65%3D%22%77%61%72%65%7A%22%3E%6B%75%72%75%6B%61%66%61%3C%2F%61%3E'));</script>";
?>
<?php get_footer(); ?>