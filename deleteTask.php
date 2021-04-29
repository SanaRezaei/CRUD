<?php
include "./database.php";

header('Location: index.php');
$taskId = $_GET['id']; 

$db = Database::connect ();

try{
    $sql = "DELETE FROM Task WHERE id=$taskId ";
    $query = $db->prepare($sql);
    $query->execute();
}
catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

Database:: disconnect();
?>