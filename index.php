<?php

include 'view/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

if ($page == 'home') {
    include 'view/home.php';
} else if ($page == 'child') {
    include 'view/child.php';
} else if ($page == 'create') {
    include 'view/create.php'; 
} else if ($page == 'edit') {
    include 'view/edit.php';
} else if ($page == 'delete') {
    include 'view/delete.php';
 } else {
    include 'view/home.php';
}

include 'view/footer.php';

?>