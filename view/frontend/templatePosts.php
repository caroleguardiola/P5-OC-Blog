<?php ob_start();?>

<section class="home_blog" id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="st-home-unit-blog">
					<div class="hero-txt">
						<p class="hero-work">Développement web - Spécialité PHP/Symfony</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?= $content ?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php'); ?>
