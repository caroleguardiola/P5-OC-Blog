<?php
  session_start();
?>

<?php $title = 'Modification d\'articles'; ?>

<?php ob_start();?>

<section class="creation_post" id="creation_post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><a href="index.php?action=listPosts" class="more-link"><span class="meta-nav">&larr;</span> Retour à la liste des articles</a></p>
                <div class="section-title st-center">
                    <h3>Modifiez un article !</h3>
                    <h1><?= htmlspecialchars($posted->getTitle()) ; ?></h1>
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
              L'article a bien été modifié !
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <form action="index.php?action=updatePost&amp;id=<?= $posted->getId() ?>" method="post">
                <div>
                    <label for="title">Titre</label><br />
                    <input type="text" id="title" name="title" class="form-control" value="<?php if (isset($posted)) echo htmlspecialchars($posted->getTitle()); ?>"/>

                </div>
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" class="form-control" value="<?php if (isset($posted)) echo htmlspecialchars($posted->getAuthor()); ?>"/>
                </div>
                <div>
                    <label for="trailer">Chapô</label><br />
                    <input type="text" id="trailer" name="trailer" class="form-control" value="<?php if (isset($posted)) echo htmlspecialchars($posted->getTrailer()); ?>"/>
                </div>
                <div>
                    <label for="content">Contenu</label><br />
                    <textarea id="content" name="content" class="form-control" placeholder="Contenu" rows="10"><?php if (isset($posted)) echo htmlspecialchars($posted->getContent()); ?></textarea>
                </div>
                    <button class="btn btn-main btn-lg" type="submit" id="send"><i class="fa fa-paper-plane "></i> Envoyer</button>
                </form>
            <div id="result-message" role="alert"></div>
        </div>
    </div>
</section>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>

<?php $content=ob_get_clean(); ?>

<?php require('template_posts.php'); ?>
