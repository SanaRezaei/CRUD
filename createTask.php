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
 $db = Database::connect ();
 $id_list = $_GET['id']; 
 echo $id;
 if ($_POST){
    try {
        // echo "value is: " . $_POST['title'];
        // read number of table rows
        $sql = "SELECT count(*) FROM Task"; 
        $result = $db->prepare($sql); 
        $result->execute(); 
        $rows = $result->fetchColumn(); 

        // // insert to table Task with id = number of rows +1
        $title = $_POST['title'];
        $sql = "INSERT INTO Task (id, title, statut, id_list) VALUES (?, ?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute([$rows +1, $_POST['title'], 0, $id_list]);
    }
    catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
}
 Database :: disconnect();
 ?>

<div class="container" style ="width:50%;">
<h3>Add task to list</h3>

<form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Task's Title</label>
    <input type="text" class="form-control" value="" name="title" id="title" >
  </div>
  <button type="submit" class="btn btn-primary">Create the Tasks</button>
</form>
</div>
</body>
</html>