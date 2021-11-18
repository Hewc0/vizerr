<?php get_header(); ?>
<?php locate_template('parts/buscar.php', true, true); ?>
<div class="wrapper superHidden">
    <div class="homepage-lister">
        <a href="<?php echo get_option('dt_account_page'); ?>">
            <div class="homePageTools">
                <div class="bookmarks item">
                    <i class="fa fa-bookmark"></i>
                    <span><?php contador(); ?></span>
                    <div class="text">
                        <div class="tit">Filmes/Séries por ver</div>
                        <div class="subtit">Assista tudo o que deixou por ver.</div>
                    </div>
                </div>
        </a>
        <a href="<?php echo esc_url( home_url() ) .'/'. 'pedido' .'/'; ?>">
        <div class="bookmarks requests item">
            <i class="fa fa-hand-o-right "></i>
            <span><?php contador_requests(); ?></span>
            <div class="text">
                <div class="tit">Pedidos pendentes</div>
                <div class="subtit">Veja os pedidos no site.</div>
            </div>
        </div>
        </a>
        <div class="randomMovie item" onclick="openRandomMovie();">
            <i class="fa fa-random"></i>
            <div class="text">
                <div class="tit">FILME ALEATÓRIO</div>
                <div class="subtit">Deixe o <?php bloginfo('name'); ?> escolher por você!</div>
            </div>
        </div>

        <div class="popcornButton item" onclick="openSuperPipoca();">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/popcorn.png'; ?>" alt="">
            <div class="text">
                <div class="tit">RECEITA DE PIPOCA</div>
                <div class="subtit">Faça pipoca em sua casa!</div>
            </div>
        </div>
        <div class="superPipoca"></div>
        <div class="randomMovieModal"></div>

    </div>

    <?php
    if ($codex = get_option('dt_shorcode_home')):
        do_shortcode($codex);
    else:
        get_template_part('inc/parts/modules/movies');
        get_template_part('inc/parts/modules/tvshows');
    endif;
    ?>
</div>
<div class="clearfix"></div>
</div>
<div class="banner_ads"></div>
<?php get_footer(); ?>