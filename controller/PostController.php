<?php

require_once('model/PostManager.php');

class PostController
{
    public function home()
    {
    	require('view/frontend/indexView.php');
    }

    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('view/frontend/listPostsView.php');
    }

    public function uniquePost($id)
    {
        $postManager = new PostManager();
        $posted = $postManager->getPost($id);

        if (!$posted) {
            throw new Exception('L\'article demandé n\'existe pas !');
        }
       
        require('view/frontend/postView.php');
    }

    public function createPostPage()
    {
        require('view/frontend/addPostView.php');
    }

    public function addPost($title, $author, $trailer, $content)
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

    public function modifyPostPage($id)
    {
        $postManager = new PostManager();
        $posted = $postManager->getPost($id);

        if (!$posted) {
            throw new Exception('L\'article demandé n\'existe pas !');
        }
        
        require('view/frontend/updatePostView.php');
    }

    public function updatePost($id, $title, $author, $trailer, $content)
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
}
