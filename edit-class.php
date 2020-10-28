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
<?php include("./navbar.php") ?>
    <?php 
        if(isset($_POST['class']) && isset($_POST['id']))
        {
           if(!empty($_POST['class']))
           {
            
                $query = "UPDATE classes set class = '{$_POST['class']}' where id = '{$_POST['id']}' ";
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
    <?php 
        if(isset($_GET["class_id"]))
        {
                $query = "SELECT * from classes where id = '{$_GET["class_id"]}'";
                $resultset = mysqli_query($link,$query);
                $class = mysqli_fetch_assoc($resultset);
        }
    ?>
    <div class = "container-fluid">
    <div class = "row">
        <div class = "col-lg-6">
            <form method = "POST">
                <div class = "form-group">
                 <label>Class Name</label>
                 <input name = "class" class = "form-control" placeholder = " Class name " value = "<?php echo   (isset($_POST["class"]) ? $_POST["class"] : 
                (isset($class["class"]) ? $class["class"] : '')) ?>">
                 <input name ="id" type = "hidden" value = "<?php echo (isset($class["id"]) ? $class["id"] : '') ?>"> 
                 </div>
                 <div class = "form-group">
                 <input type = "submit" class = " btn btn-primary" value = "update record">
                 </div>
            </form>
        </div>
    </div>
    
    </div>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>