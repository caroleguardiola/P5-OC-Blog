<?php
  session_start();
?>

<?php $title='Page d\'accueil';?>

<?php ob_start();?>

<section class="home" id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="st-home-unit">
					<div class="hero-txt">
						<img class="img-circle img-responsive photo_presentation" src="public/images/photo_carre_mini_150.jpg" alt="">
						<p class="hero-work">Développement web - Spécialité PHP/Symfony</p>
						<ul class="list-inline list-social-icons mb-0">
				            <li class="list-inline-item">
				              <a href="https://github.com/caroleguardiola" class="github" target="_blank">
				                <span class="fa-stack fa-lg">
				                  <i class="fa fa-circle fa-stack-2x"></i>
				                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
				                </span>
				              </a>
				            </li>
				            <li class="list-inline-item">
				              <a href="https://www.linkedin.com/in/carole-guardiola" class="linkedin" target="_blank">
				                <span class="fa-stack fa-lg">
				                  <i class="fa fa-circle fa-stack-2x"></i>
				                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
				                </span>
				              </a>
				            </li>
				            <li class="list-inline-item">
				              <a href="https://twitter.com/CaroleGuardiola?lang=fr" class="twitter" target="_blank">
				                <span class="fa-stack fa-lg">
				                  <i class="fa fa-circle fa-stack-2x"></i>
				                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
				                </span>
				              </a>
				            </li>
				          </ul>
						<h2 class="hero-title">Le développement de vos projets</h2>
						<!-- <p class="hero-sub-title">We Provide Hight Quality Bootstrap Template</p> -->
						<!-- <a href="#" class="btn btn-default btn-lg left-btn">Purchase Now</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

		

		<section class="about" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Bienvenue sur mon blog !</h3>
							<p>Développement web pour tous vos projets</p>
							<ul class="list-inline list-icons">
					            <li class="list-inline-item">
					              <i class="devicons devicons-html5"></i>
					            </li>
					            <li class="list-inline-item">
					              <i class="devicons devicons-css3"></i>
					            </li>
					            <li class="list-inline-item">
					              <i class="devicons devicons-bootstrap"></i>
					            </li>
					            <li class="list-inline-item">
					              <i class="devicons devicons-wordpress"></i>
					            </li>
					            <li class="list-inline-item">
					              <i class="devicons devicons-php"></i>
					            </li>
					            <li class="list-inline-item">
					              <i class="devicons devicons-mysql"></i>
					            </li>
					             <li class="list-inline-item">
					              <i class=" devicons devicons-symfony"></i>
					            </li>
						        <li class="list-inline-item">
					              <i class="devicons devicons-git"></i>
					            </li>
					        </ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<p>Texit l, habere se indocti magnosque culpa gravioribus discedere eas indignae diogenem, praetermissum effugiendorum vult dicent, periculum dolere putat. Iucunditatem quid turbulenta patre eae depravatum talem elaborare plerisque repellere, o potiendi tuo aliter, militaris sint tranquillat liberalitati. Locus delicata divelli intemperantes audeam maximisque sitne pulcherrimum aegritudines studium. Habent inveniri fidelissimae aequi andriam laudabilis. Libido censet assiduitas quae probantur tantalo exquisitaque erunt laudatur optari. Late suapte veterum enim qui magna securi eaque proficiscuntur.</p>

						<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
					        <div class="my-auto">
					          <h2 class="mb-5">Skills</h2>

					          <div class="subheading mb-3">Programming Languages &amp; Tools</div>
					          

					          <div class="subheading mb-3">Workflow</div>
					          <ul class="fa-ul mb-0">
					            <li>
					              <i class="fa-li fa fa-check"></i>
					              Mobile-First, Responsive Design</li>
					            <li>
					              <i class="fa-li fa fa-check"></i>
					              Cross Browser Testing &amp; Debugging</li>
					            <li>
					              <i class="fa-li fa fa-check"></i>
					              Cross Functional Teams</li>
					            <li>
					              <i class="fa-li fa fa-check"></i>
					              Agile Development &amp; Scrum</li>
					          </ul>
					        </div>
					      </section>

						<p><a href="C.GUARDIOLA_CV.pdf" class="more-link">Lien vers mon CV <span class="meta-nav">&rarr;</span></a></p>
						<p><a href="index.php?action=listPosts">Découvrir les articles récents de mon blog <span class="meta-nav">&rarr;</span></a></p>
					</div>
				</div>
			</div>
		</section>

		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Contactez moi !</h3>
							<p>N'hésitez pas à m'envoyer un message</p>
						</div>
					</div>
				</div>

				<?php if (array_key_exists('errors', $_SESSION)): ?>
		            <div class="alert alert-danger">
		              <?= implode('<br>', $_SESSION['errors']); ?>
	            	</div>
			    <?php endif; ?>  
			    <?php if (array_key_exists('success', $_SESSION)): ?>
		            <div class="alert alert-success">
		              Votre email a bien été envoyé !
		            </div>
	        	<?php endif; ?>

				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<form class="contact-form" role="form" action="index.php?action=addContact" method="post">
							<div class="form-group">
								<label for="name">Votre nom</label>
								<input type="text" class="form-control" id="name" name="name" value="<?= isset($_SESSION['inputs'] ['name']) ? $_SESSION['inputs'] ['name'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="email">Votre E-mail</label>
								<input type="email" class="form-control" id="email" name="email" value="<?= isset($_SESSION['inputs'] ['email']) ? $_SESSION['inputs'] ['email'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="subject">Votre Sujet</label>
								<input type="text" class="form-control" id="subject" name="subject" value="<?= isset($_SESSION['inputs'] ['subject']) ? $_SESSION['inputs'] ['subject'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="message">Votre Message</label>
								<textarea id="message" name="message" class="form-control" rows="10"><?= isset($_SESSION['inputs'] ['message']) ? $_SESSION['inputs'] ['message'] : ''; ?></textarea>
							</div>
							<button class="btn btn-main btn-lg" type="submit" id="send"><i class="fa fa-paper-plane "></i> Envoyer</button>
						</form>
						<div id="result-message" role="alert"></div>
					</div>
				</div>
			</div>
		</section>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php'); ?>