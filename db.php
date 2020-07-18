<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "directories";

$connection = mysqli_connect($server, $user, $password, $db);
$query = "select * from folders where id_parent is null";
$resultsHomeFolders = mysqli_query($connection, $query);

?>