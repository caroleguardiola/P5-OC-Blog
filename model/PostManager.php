<?php

require_once('model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
	    $db = $this->dbConnect();
	    $req = $db->query('SELECT id, title, author, chapo, content, DATE_FORMAT(update_date, \'%d/%m/%Y\') AS update_date_fr, chapo FROM posts ORDER BY update_date DESC LIMIT 0, 5');

	    return $req;
	}
	
	public function getPost($postId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, author, chapo, content, DATE_FORMAT(update_date, \'%d/%m/%Y\') AS update_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}
}