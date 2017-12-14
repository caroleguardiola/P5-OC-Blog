<?php

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
        setlocale (LC_TIME, 'fr_FR','fra');
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
        setlocale (LC_TIME, 'fr_FR','fra');
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
        setlocale (LC_TIME, 'fr_FR','fra');
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
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
    
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
    }

    public function setContent($content)
    {
        $this->content = $content;
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
