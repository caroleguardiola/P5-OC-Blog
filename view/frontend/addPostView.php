<?php $title = 'Création d\'articles';?>

<?php ob_start();?>

        <section class="creation_post" id="creation_post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title st-center">
                            <h3>Créez un nouvel article !</h3>
                            <p>Get in Touch with Us</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="index.php?action=addPost" method="post">
                        <div>
                            <label for="title">Titre</label><br />
                            <input type="text" id="title" name="title" class="form-control" placeholder="Titre"/>
                        </div>
                        <div>
                            <label for="author">Auteur</label><br />
                            <input type="text" id="author" name="author" class="form-control" placeholder="Auteur"/>
                        </div>
                        <div>
                            <label for="chapo">Chapô</label><br />
                            <input type="text" id="chapo" name="chapo" class="form-control" placeholder="Chapô"/>
                        </div>
                        <div>
                            <label for="content">Contenu</label><br />
                            <textarea id="content" name="content" class="form-control" placeholder="Contenu" rows="10"></textarea>
                        </div>
                            <button class="btn btn-main btn-lg" type="submit" id="send" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending..."><i class="fa fa-paper-plane "></i> Envoyer</button>
                        </form>
                    <div id="result-message" role="alert"></div>
                </div>
            </div>
        </section>


<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>