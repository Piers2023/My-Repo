<?php
class Database{
    private $host;
    private $dbname ;
    private $username ;
    private $password;
    private $pdo;

    private $result;

    public function __construct($host, $dbname, $username, $password){
            $this->host=$host;
            $this->dbname=$dbname;
            $this->username=$username;
            $this->password=$password;

            try{ 
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $message){
                die("connection failed".$message->getMessage());
            }
        }
        public function executeQuery(
            $param=[]
        ){
            try{
                $this->result->execute($param);

            }catch(PDOException $message){
            die("fail sql".$message->getMessage());
        }

        
    }public function executeInsert($sql){
            $this->result = $this->pdo->prepare($sql);
    }
    public function rowCount(){
        return $this->result->rowCount();
    }
    public function fetchAll(){
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function Query($sql){
        $this->result = $this->pdo->query($sql);
    }

    public function Execute(){
        $this->result->execute();
    }
}
$db = new Database("localhost", "SProject", "root", "");
?>