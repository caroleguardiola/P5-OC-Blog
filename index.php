<?php

require_once ('config/config.php');

use \CaroleGuardiola\P5OCBlog\Model\DBConnexion;
use \CaroleGuardiola\P5OCBlog\Controller\PostController;
use \CaroleGuardiola\P5OCBlog\Controller\ContactFormController;

try {

        $db = DBConnexion::dbConnect();
        $controller = new PostController($db);
        $controllerContact = new ContactFormController();

        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                $controller->listPosts();
            }
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller->uniquePost($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'creationPost') {
                $controller->createPostPage();
                }
            elseif ($_GET['action'] == 'addPost') {
                if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['trailer']) && isset($_POST['content'])) {
                    $controller->addPost($_POST['title'], $_POST['author'], $_POST['trailer'], $_POST['content']);
                }
                else {
                    throw new Exception('Aucun formulaire envoyé');
                }
            }    
            elseif ($_GET['action'] == 'modifyPost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller->modifyPostPage($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de billet à modifier envoyé');
                }
            }
            elseif ($_GET['action'] == 'updatePost') {
                 if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller->updatePost($_GET['id'], $_POST['title'], $_POST['author'], $_POST['trailer'], $_POST['content']);
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé pour modification');
                }
            }
            elseif ($_GET['action'] == 'addContact') {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
                    $controllerContact->contact($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
                }
                else{
                    throw new Exception('Aucun formulaire de contact envoyé');
                }
            }
            else {
                $controllerContact->home();
            }    
        }
        else {
            $controllerContact->home();
        }
}
catch(Exception $e) {
    require ('view/frontend/errorsView.php');
}
