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

<div class="container" style ="width:50%;">
    <form method="POST">
    <div class="mb-3">
        <label for="Name" class="form-label" >Name of the lists</label>
        <input type="text" name="Name" id="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="color" class="form-label" >Color</label>
        <input type="color" name="color" id="color" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>




<?php
include "./database.php";
$db = Database::connect ();
if ($_POST){

    try {
        // read number of table rows
        $sql = "SELECT count(*) FROM List"; 
        $result = $db->prepare($sql); 
        $result->execute(); 
        $number_of_rows = $result->fetchColumn(); 

        // insert to table with id = number of row +1
        $name = $_POST['Name'];
        $color = $_POST['color'];
        $id = $number_of_rows;
        $sql = "INSERT INTO List (id, name, color) VALUES (?, ?, ?)";
        $query = $db->prepare($sql);
        $query->execute([$id, $name, $color]);
        header('Location: index.php');
    }
    catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
}
Database :: disconnect();
?>


</body>
</html>



