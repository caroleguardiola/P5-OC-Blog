<?php
    session_start();

    //On enregistre notre token
    if (!isset($_SESSION['token'])) {
       $_SESSION['token'] = md5(time()*rand(357,412));    
    }
?>

<?php $title = 'Création d\'articles';?>

<?php ob_start();?>

<div class="container content">
    <div class="row page-wrapper">
        <section class="creation_post" id="creation_post">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="index.php?action=listPosts" class="more-link"><span class="meta-nav">&larr;</span> Retour à la liste des articles</a></p>
                    <div class="section-title st-center">
                        <h3>Créez un nouvel article !</h3>
                        <h1>N'hésitez pas à nous faire partager vos idées !</h1>
                    </div>
                </div>
            </div>

            <?php if (array_key_exists('errors', $_SESSION)): ?>
                <div class="alert alert-danger">
                    <?= implode('<br>', $_SESSION['errors']); ?>
                </div>
            <?php endif; ?>  
            <?php if (array_key_exists('success', $_SESSION) && $_SESSION['success'] === true): ?>
                <div class="alert alert-success">
                    Votre article a bien été créé !
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <form action="index.php?action=addPost" method="post">
                        <div>
                            <label for="title">Titre</label><br />
                            <input type="text" id="title" name="title" class="form-control" value="<?= isset($_SESSION['inputs'] ['title']) ? $_SESSION['inputs'] ['title'] : ''; ?>">
                        </div>
                        <div>
                            <label for="author">Auteur</label><br />
                            <input type="text" id="author" name="author" class="form-control" value="<?= isset($_SESSION['inputs'] ['author']) ? $_SESSION['inputs'] ['author'] : ''; ?>">
                        </div>
                        <div>
                            <label for="trailer">Chapô</label><br />
                            <input type="text" id="trailer" name="trailer" class="form-control" value="<?= isset($_SESSION['inputs'] ['trailer']) ? $_SESSION['inputs'] ['trailer'] : ''; ?>">
                        </div>
                        <div>
                            <label for="content">Contenu</label><br />
                            <textarea id="content" name="content" class="form-control" rows="10"><?= isset($_SESSION['inputs'] ['content']) ? $_SESSION['inputs'] ['content'] : ''; ?></textarea>
                        </div>
                        <button class="btn btn-main btn-lg" type="submit" id="send"><i class="fa fa-paper-plane "></i> Envoyer</button>
                        <div>
                        <input type="hidden" id="token" name="token" class="form-control" value="<?= $_SESSION['token']; ?>">
                        </div>
                    </form>
                <div id="result-message" role="alert"></div>
            </div>
        </section>
    </div>
</div>

<?php
    unset($_SESSION['inputs']);
    unset($_SESSION['success']);
    unset($_SESSION['errors']);

?>

<?php $content=ob_get_clean(); ?>

<?php require('templatePosts.php'); ?>
