<?php
require('controler/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                uniquePost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'creationPost') {
            createPostPage();
            }
        elseif ($_GET['action'] == 'addPost') {
            if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['trailer']) && isset($_POST['content'])) {
                addPost($_POST['title'], $_POST['author'], $_POST['trailer'], $_POST['content']);
            }
            else{
                throw new Exception('Aucun formulaire envoyé');
            }
        }    
        elseif ($_GET['action'] == 'modifyPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                modifyPostPage($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet à modifier envoyé');
            }
        }
        elseif ($_GET['action'] == 'updatePost') {
             if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePost($_GET['id'], $_POST['title'], $_POST['author'], $_POST['trailer'], $_POST['content']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé pour modification');
            }
        }
        elseif ($_GET['action'] == 'addContact') {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
                contact($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
            }
            else{
                throw new Exception('Aucun formulaire de contact envoyé');
            }
        }
        else {
            home();
        }    
    }
    else {
        home();
    }
}
catch(Exception $e) {
    /*echo 'Erreur : ' . $e->getMessage();*/
    require ('view/frontend/errorsView.php');
}