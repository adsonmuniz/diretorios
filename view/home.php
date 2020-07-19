<div class="items">
    <?php
        require_once 'controller/folderController.php';
        
        $controller = new FolderController();
        $obj = $controller->listar();
        
        while($row = mysqli_fetch_array($obj))
        {
            echo('<div class="item">
                <a href="#">'.$row['name'].'</a>
                <input type="button" value="Editar">
                <input type="button" value="Deletar">
            </div>');
        }
    ?>
</div>
<a id="btn_add_folder" class="button" href="?page=edit&p=null">Adicionar</a>