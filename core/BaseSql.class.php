<?php

class BaseSql{

    private $table;
    private $pdo;
    private $columns;

    public function __construct(){

        try
        {
            $this->pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
        }
        catch(Exception $e)
        {
            die('Erreur SQL : '.$e->getMessage());
        }

        $this->table = strtolower(get_called_class());
  
    }

    public function setColumns(){
        $columnsExcluded = get_class_vars(get_class());
        $this->columns = array_diff_key(get_object_vars($this),$columnsExcluded);
    }

    public function save(){
        echo "Enregistrement <br>";
        $this->setColumns();
        print_r($this->columns);

        if($this->id){
            //Update
            $query_columns = array();
            foreach($this->columns as $key => $value){
             array_push($query_columns,$key."=:".$key);
            }
            $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(',',$query_columns));

            $query->execute($this->columns);
        } else{
            //Insert
            unset($this->columns['id']);
            $query = $this->pdo->prepare("INSERT INTO ".$this->table." (".
            implode(',',array_keys($this->columns))
            .") VALUES (:".
            implode(',:',array_keys($this->columns))
            .")");

            print_r("INSERT INTO ".$this->table." (".
            implode(',',array_keys($this->columns))
            .") VALUES (:".
            implode(',:',array_keys($this->columns))
            .")");

        $query->execute($this->columns);
        }
    }
}
