<?php

class Folder {
    private $id;
    private $id_parent;
    private $name;

    /**
     * getters e setters
     */
    public function getId() {
        return $this->id;
    }

    public function setId($identity) {
        $this->id = $identity;
    }

    public function getIdParent() {
        return $this->id_parent;
    }

    public function setIdParent($identity) {
        $this->id_parent = $identity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($nome) {
        $this->name = $nome;
    }


    // logica para salvar a pasta no banco
    public function save() {
        $query = "INSERT INTO folder (id_parent, name) VALUES ('$this->id_parent','$this->name')";
        $resultQuery = mysqli_query($this->connection(),$query);
    }
    
    // logica para atualizar a pasta no banco
    public function update() {
        $query = "UPDATE folder SET name = '$this->name' WHERE id='$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
    }
    
    // logica para remover a pasta do banco
    public function remove() {
        $query = "DELETE FROM folder WHERE id='$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
    }
    
    // logica para listar todos pastas raízes do banco
    public function listAll() {
        $query = "SELECT * FROM folder WHERE id_parent IS NULL";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para listar todos pastas raízes do banco
    public function listAllChildrens() {
        $query = "SELECT * FROM folder WHERE id_parent = '$this->id_parent'";
        $resultQuery = mysqli_query($this->connection(),$query);
    }

    // Connection
    public function connection() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "directories";

        $connection = mysqli_connect($server, $user, $password, $db);
        return $connection;
    }
}
?>