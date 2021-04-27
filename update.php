<?php
include "./database.php";
$id = $_GET['id']; 

$db = Database::connect();
if ($_POST){
    try{
        $db = Database::connect();
        $name = $_POST['name'];
        $color = $_POST['color'];
        $sql = "UPDATE List SET name = ?, color = ? WHERE id=?";
        $query = $db->prepare($sql);
        $query->execute([$name, $color, $id]);
    }
    catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
Database :: disconnect();

?>

<form method="POST">
  <label for="name" >Name of the lists</label>
  <input type="text" name="name" id="name">
  <label for="color" >Color</label>
  <input type="color" name="color" id="color">
  <input type="submit" value="Add to list" >
</form>