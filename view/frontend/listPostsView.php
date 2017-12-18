<?php $title='Blog';?>

<?php ob_start();?>

<div class="container content">
	<div class="row page-wrapper">
		<section class="blog" id="blog">
				<div class="row">
					<div class="col-md-12">
						<a href="index.php" class="more-link"><span class="meta-nav">&larr;</span> Retour à la page d'accueil</a> | 
						<a href="index.php?action=creationPost" class="more-link">Création d'un article <span class="meta-nav">&rarr;</span></a>
						<div class="section-title st-center">
							<h3>Blog</h3>
							<h1>Articles récents</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php foreach ($posts as $blogPosts):?>
							<div class="blog-post">
								<h3 class="post-title"><a href="index.php?action=post&amp;id=<?= htmlspecialchars($blogPosts->getId()); ?>" class="more-link""><?= htmlspecialchars($blogPosts->getTitle());?></a></h3>
								<div class="post-meta">
									<p><strong><?php
									if ($blogPosts->getDateCreationFr() != $blogPosts->getDateUpdateFr())
								    {
								    	echo 'Le ', htmlspecialchars($blogPosts->getDateUpdateFr());
								    }else{
								    	echo 'Le ', htmlspecialchars($blogPosts->getDateCreationFr());
									}
								    ?></strong>
									</p>
								</div>
								
								<div class="post-content">
									<p><?= htmlspecialchars($blogPosts->getTrailer());?></p>
		                      		<p><a href="index.php?action=post&amp;id=<?= $blogPosts->getId(); ?>" class="more-link">Lire la suite <span class="meta-nav">&rarr;</span></a></p>
		                      	</div>
							</div>
							<hr class="divider">
						<?php endforeach;?>
					</div>
				</div>
		</section>
	</div>
</div>

<?php var_dump($blogPosts); ?>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>
