<?php
header('Location: index.php');
include "./database.php";
$pdo = Database :: connect ();
$pdo -> query("DELETE FROM `List`WHERE id_table={$_GET['id']} ");
Database:: disconnect();
?>