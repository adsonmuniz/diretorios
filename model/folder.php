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

    
    // logica para listar todos pastas raízes do banco
    public function listAll() {
        $query = "SELECT * FROM folder WHERE id_parent IS NULL OR id_parent = 0 order by name";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para listar todos pastas raízes do banco
    public function listAllChildrens() {
        $query = "SELECT * FROM folder WHERE id_parent = '$this->id' order by name";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    // logica para salvar a pasta no banco
    public function save() {
        $query = "INSERT INTO folder (id_parent, name) VALUES ('$this->id_parent','$this->name')";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para atualizar a pasta no banco
    public function update() {
        $query = "UPDATE folder SET name = '$this->name' WHERE id='$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para remover a pasta e suas sub-pastas do banco
    public function remove() {
        $arrayIds = array();
        array_push($arrayIds, $this->id);

        $arrayLenght = count($arrayIds);
        for($it=0; $it<$arrayLenght; $it++) {
            $query = "SELECT id FROM folder WHERE id_parent='$arrayIds[$it]'";
            $resultQuery = mysqli_query($this->connection(),$query);
            
            while($r = mysqli_fetch_array($resultQuery)) {
                array_push($arrayIds, $r['id']);
            }
            $arrayLenght = count($arrayIds);
        }
        foreach($arrayIds as $item) {
            $query = "DELETE FROM folder WHERE id='$item'";
            $resultQuery = mysqli_query($this->connection(),$query);
        }
        return $resultQuery;
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

    public function write_log($log_msg)
    {
        $log_filename = "logs";
        if (!file_exists($log_filename))
        {
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename.'/debug.log';
        file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
    
    }
}
?>