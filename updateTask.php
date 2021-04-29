<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
  include "./database.php";
  $id = $_GET['id'];
  $db = Database::connect ();

  $sql = "SELECT * FROM Task where id=?"; 
  $result = $db->prepare($sql); 
  $result->execute([$id]); 
  $task = $result->fetch(); 
  if ($_POST){
    $title = $_POST['title'];
    $sql = "UPDATE Task SET title='{$_POST['title']}' WHERE id='{$id}'";
    $db->query($sql);
    header('Location: index.php');
  }

  Database :: disconnect();
?>

<div class="container" style ="width:50%;">
<form method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Task's Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<?php echo $task["title"]; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Edit the Tasks</button>
</form>
</div>
</body>
</html>