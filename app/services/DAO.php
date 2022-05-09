<?php

class DAO
{
    private $pdo = null;
    function connect(){
        try
        {
            $pdo = new PDO(DRIVE.":host=".HOST.";port=".PORT.";dbname=".DB , USER, PASS);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES utf8");

        }
        catch(PDOException $e)
        {
            echo ("<b>Error PDO:</b> ". $e->getMessage()."</br");
        }
        return $pdo;
    }
}