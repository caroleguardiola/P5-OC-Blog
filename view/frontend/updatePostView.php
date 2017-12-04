<?php $title = 'Modification d\'articles';?>

<?php ob_start();?>

        <section class="creation_post" id="creation_post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title st-center">
                            <h3>Modifiez un article !</h3>
                            <p><?= $posted['title'] ; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="index.php?action=updatePost&amp;id=<?= $posted['id'] ?>" method="post">
                        <div>
                            <label for="title">Titre</label><br />
                            <input type="text" id="title" name="title" class="form-control" value="<?php if(isset($posted['title'])) {echo $posted['title'] ;} ?>"/>
                        </div>
                        <div>
                            <label for="author">Auteur</label><br />
                            <input type="text" id="author" name="author" class="form-control" value="<?php if(isset($posted['author'])) {echo $posted['author'] ;} ?>"/>
                        </div>
                        <div>
                            <label for="trailer">Chapô</label><br />
                            <input type="text" id="trailer" name="trailer" class="form-control" value="<?php if(isset($posted['trailer'])) {echo $posted['trailer'] ;}?>"/>
                        </div>
                        <div>
                            <label for="content">Contenu</label><br />
                            <textarea id="content" name="content" class="form-control" placeholder="Contenu" rows="10"><?php if(isset($posted['content'])) {echo $posted['content'];} ?></textarea>
                        </div>
                            <button class="btn btn-main btn-lg" type="submit" id="send" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending..."><i class="fa fa-paper-plane "></i> Envoyer</button>
                        </form>
                    <div id="result-message" role="alert"></div>
                </div>
            </div>
        </section>


<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>