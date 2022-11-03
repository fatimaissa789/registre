<?php
namespace GLSIDFramwork;

class MessageAcess implements modele
{
    private $connection ;
    public function __construct()
    {
        $cnx = new connection();
        $this->connection = $cnx->getConnection();
    }


    public function Insert($object)
    {
        $stm = $this->connection->prepare("insert into message values (?,?,?,?,?)");
        $stm->bindValue(1,null);
        $stm->bindValue(2,$object->getRefusersrc());
        $stm->bindValue(3,$object->getRefuserdest());
        $stm->bindValue(4,$object->getMessage());
        $stm->bindValue(5,$object->getDate());
        $stm->execute();
        return $this->connection->lastInsertId();
    }
    public function SearchMyReciveMesg($id)
    {
        $stm = $this->connection->prepare("select * from message where refuserdest = ? order by 1 desc");
        $stm->bindValue(1,$id);
        $stm->execute();
        $message = $stm->fetchAll();
        return $message;
    }
    public function SearchMyMesgSend($id)
    {
        $stm = $this->connection->prepare("select * from message where refusersrc = ? order by 1 desc");
        $stm->bindValue(1,$id);
        $stm->execute();
        $message = $stm->fetchAll();
        return $message;
    }
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function Search($id)
    {
        // TODO: Implement Search() method.
    }

    public function Update($object, $id)
    {
        // TODO: Implement Update() method.
    }

    public function Delete($id)
    {
        // TODO: Implement Delete() method.
    }
}