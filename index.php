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
}

catch(Exception $e)
{
	die('Erreur :' . $e-getMessage());
}