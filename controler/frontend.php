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