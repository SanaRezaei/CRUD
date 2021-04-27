<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "./database.php";
$db = Database::connect ();
if ($_POST){
    $name = $_POST['name'];
    $color = $_POST['name'];
    $sql = "INSERT INTO `List`(name, color) VALUES ('{$name}','{$color}', ";
    $db->query($sql);
}?>
<form>
<div class="mb-3">
  <label for="Name" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
  <label for="color" class="form-label">Color</label>
  <input type="color" class="form-control" id="exampleInputPassword1">
</div>
<button type="submit" class="btn btn-primary">Create the List</button>
</form>
<?php
Database :: disconnect();
?>
</body>
</html>



