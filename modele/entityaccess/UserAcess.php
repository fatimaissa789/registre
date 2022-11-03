<?php
namespace GLSIDFramwork;
include 'modele/access/connection.php';
include 'modele/entityaccess/modele.php';

class UserAcess implements modele
{
    private $connection ;
    public function __construct()
    {
        $cnx = new connection();
        $this->connection = $cnx->getConnection();
    }

    public function getAll()
    {
        $stm = $this->connection->query("select * from user ");
        $users = $stm->fetchAll();
        return $users;
    }
    public function getAllSaufMe($id)
    {
        $stm = $this->connection->prepare("select * from user where id != ? ");
        $stm->bindValue(1,$id);
        $stm->execute();
        $users = $stm->fetchAll();
        return $users;
    }

    public function usernameexiste($username){
        $stm = $this->connection->prepare("select * from user where username = ? ");
        $stm->bindValue(1,$username);
        $stm->execute();
        $users = $stm->fetchAll();
        return $users;
    }

    public function SearchByusername($string ,$id)
    {
        $stm = $this->connection->prepare("select * from user where ( username like ? or email like ? ) and (id != ?) ");
        $stm->bindValue(1,'%'.$string.'%');
        $stm->bindValue(2,'%'.$string.'%');
        $stm->bindValue(3,$id);
        $stm->execute();
        $users = $stm->fetchAll();
        return $users ;
    }

    public function Search ($id){

    }

    public function Authe($username , $password)
    {
        $stm = $this->connection->prepare("select * from user where username = ? and password = ? ");
        $stm->bindValue(1,$username);
        $stm->bindValue(2,$password);
        $stm->execute();
        $user = $stm->fetch();
        return $user;
    }

    public function Insert($object)
    {
        $stm = $this->connection->prepare("insert into user values (?,?,?,?,?,?,?,?,?)");
        $stm->bindValue(1,null);
        $stm->bindValue(2,$object->getEmail());
        $stm->bindValue(3,$object->getUsername());
        $stm->bindValue(4,$object->getPassword());
        $stm->bindValue(5,$object->getType());
        $stm->bindValue(6,$object->getNumerotele());
        $stm->bindValue(7,$object->getNationalite());
        $stm->bindValue(8,$object->getSexe());
        $stm->bindValue(9,1);
        $stm->execute();
        return $this->connection->lastInsertId();

    }

    public function Update($object,$id)
    {
        $stm = $this->connection->prepare("update user set  email = ? , username = ? , numerotele = ? , nationalite = ? , sexe = ?   where id = ?");
        $stm->bindValue(1,$object->getEmail());
        $stm->bindValue(2,$object->getUsername());
        $stm->bindValue(3,$object->getNumerotele());
        $stm->bindValue(4,$object->getNationalite());
        $stm->bindValue(5,$object->getSexe());
        $stm->bindValue(6,$id);
        return $stm->execute();
    }
    public function UpdatePassword($id,$nvpassword)
    {
        $stm = $this->connection->prepare("update user set  password = ?  where id = ?");
        $stm->bindValue(1,$nvpassword);
        $stm->bindValue(2,$id);

        return $stm->execute();
    }

    public function ActiveSuspendue($id)
    {
        $stm = $this->connection->prepare("update user set  etat = ?  where id = ?");
        $stm->bindValue(1,0);
        $stm->bindValue(2,$id);
        return $stm->execute();
    }



    public function Debloquer($id)
    {
        $stm = $this->connection->prepare("update user set  etat = ?  where id = ?");
        $stm->bindValue(1,1);
        $stm->bindValue(2,$id);
        return $stm->execute();
    }


    public function RendreAdmin($id){
        $stm = $this->connection->prepare("update user set  type = ?  where id = ?");
        $stm->bindValue(1,'admin');
        $stm->bindValue(2,$id);
        return $stm->execute();
    }

    public function Delete($id)
    {
        $stm = $this->connection->prepare("delete from user where id = ?");
        $stm->bindValue(1,$id);
        return $stm->execute();
    }
}