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

<div class="content">
<section class="container page-wrapper">
	<section class="about" id="about">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title st-center">
					<h3>Bienvenue sur mon blog !</h3>
					<h1>Développement web pour tous vos projets</h1>
					
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<p >Mon fort attrait pour le web, et plus particulièrement pour la programmation, m’a conduit à me reconvertir après quinze années en gestion de la paie et comptabilité.</p>
				<p>J’ai débuté en juin dernier le parcours de Développeur d’applications avec une spécialité PHP/Symfony d'OpenClassRooms.</p>
				<p>Je souhaite allier mes expériences professionnelles et les acquis de ma formation pour répondre aux besoins de développement d’applications web nécessaires aux entreprises.</p>
			</div>
			<div class="col-md-12">
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
		        <p><a href="C.GUARDIOLA_CV.pdf" class="more-link">Lien vers mon CV <span class="meta-nav">&rarr;</span></a></p>
				<p><a href="index.php?action=listPosts">Découvrir les articles récents de mon blog <span class="meta-nav">&rarr;</span></a></p>
			</div>      
		</div>
	</section>

	<section class="contact" id="contact">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title st-center">
					<h3>Contactez moi !</h3>
					<h1>N'hésitez pas à m'envoyer un message</h1>
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
	</section>
</section>
</div>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php'); ?>
