<?php

class DB {

    private static $_bdd = false;

    public static function Connect() {
        if (!self::$_bdd) { 
            try {
                self::$_bdd = new PDO('mysql:dbname=' . SQL_DBNAME . ';host=' . SQL_HOST,
                    SQL_USERNAME,
                    SQL_PASSWORD,
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET names utf8',
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        return self::$_bdd;
    }
}