<?php

class Usuario
{
    public  $ID_User     ;
    public  $Nome        ;
    public  $Senha       ;
    public  $Email       ;
    public  $Cpf         ;
    public  $Nasc        ;
    public  $Tel         ;
    public  $FotoPerfil  ;
    public  $Ativo       ;

    public function getAll(){
        try
        {
            $dao = new DAO;
            $sql = "SELECT * FROM `usuario`";
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        }
        catch(Exception $e)
        {
            throw new Exception("Error ao listar os usuários: ". $e->getMessage());
        }
    }
}