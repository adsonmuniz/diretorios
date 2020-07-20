<?php
        if (isset($_GET['p'])) {
            $parent = $_GET['p'];
        } else {
            $parent = 'null';
        }
?>
<h2>Adicionar Pasta</h2>
<form method="post" action="controller/folderController.php">
    <input type="text" id="nomePasta" name="nomePasta" placeholder="NOME DA PASTA">
    <input type="hidden" id="idPai" name="idPai" value="<?php echo($parent) ?>">
    
    <input type="submit" value="Ok">
    <input type="button" value="Cancelar" onClick="JavaScript: window.history.back();">
</form>