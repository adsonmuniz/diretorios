<?php
        if (isset($_GET['i'])) {
            $idP = $_GET['i'];
        } else {
            $idP = 'null';
        }

        if (isset($_GET['p'])) {
            $parent = $_GET['p'];
        } else {
            $parent = 'null';
        }
?>
<h2>Editar Pasta</h2>
<form method="post" action="controller/folderController.php">
    <input type="text" id="editPasta" name="editPasta" placeholder="Nome do pasta">
    <input type="hidden" id="idPasta" name="idPasta" value="<?php echo($idP) ?>">
    <input type="hidden" id="idPai" name="idPai" value="<?php echo($parent) ?>">
    
    <input type="submit" value="Ok">
    <input type="button" value="Cancelar" onClick="JavaScript: window.history.back();">
</form>