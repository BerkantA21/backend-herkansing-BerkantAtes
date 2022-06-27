<?php
require('../config/config.php');

class Database
{

    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $statement;


    public function __construct()
    {

         $conn = "mysql:host=$this->dbHost;dbname=$this->dbName;charset=UTF8;";
         $options = array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try{
         $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass);
        } catch(PDOException $e){
            var_dump($e);
            echo $e->getMessage();
        }
    } 

    public function query($sql)
    {
       $this->statement = $this->dbHandler->prepare($sql);
    }

    public function selectAll()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function bind($parameter, $value, $type)
    {
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute()
    {
        return $this->statement->execute();
    }
}

?>