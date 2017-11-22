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