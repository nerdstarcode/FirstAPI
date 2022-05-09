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
     public function get($id){
        try{
            $sql = "select * from usuario where ID_User = :id";
            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            $result = $stman->fetchALL();
            return $result;
        }catch(Exception $e){
            throw new Exception("Erro ao pegar o usuario: ". $e->getMessage());
        }
    }
    public function add(){
        try{
            $sql = "
                INSERT INTO Usuario 
                    (ID_User, Nome, Nasc, Cpf, Email, Senha, Tel, FotoPerfil, Ativo)
                VALUES
                    (null, :Nome, :Nasc, :Cpf, :Email, :Senha, :Tel, :FotoPerfil, :Ativo)
            ";
            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":nome", $this->$nome);
            $stman->bindParam(":Nasc", formatDateBD($this->$Nasc));
            $stman->bindParam(":Cpf", $this->$Cpf);
            $stman->bindParam(":Email", $this->$Email);
            $stman->bindParam(":Senha", md5($this->$Senha));
            $stman->bindParam(":Tel", $this->$Tel);
            $stman->bindParam(":FotoPerfil", $this->$FotoPerfil);
            $stman->bindParam(":Ativo", $this->$Ativo);
            $stman->execute();
        }
    }catch(Exception $e){
        throw new Exception("Erro ao cadastrar o usuario: ". $e->getMessage());
    }
    private formatDateBD($date){
        var partDate = explode("/", $date);
        return new DateTime($partDate[2]."-".$partDate[1]."-".$partDate[0];
    }
}