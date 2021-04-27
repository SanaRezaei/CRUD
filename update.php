<?php
include "./database.php";
$pdo = Database ::connect ();
$sql = "UPDATE `List` SET name= '{$_POST['name']}',color='{$_POST['color']}";
$pdo -> query ($sql);
$req = $pdo -> query ("SELECT * FROM `List` WHERE id={$_GET ['id']} ");
$user = $req -> fetch();

Database :: disconnect();

?>

<form>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter your Name">
  </div>
  <div class="form-group">
    <label for="color">Color</label>
    <input type="color" class="form-control" id="color" placeholder="color">
  </div>
  <button type="submit" class="btn btn-primary">Modifier</button>
  <button type="submit" class="btn btn-primary">Supprimer</button>
  </form>