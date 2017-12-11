<?php $title = 'Message d\'erreur';?>

<?php ob_start();?>

<section class="creation_post" id="creation_post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title st-center">
                    <h3>Message d'erreur !</h3>
                    <p><?= $e->getMessage(); ?></p>
                </div>
            </div>
        </div>
		<a href="index.php" class="more-link"><span class="meta-nav">&larr;</span> Retour à la page d'accueil</a>
    </div>
</section>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>