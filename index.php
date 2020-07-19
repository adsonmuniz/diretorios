<?php

include 'view/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

if (isset($_GET['p'])) {
    $parent = $_GET['p'];
} else {
    $parent = 'null';
}

if ($page == 'home') {
    include 'view/home.php';
} else if ($page == 'edit') {
    include 'view/edit.php';
} else {
    include 'view/home.php';
}
include 'view/footer.php';

?>