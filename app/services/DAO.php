<?php

class DAO
{
    private $pdo = null;
    function.connect(){
        try
        {
            $pdo = new PDO(DRIVE.":host=".HOST.";port=".PORT.";dbname=".DB , USER, PASS);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo ("<b>Error PDO:</b> ". $e->getMessage()."</br");
        }
    }
}