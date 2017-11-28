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
            if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['chapo']) && isset($_POST['content'])) {
                addPost($_POST['title'], $_POST['author'], $_POST['chapo'], $_POST['content']);
            }
            else{
                throw new Exception('Aucun formulaire envoyé');
            }
        }    
        elseif ($_GET['action'] == 'modifyPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                modifyPost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet à modifier envoyé');
            }
        }
        elseif ($_GET['action'] == 'updatePost') {
             if (isset($_GET['id']) && $_GET['id'] > 0) {
                 if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
                    updatePost($_GET['id'], $_POST['title'], $_POST['author'], $_POST['chapo'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs de modification ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé pour modification');
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