<?php
require('controler/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'creationPost') {
            createPost();
            }
        elseif ($_GET['action'] == 'addPost') {
                if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
                    addPost($_POST['title'], $_POST['author'], $_POST['chapo'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
    }
    else {
        home();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}