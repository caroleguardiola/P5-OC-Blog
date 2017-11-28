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

	public function Post($title, $author, $chapo, $content)
    {
        $db = $this->dbConnect();
        $new_post = $db->prepare('INSERT INTO posts(title, author, chapo, content, creation_date) VALUES(?, ?, ?, ?, NOW())');
        $addedPost = $new_post->execute(array($title, $author, $chapo, $content));

        return $addedPost;
    }

    public function modifPost($postId, $title, $author, $chapo, $content)
    {
        $db = $this->dbConnect();
        $modified_post = $db->prepare('UPDATE posts SET id = :postId, title = :newtitle, author = :newauthor, chapo = :newchapo, content = :newcontent, update_date = NOW() WHERE id = :postId');
        $updatePost = $modified_post->execute(array(
            ':postId' => $postId,
            ':newtitle' => $title, 
            ':newauthor' => $author, 
            ':newchapo' => $chapo, 
            ':newcontent' => $content
            ));

        return $updatePost;
    }
}