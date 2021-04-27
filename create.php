<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
  <label for="Name" >Name of the lists</label>
  <input type="text" name="Name" id="Name">
  <label for="color" >Color</label>
  <input type="color" name="color" id="color">
<input type="submit" value="Add to list" >
</form>

<?php
include "./database.php";
$db = Database::connect ();
if ($_POST){

    try {
        // read number of table rows
        $sql = "SELECT count(*) FROM List"; 
        $result = $db->prepare($sql); 
        $result->execute(); 
        $number_of_rows = $result->fetchColumn(); 

        // insert to table with id = number of row +1
        $name = $_POST['Name'];
        $color = $_POST['color'];
        $id = $number_of_rows+1;
        $sql = "INSERT INTO List (id, name, color) VALUES (?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute([$id, $name, $color]);
    }
    catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
}
Database :: disconnect();
?>


</body>
</html>



