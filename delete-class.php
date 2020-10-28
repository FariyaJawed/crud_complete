<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
    <?php require_once("./connection.php") ?>
<body>
<?php
    if(isset($_GET['class_id']))
    {
        if(!empty($_GET['class_id']))
        {
            $query = "DELETE from classes where id  = '{$_GET['class_id']}' ";
            $result = mysqli_query($link,$query);
            if(mysqli_errno($link))
            {
                
                echo mysqli_error($link);
            }
            if($result)
            {
                header("location:http://localhost/p2c4/crud%20assignment%202/classes.php");
            }
        }
    }
?>
</body>
</html>