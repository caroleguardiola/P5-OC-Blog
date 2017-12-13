<?php $title = $posted->getTitle();?>

<?php ob_start();?>

<section class="blog" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="index.php?action=listPosts" class="more-link"><span class="meta-nav">&larr;</span> Retour à la liste des articles</a>
				<div class="section-title st-center">
					<h1><?= $posted->getTitle(); ?></h1>
				</div>
				<div class="blog-post-unique">
					<div class="post-meta-detail">
						<p><strong><?= $posted->getAuthor(); ?>, le <?= $posted->getDateCreationFr(),'<br /></strong>';
							if ($posted->getDateCreationFr() != $posted->getDateUpdateFr())
						    {
						    	echo 'Mis à jour le ', $posted->getDateUpdateFr();
						    }
						    ?>
						</p>    
					</div>
					
					<div class="post-content">
						<p><?= nl2br($posted->getTrailer());?></p>
						<p><?= nl2br($posted->getContent());?></p>
						<a href="index.php?action=modifyPost&amp;id=<?= $posted->getId();?>" class="more-link">Modification de l'article <span class="meta-nav">&rarr;</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>    

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>
