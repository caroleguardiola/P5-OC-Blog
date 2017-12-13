<?php

require_once('model/PostManager.php');

class PostController
{
    function home()
    {
    	require('view/frontend/indexView.php');
    }

    function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('view/frontend/listPostsView.php');
    }

    function uniquePost($id)
    {
        $postManager = new PostManager();
        $posted = $postManager->getPost($id);

        if (!$posted) {
            throw new Exception('L\'article demandé n\'existe pas !');
        }
       
        require('view/frontend/postView.php');
    }

    function createPostPage()
    {
        require('view/frontend/addPostView.php');
    }

    function addPost($title, $author, $trailer, $content)
    {
        $errors = [];

        if (empty($_POST['title']) || !is_string($_POST['title'])) {
            $errors['title'] = "Vous n'avez pas renseigné le titre ou le titre est invalide !";
        }
        if (empty($_POST['author']) || !is_string($_POST['author'])) {
            $errors['author'] = "Vous n'avez pas renseigné l'auteur ou l'auteur est invalide !";
        }
        if (empty($_POST['trailer']) || !is_string($_POST['trailer'])) {
            $errors['trailer'] = "Vous n'avez pas renseigné le chapô ou le chapô est invalide !";
        }
        if (empty($_POST['content']) || !is_string($_POST['content'])) {
            $errors['content'] = "Vous n'avez pas renseigné le contenu ou le contenu est invalide !";
        }

        session_start();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('Location: index.php?action=creationPost');
        }else{

        $post = new Post([
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'trailer' => $_POST['trailer'],
            'content' => $_POST['content']
        ]);
        $postManager = new PostManager();
        $addedPost = $postManager->addNewPost($post);

        $_SESSION['success'] = 1;
        
        header('Location: index.php?action=creationPost');
        }
    }

    function modifyPostPage($id)
    {
        $postManager = new PostManager();
        $posted = $postManager->getPost($id);

        if (!$posted) {
            throw new Exception('L\'article demandé n\'existe pas !');
        }
        
        require('view/frontend/updatePostView.php');
    }

    function updatePost($id, $title, $author, $trailer, $content)
    {
        $errors = [];

        if (empty($_POST['title']) || !is_string($_POST['title'])) {
            $errors['title'] = "Vous n'avez pas renseigné le titre à modifier ou le titre est invalide !";
        }
        if (empty($_POST['author']) || !is_string($_POST['author'])) {
            $errors['author'] = "Vous n'avez pas renseigné l'auteur à modifier ou l'auteur est invalide !";
        }
        if (empty($_POST['trailer']) || !is_string($_POST['trailer'])) {
            $errors['trailer'] = "Vous n'avez pas renseigné le chapô à modifier ou le chapô est invalide !";
        }
        if (empty($_POST['content']) || !is_string($_POST['content'])) {
            $errors['content'] = "Vous n'avez pas renseigné le contenu à modifier ou le contenu est invalide !";
        }

        session_start();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('Location: index.php?action=modifyPost&id=' . $id);
        }else{

        $post = new Post([
            'id' => $_GET['id'],
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'trailer' => $_POST['trailer'],
            'content' => $_POST['content']
        ]);
        $postManager = new PostManager();
        $updatedPost = $postManager->updatePost($post);

        $_SESSION['success'] = 1;
        
        header('Location: index.php?action=modifyPost&id=' . $id);
        }
    }

    function contact($name, $email, $subject, $message)
    {
        $errors = [];

        if (!array_key_exists('name', $_POST) || $_POST['name'] == '') {
            $errors['name'] = "Vous n'avez pas renseigné votre nom !";
        }
        if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Vous n'avez pas renseigné un e-mail valide !";
        }
        if (!array_key_exists('subject', $_POST) || $_POST['subject'] == '') {
            $errors['subject'] = "Vous n'avez pas renseigné votre sujet !";
        }
        if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
            $errors['message'] = "Vous n'avez pas renseigné votre message !";
        }

        session_start();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('Location: index.php#contact');
        }else{

            require_once ('vendor/autoload.php');

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
              ->setUsername('b27e28fd280c0a')
              ->setPassword('c42bb4f945f63d')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($_POST['subject']))
              ->setFrom([$_POST['email'] => $_POST['name']])
              ->setTo(['carole.guardiola@gmail.com' => 'Carole Guardiola'])
              ->setBody($_POST['message'])
              ;

            // Send the message
            $result = $mailer->send($message);

            $_SESSION['success'] = 1;
            header('Location: index.php#contact');
        }
    }
}