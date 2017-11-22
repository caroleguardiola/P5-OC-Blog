<?php

require('controler/frontend.php');

try
{
	if (!isset($_GET['action'])) 
	{
		home();
		die();
	}
	if ($_GET['action'] == 'listPosts') 
    {
        listPosts();
        die();
    }
    if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) 
    {
        post($_GET['id']);
        die();
    }

    echo 'Erreur 404';
}

catch(Exception $e)
{
	die('Erreur :' . $e-getMessage());
}