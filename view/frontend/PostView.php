<?php $title = htmlspecialchars($posted->getTitle());?>

<?php ob_start();?>

<div class="container content">
	<div class="row page-wrapper">
		<section class="blog" id="blog">
			<div class="row">
				<div class="col-md-12">
					<a href="index.php?action=listPosts" class="more-link"><span class="meta-nav">&larr;</span> Retour à la liste des articles</a>
					<div class="section-title st-center">
						<h1><?= htmlspecialchars($posted->getTitle()); ?></h1>
					</div>
					<div class="blog-post-unique">
						<div class="post-meta-detail">
							<p><strong><?= htmlspecialchars($posted->getAuthor()); ?>, le <?= htmlspecialchars($posted->getDateCreationFr()),'<br /></strong>';
								if ($posted->getDateCreationFr() != $posted->getDateUpdateFr())
							    {
							    	echo 'Mis à jour le ', htmlspecialchars($posted->getDateUpdateFr());
							    }
							    ?>
							</p>    
						</div>
						<div class="post-content">
							<p><?= nl2br(htmlspecialchars($posted->getTrailer()));?></p>
							<p><?= nl2br(htmlspecialchars($posted->getContent()));?></p>
							<a href="index.php?action=modifyPost&amp;id=<?= $posted->getId();?>" class="more-link">Modification de l'article <span class="meta-nav">&rarr;</span></a>
						</div>
					</div>
				</div>
			</div>
		</section>  
	</div>
</div>


<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>
