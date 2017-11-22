<?php $title='Blog';?>

<?php ob_start();?>

	

		<section class="blog" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Recent News</h3>
							<p>Some Recent News from Blog</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="blog-post">
							<?php while($data=$posts->fetch()) :?>
							<h2 class="post-title"><a href="#"><?= htmlspecialchars($data['title']);?></a></h2>
							<div class="post-meta">
								<span class="author"><a href="#"><?= htmlspecialchars($data['author']);?></a></span>,
								<span>At <strong><?= htmlspecialchars($data['update_date_fr']);?></strong></span>
							</div>
							
							<div class="post-content">
								<p><?= htmlspecialchars($data['chapo']);?><br />
                          		<a href="" class="more-link">Continue reading <span class="meta-nav">&rarr;</span></a></p>
                          	<?php endwhile ?>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</section>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>