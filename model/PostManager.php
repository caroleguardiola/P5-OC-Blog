<?php

require_once('model/Manager.php');
require_once("model/Post.php");

class PostManager extends Manager
{
	public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, trailer, content, creation_date, update_date, delete_date FROM post ORDER BY creation_date DESC LIMIT 0, 5');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
        
        return $req->fetchAll();
    }
	
	public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, trailer, content, creation_date, update_date, delete_date FROM post WHERE id = :id');
        $req->bindValue(':id', (int) $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');

        return $req->fetch();
    }

	public function addNewPost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(title, author, trailer, content, creation_date, update_date, delete_date) VALUES(:newtitle, :newauthor, :newtrailer, :newcontent, NOW(), NOW(), NULL)');

        $req->bindValue(':newtitle', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':newauthor', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':newtrailer', $post->getTrailer(), PDO::PARAM_STR);
        $req->bindValue(':newcontent', $post->getContent(), PDO::PARAM_STR);

        $req->execute();
    }

    public function updatePost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET title = :newtitle, author = :newauthor, trailer = :newtrailer, content = :newcontent, update_date = NOW() WHERE id = :id');

        $req->bindValue(':newtitle', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':newauthor', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':newtrailer', $post->getTrailer(), PDO::PARAM_STR);
        $req->bindValue(':newcontent', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);

        $req->execute();
    }
}