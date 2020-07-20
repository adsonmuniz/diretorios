<div class="items">
    <?php
        require_once 'controller/folderController.php';
        
        $controller = new FolderController();
        $obj = $controller->listar();

        if (mysqli_num_rows($obj) == 0) {
            echo('<label>Não existe nenhuma pasta.</label>');
        }
        
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