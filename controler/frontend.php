<?php

require_once('model/PostManager.php');

function home()
{
	require('view/frontend/indexView.php');
}

function listPosts()
{
    $postManager = new PostManager;
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post($id)
{
	$postManager = new PostManager;
    $post = $postManager->getPost($id);
   
    require('view/frontend/postView.php');
}

function createPost()
{
    require('view/frontend/addPostView.php');
}

function addPost($title, $author, $chapo, $content)
{
    $postManager = new PostManager();
    $addedPost = $postManager->Post($title, $author, $chapo, $content);

    require('view/frontend/addPostView.php');
}    

function modifyPost($id)
{
    $postManager = new PostManager();
    $posted = $postManager->getPost($id);
    
    require('view/frontend/updatePostView.php');
}

function updatePost($id, $title, $author, $chapo, $content)
{
    $postManager = new PostManager();
    $updatedPost = $postManager->modifPost($id, $title, $author, $chapo, $content);

    if ($updatedPost === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}  