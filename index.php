<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/603ede4b84.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
include "./database.php";
$db = Database :: connect ();
foreach ($db -> query (" SELECT * FROM List ORDER BY id")as $list){ ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title" style= "<?php echo "background-color: {$list['color']};"?>"><?php echo $list['name']; ?> <a href="./createTask.php?id=<?php echo $list['id']; ?>"><i class="fas fa-plus-square"></i></a></h5>
    <li class="list-group-item">
      <?php
        foreach ($db -> query (" SELECT * FROM Task where id_list=$list[id]")as $task){
          // echo "<p> selected task: " . $task['title'];  
      ?>
      
      <input class="form-check-input me-1" type="checkbox" value="" <?php if ($task['statut'] == 1) echo " checked"; ?> >
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      <i class="far fa-trash-alt"></i>
      <?php echo $task['title'] . "<br>"; ?>
      
      <?php } ?>
    </li>
    <a href="./update.php?id=<?php echo $list['id'];?>" class="btn btn-primary">Modifier</a>
    <a href="./delete.php?id=<?php echo $list['id']; ?>" class="btn btn-primary">Supprimer</a>
  </div>
</div>
<?php 
};
Database :: disconnect();
?>

<a class="btn btn-primary" href="./create.php" role="button">Create new list</a>
<a class="btn btn-primary" href="./createTask.php" role="button">Add Task</a>
</body>
</html>



