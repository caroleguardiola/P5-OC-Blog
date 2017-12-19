<?php

namespace CaroleGuardiola\P5OCBlog\Model;

use \PDO;

class DBConnexion
{
    private static $db;

    public static function dbConnect()
    {
        $params = [
            'host'=>'localhost;',
            'dbname'=>'blog;charset=utf8',
            'username'=>'root',
            'password'=>''
        ];

        if(self::$db === null)
        {
            $db = new PDO('mysql:host='.$params['host'].'dbname='.$params['dbname'],
                    $params['username'],$params['password']
            );

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}
