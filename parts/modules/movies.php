<?php if(get_option('dt_mm_random_order') == 'true') {
	$rand = 'rand';
} else {
	$rand = '';	
} ?>

<div class="movies slideListAll">

	<div class="header nopadding filmesonline">
		<div class="letter"><i class="fa fa-film"></i> <?php echo get_option('dt_mm_title','Filmes'); ?></div>
		<div class="button hover active" data-type="movies" data-what="featured">LANÇAMENTOS</div>
		<div class="button hover" data-type="movies" data-what="recente">Recentes</div>
		<div class="button hover" data-type="movies" data-what="recommended">Recomendados</div>
		<div class="button hover" data-type="movies" data-what="mostseen">Mais vistos</div>
	</div>

	<div class="movies">
		<div class="items movies-carousel movies-list semMargem" data-loader="movies">
			<?php $args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'genres',
						'field' => 'slug',
						'terms' => array( 'lancamentos' )
						),
					),
				'post_type' => 'movies',
				'showposts' => get_option('dt_mm_number_items','20')
				);
			$loop = new WP_Query($args);
			if($loop->have_posts()) {
				$term = $wp_query->queried_object;
				while($loop->have_posts()) : $loop->the_post();     
				get_template_part('inc/parts/item');
				endwhile;
			} ?>
		</div>
	</div>
</div>