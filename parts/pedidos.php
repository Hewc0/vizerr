<div class="wrapper" style="background:url(<?php echo get_template_directory_uri() . '/assets/img/req_bg.jpg'; ?>) no-repeat fixed center bottom / cover;">
	<div class="clearfix"></div>
	<div class="row mini" id="requestsZone">
		<div class="header">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/requests.jpg'; ?>" alt="">
		</div>
		<div class="menubar">

			<div class="item hover active openGeneralItems">
				LISTA DE PEDIDOS
			</div>
			<?php if (is_user_logged_in()) { ?>
			<div class="item hover openMyItems">
				MEUS PEDIDOS
			</div>
			
			<div class="item new-req hover" style="background: #e67e22;">
				FAZER NOVO PEDIDO
			</div>
			<?php } else{?>
			<div class="item new-req open-login hover" style="background: #e67e22;">
				FAÇA LOGIN PARA FAZER UM PEDIDO
			</div>
			<?php } ?>
		</div>

		<div class="content">

			<div id="request-data">

			</div>

			<div id="tutorial">
				<i class="fa fa-close closeTutorial"></i>
				<div class="title">COMO FAZER UM PEDIDO</div>
				<span>Acesse o <a href="http://www.imdb.com" target="_BLANK">IMDB</a> e procure o seu filme ou série na barra de pesquisa.</span><br>
				<span>Copie o código de identificação na barra de URL como indicado na imagem em baixo.</span> <br>
				<span>Por fim, volte ao <b>vizer</b>, cole o ID no campo <b>"IMDB ID"</b> e faça o pedido.</span>

				<div class="clearfix"></div>
				<img src="<?php echo get_template_directory_uri() . '/assets/img/tutorial.png'; ?>" alt="">
			</div>


			<div id="new-request">
				<div class="loading newRequestLoad"></div>
				<div class="form">
					<form id="postdata" class="generador_form">
						<span>IMDB ID - filme / série</span>
						<input type="text" id="imdb" name="imdb" placeholder="IMDb URL" required>
						<button type="submit" id="">EFETUAR PEDIDO</button>
					</form>
				</div>
				<div class="tutorial">
					<span>Não sabe onde encontrar o <b>IMDB ID</b>?</span>
					<div class="openTutorial">Leia o tutorial aqui</div>
				</div>
			</div>

			<div id="request-list">

				<?php
				if (have_posts()) :while (have_posts()) : the_post();
				get_template_part('inc/parts/item_pe');
				endwhile;
				endif;
				?>


			</div>
		</div>
		<?php basey_pagination(); ?>
	</div>
</div>
<?php if (is_user_logged_in()) { ?>
<script>

	$(document).on('click', '.openMyItems', function (e) {
		requestsList("1", "user");
		$(this).addClass("active");
		$(".openGeneralItems").removeClass("active");
	});

	$(document).on('click', '.closeAlert', function (e) {
		$(".alert").fadeOut(200);
		setTimeout(function () {
			$(".alert").remove();
		}, 300);
	});

	$(document).on('click', '.openTutorial', function (e) {
		$("#tutorial").fadeIn(100);
	});
	$(document).on('click', '.closeTutorial', function (e) {
		$("#tutorial").fadeOut(100);
	});

	$(document).on('click', '.new-req', function (e) {
		$("#new-request").fadeIn();
	});

	$(document).on('click', '.openRequest', function(e) {
		e.preventDefault();
		var id = $(this).attr("data-request-id");

		var data = "action=request&Data&id="+id;

		if (id) {
			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				cache: false,
				success: function(html){
					$("#request-data").empty();
					$("#request-data").append(html);
				}
			});
		}
	});

	$(document).ready(function(){
		$('#postdata').submit(function(){
			$(".newRequestLoad").fadeIn(100);
			$( ".generador_form" ).last().addClass( "generate_ajax" );
			$.ajax({
				type: 'POST',
				url: '<?php echo get_template_directory_uri(); ?>/inc/api/requests.php', 
				data: $(this).serialize()
			})
			.done(function(data){
				location.reload();
			})
			.fail(function() {
				alert( "Error" );
			});
			return false;

		});
	});
</script>
<?php } ?>