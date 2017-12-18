<?php

namespace CaroleGuardiola\P5OCBlog\Model;

use \PDO;

class PostManager extends Manager
{
	public function getListPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, trailer, content, dateCreation, dateUpdate, dateDelete FROM posts ORDER BY dateUpdate DESC LIMIT 0, 5');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\CaroleGuardiola\P5OCBlog\Model\Post');
        
        return $req->fetchAll();
    }
	
	public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, trailer, content, dateCreation, dateUpdate, dateDelete FROM posts WHERE id = :id');
        $req->bindValue(':id', (int) $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\CaroleGuardiola\P5OCBlog\Model\Post');

        return $req->fetch();
    }

	public function addNewPost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, author, trailer, content, dateCreation, dateUpdate, dateDelete) VALUES(:newtitle, :newauthor, :newtrailer, :newcontent, NOW(), NOW(), NULL)');

        $req->bindValue(':newtitle', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':newauthor', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':newtrailer', $post->getTrailer(), PDO::PARAM_STR);
        $req->bindValue(':newcontent', $post->getContent(), PDO::PARAM_STR);

        $req->execute();
    }

    public function updatePost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = :newtitle, author = :newauthor, trailer = :newtrailer, content = :newcontent, dateUpdate = NOW() WHERE id = :id');

        $req->bindValue(':newtitle', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':newauthor', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':newtrailer', $post->getTrailer(), PDO::PARAM_STR);
        $req->bindValue(':newcontent', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);

        $req->execute();
    }
}
