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
foreach ($db -> query (" SELECT * FROM `List` ORDER BY id")as $user){ ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title" style= "<?php echo "background-color: {$user['color']};"?>"><?php echo $user['name']?></h5>
    <a href="./update.php" class="btn btn-primary">Modifier</a>
    <a href="./delete.php" class="btn btn-primary">Supprimer</a>
  </div>
</div>
<?php };
Database :: disconnect();
?>
</body>
</html>



