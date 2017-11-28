<?php $title = htmlspecialchars($post['title']);?>

<?php ob_start();?>

		<section class="blog" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-post">
							<h2 class="post-title"><a href="#"><?= htmlspecialchars($post['title']) ?></a></h2>
							<div class="post-meta">
								<span class="author"><a href="#"><?= htmlspecialchars($post['author']);?></a></span>,
								<span>At <strong><?= htmlspecialchars($post['update_date_fr']);?></strong></span>
							</div>
							
							<div class="post-content">
								<p><?= htmlspecialchars($post['chapo']);?></p>
								<p><?= nl2br(htmlspecialchars($post['content']));?></p>
								<a href="index.php?action=modifyPost&amp;id=<?= $post['id'] ?>" class="more-link">Modification blog post <span class="meta-nav">&rarr;</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>