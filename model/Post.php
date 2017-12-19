<?php

namespace CaroleGuardiola\P5OCBlog\Model;

class Post {

    private   $id;
    private   $title;
    private   $author;
    private   $trailer;
    private   $content;
    private   $dateCreation;
    private   $dateUpdate;
    private   $dateDelete;


    /**
    * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
    * @param $valeurs array Les valeurs à assigner
    * @return void
    */
    public function __construct($datas = [])
    {
        if (!empty($datas))
        {
            $this->hydrate($datas);
        }
    }
    
    // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value)
        {
            $method = 'set'. ucfirst($key);

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    //Getters

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTrailer()
    {
        return $this->trailer;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function getDateCreationFr()
    {
        //problème de config sur Windows
        $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($this->dateCreation)));
        $heureFr = utf8_encode(strftime('%Hh%M', strtotime($this->dateCreation)));
        return $dateFr . ' à ' . $heureFr;
    }

    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    public function getDateUpdateFr()
    {
        //problème de config sur Windows
        $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($this->dateUpdate)));
        $heureFr = utf8_encode(strftime('%Hh%M', strtotime($this->dateUpdate)));
        return $dateFr . ' à ' . $heureFr;
    }

    public function getDateDelete()
    {
        return $this->dateDelete;
    }
    public function getDateDeleteFr()
    {
        //problème de config sur Windows
        $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($this->dateDelete)));
        $heureFr = utf8_encode(strftime('%Hh%M', strtotime($this->dateDelete)));
        return $dateFr . ' à ' . $heureFr;
    }


    //Setters

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setTitle($title)
    {
        if (!is_string($title) || empty($title))
    {
        throw new Exception("Titre invalide");
        }else{   
            $this->title = $title;
        }
    }

    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author))
    {
        throw new Exception("Auteur invalide");
        }else{   
            $this->author = $author;
        }
    }
    
    public function setTrailer($trailer)
    {
       if (!is_string($trailer) || empty($trailer))
    {
        throw new Exception("Chapô invalide");
        }else{   
            $this->trailer = $trailer;
        }
    }

    public function setContent($content)
    {
        if (!is_string($content) || empty($content))
    {
        throw new Exception("Contenu invalide");
        }else{   
            $this->content = $content;
        }
    }
   
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }
   
    public function setdateDelete($dateDelete)
    {
        $this->dateDelete = $dateDelete;
    }

}
