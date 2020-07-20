<div class="items">
    <?php
        require_once 'controller/folderController.php';
        
        $controller = new FolderController();
        $obj = $controller->listar();
        
        while($row = mysqli_fetch_array($obj))
        {
            echo('<div class="item">
                <a href="?page=child&p='.$row['id'].'">'.$row['name'].'</a>
                <a class="button" href="?page=edit&i='.$row['id'].'&p='.$row['id_parent'].'">Editar</a>
                <a class="button" href="?page=delete&i='.$row['id'].'&p='.$row['id_parent'].'">Deletar</a>
            </div>');
        }
    ?>
</div>
<a id="btn_add_folder" class="button" href="?page=create&p=null">Adicionar</a>