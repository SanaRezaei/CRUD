<?php
include "./database.php";
$db = Database::connect ();
if ($_POST){
    $name = $_POST['name'];
    $color = $_POST['name'];
    $sql = "INSERT INTO `List`(name, color) VALUES ('{$name}','{$color}', ";
    $db->query($sql);
}
Database :: disconnect();

?>
<form method = "post">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="Name" value="<?=$List['name']?>">
    <label for="color" class="form-label">COLOR</label>
    <input type="text" name="Color">
    <input type="submit" value="Create">
</form>