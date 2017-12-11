<?php $title='Blog';?>

<?php ob_start();?>

<section class="blog" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="index.php" class="more-link"><span class="meta-nav">&larr;</span> Retour à la page d'accueil</a> | 
				<a href="index.php?action=creationPost" class="more-link">Création d'un article <span class="meta-nav">&rarr;</span></a>
				<div class="section-title st-center">
					<h3>Blog</h3>
					<p>Articles récents</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<?php foreach ($posts as $blog_posts):?>
					<div class="blog-post">
						<h2 class="post-title"><a href="index.php?action=post&amp;id=<?= $blog_posts->getId(); ?>" class="more-link""><?= $blog_posts->getTitle();?></a></h2>
						<div class="post-meta">
							<p><strong><?php
							if ($blog_posts->getDateCreationFr() != $blog_posts->getDateUpdateFr())
						    {
						    	echo 'Le ', $blog_posts->getDateUpdateFr();
						    }else{
						    	echo 'Le ', $blog_posts->getDateCreationFr();
							}
						    ?></strong>
							</p>
						</div>
						
						<div class="post-content">
							<p><?= $blog_posts->getTrailer();?></p>
                      		<p><a href="index.php?action=post&amp;id=<?= $blog_posts->getId(); ?>" class="more-link">Lire la suite <span class="meta-nav">&rarr;</span></a></p>
                      	</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>