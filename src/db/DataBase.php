<?php
class DataBase
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;

    private $db;
    private $stm;
    private $error;

    public function __construct()
    {
        $dsn = "mysql:host" . $this->host . ";dbname=" . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->db = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql){
        $this->stm = $this->db->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stm->bindValue($param, $value, $type);
        return $this->stm;
    }

    public function execute()
    {
       return $this->stm->execute();
    }

    public function getResultSet(){
        if($this->execute()){
            echo true;
        } else{
            echo false;
        }
       return $this->stm->fetchAll(PDO::FETCH_OBJ);
    }
public function getStm($sql){
    return $this->db->prepare($sql);
}
}
