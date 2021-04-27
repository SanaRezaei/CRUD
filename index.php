<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
include "./database.php";
$db = Database :: connect ();
foreach ($db -> query (" SELECT * FROM `List`ORDER BY id")as $user){ ?>
    <h3>Salam</h3>
    <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <a href="#" class="btn btn-primary">Modifier</a>
      <a href="#" class="btn btn-primary">Supprimer</a>
    </div>
  </div> 
  <h3>Salam</h3>
<?php };
Database :: disconnect();
?>
</body>
</html>



