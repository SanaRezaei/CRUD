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
    

    $db = Database::connect();

    $sql = "SELECT * FROM List where id=?"; 
    $result = $db->prepare($sql); 
    $result->execute([$id]); 
    $list = $result->fetch(); 

    

    if ($_POST){
        try{
            $name = $_POST['name'];
            $color = $_POST['color'];
            $sql = "UPDATE List SET name = '{$_POST['name']}', color = '{$_POST['color']}' WHERE id={$_GET['id']}";
            $db->query($sql);
            header('Location: index.php');
        }
        catch(Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    Database :: disconnect();
    ?>

<div class="container" style ="width:50%;">
<h3>Update the List</h3>
<form method="POST">
<div class="mb-3">
    <label for="name" class="form-label" >Name of the lists</label>
    <input type="text" name="name" id="name" value="<?php echo $list["name"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="color" class="form-label" >Color</label>
    <input type="color" name="color" id="color" value="<?php echo $list["color"]; ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

</body>
</html>






