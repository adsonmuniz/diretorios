<?php
if (isset($_POST['nomePasta']) || isset($_POST['editPasta']) || isset($_POST['deletePasta'])) {
    require_once '../model/folder.php';
} else {
    require_once 'model/folder.php';
}
  
class FolderController {
 
    public function listar() {
        $folder = new Folder();
        $folders = $folder->listAll();
        return $folders;
    }

    public function listarFilhos($p) {
        $folder = new Folder();
        $folder->setId($p);

        $folders = $folder->listAllChildrens();
        return $folders;
    }

    public function inserir() {
        $folder = new Folder();
        $f = addslashes($_POST['nomePasta']);
        $ip = $_POST['idPai'];

        $folder->setName($f);
        $folder->setIdParent($ip);

        $result = $folder->save();
        return $result;
    }

    public function editar() {
        $folder = new Folder();
        $f = addslashes($_POST['editPasta']);
        $i = $_POST['idPasta'];

        $folder->setName($f);
        $folder->setId($i);

        $result = $folder->update();
        return $result;

    }

    public function deletar() {
        $folder = new Folder();
        $i = $_POST['idPasta'];

        $folder->setId($i);

        $result = $folder->remove();
        return $result;
    }
}

$classFolderController = new FolderController();

if (isset($_POST['nomePasta'])) {
    $ip = $_POST['idPai'];
    $obj = $classFolderController->inserir();
    
    //echo("<script>console.log('Debug Objects: " . $obj . "' );</script>");
    if ($ip == 'null' || $ip == 0) {
        header('location:../index.php?page=home');
    } else {
        header('location:../index.php?page=child&p='.$ip);
    }
} else if (isset($_POST['editPasta'])) {
    $ip = $_POST['idPai'];
    $obj = $classFolderController->editar();
    if ($ip == 'null' || $ip == 0) {
        header('location:../index.php?page=home');
    } else {
        header('location:../index.php?page=child&p='.$ip);
    }
} else if (isset($_POST['deletePasta'])) {
    $ip = $_POST['idPai'];
    $obj = $classFolderController->deletar();
    if ($ip == 'null' || $ip == 0) {
        header('location:../index.php?page=home');
    } else {
        header('location:../index.php?page=child&p='.$ip);
    }
}

?>