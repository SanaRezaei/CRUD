<?php
include "./database.php";

header('Location: index.php');
$id = $_GET['id']; 

$db = Database::connect ();

try{
    $sql = "DELETE FROM List WHERE id=$id ";
    
    $query = $db->prepare($sql);
    
    $query->execute();
    
}
catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

Database:: disconnect();
?>