<?php

include 'db.php';
include 'header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

if ($page == 'folder') {
    include 'folder.php';
} else if ($page == 'edit') {
    include 'masterdata/edit.php';
} else {
    include 'folder.php';
}
include 'footer.php';

?>