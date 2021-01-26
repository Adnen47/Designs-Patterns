<?php
/**
 * Objet Model
 * Permet les intéractions avec la base de donnée
 * */
class Model{
    
    public $table;
    public $id;
    public $mysqli;
    
    public function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "tiger", "tutoriel", 5432);
        /* Vérification de la connexion */
        if ($this->mysqli->connect_errno) {
            printf("Échec de la connexion : %s\n", $this->mysqli->connect_error);
            exit();
        }
    }
    /**
     * Lit une ligne dans la base de donnée par rapport à l'ID de l'objet
     * @param $fields Liste des champs à récupérer
     * */
    public function read($fields=null){
        if($fields==null){            $fields = "*";        }
        $sql = "SELECT $fields FROM ".$this->table." WHERE id=".$this->id ;
        $req = $this->mysqli->query($sql) or die($this->mysqli->connect_error."<br/> => ".$this->mysqli->error);
        $data = $req->fetch_assoc();
        foreach($data as $k=>$v){
            $this->$k = $v;
        }
    }
    
    /**
     * Sauvegarde les donnée passé en paramètre dans la base de donnée
     * @param $data Donnée à sauvegarder
     * */
    public function save($data){
        if(isset($data["id"]) && !empty($data["id"])){
            $sql = "UPDATE ".$this->table." SET ";
            foreach($data as $k=>$v){
                if($k!="id"){
                    $sql .= "$k='$v',";
                }
            }
            $sql = substr($sql,0,-1);
            $sql .= "WHERE id=".$data["id"];
        }
        else{
            $sql = "INSERT INTO ".$this->table."(";
            unset($data["id"]);
            foreach($data as $k=>$v){
                    $sql .= "$k,";
            }
            $sql = substr($sql,0,-1);
            $sql .=") VALUES (";
            foreach($data as $v){
                    $sql .= "'$v',";
            }
            $sql = substr($sql,0,-1);
            $sql .= ")";
        }
        $this->mysqli->query($sql) or die($this->mysqli->connect_error."<br/> => ".$this->mysqli->error);
        if(!isset($data["id"])){
            $this->id=$this->mysqli->insert_id;
        }
        else{
            $this->id = $data["id"];
        }
    }
    
    /**
     * Permet de récupérer plusieurs ligne dans la BDD
     * @param $data conditions de récupérations
     * */
    public function find($data=array()){
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "id DESC";
            extract($data);
            if(isset($data["limit"])){ $limit = "LIMIT ".$data["limit"]; }
            $sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
            $req = $this->mysqli->query($sql) or die($this->mysqli->connect_error."<br/> => ".$sql);
            $d = array();
            while($data = $req->fetch_assoc()){
                $d[] = $data;
            }
            return $d;
    }
    
    /**
     * Permet de supprimer une ligne dans la base de donnée
     * @param $id ID de la ligne à supprimer
     * */
    public function del($id=null){
        if($id==null){ $id = $this->id; }
        $sql = "DELETE FROM ".$this->table." WHERE id=$id";
        $this->mysqli->query($sql) or die($this->mysqli->connect_error."<br/> => ".$this->mysqli->error);
    }
    
    /**
     * Permet de faire une requête complexe
     * @param $sql Requête a effectuer
     * */
        public function query($sql){
            $req = $this->mysqli->query($sql) or die($this->mysqli->connect_error."<br/> => ".$sql);
            $d = array();
            while($data = $req->fetch_assoc()){
                $d[] = $data;
            }
            return $d; 
        }
    
    /**
     * Permet de charger un model
     * @param $name Nom du model à charger
     * */
    static function load($name){
        require("$name.php");
        return new $name();
    }
    
    
}
?>