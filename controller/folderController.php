<?php
require_once 'model/folder.php';
  
class FolderController {
 
    public function listar() {
        $folder = new Folder();
        $folders = $folder->listAll();
        return $folders;
    }

    public function inserir() {
        $folder = new Folder();
        $f = $_POST['nomePasta'];
        $ip = $_POST['idPai'];

        $folder->setName($f);
        $folder->setParent($ip);

        $folder->save();
    }
}
?>