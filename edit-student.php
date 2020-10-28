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
        if(isset($_POST['submit']))
        {
          
            
                $query = "UPDATE students set student_name = '{$_POST['student_name']}' , grade = '{$_POST['grade']}' where id = '{$_POST['grade_id']}'  ";
                $result = mysqli_query($link,$query); 
                if(mysqli_errno($link))
                { 
                    echo mysqli_error($link);
                } 
                if($result)
                {
                    header("location:http://localhost/p2c4/crud%20assignment%202/students.php");
                }
        
    }
    ?>
    <?php 
        if(isset($_GET["student_id"]))
        {
                $query = "SELECT * from students where id = '{$_GET["student_id"]}'";
                $resultset = mysqli_query($link,$query);
                $student = mysqli_fetch_assoc($resultset); 
        }
    ?>
    <?php 
       $query = "SELECT * from classes";
       $result = mysqli_query($link,$query);
       $classes = mysqli_fetch_all($result,1);
           ?>
    <div class = "container-fluid">
    <div class = "row">
        <div class = "col-lg-6">
        <form method = "POST">
                <div class = "form-group">
                 <label>Students LIST</label>
                 <input name = "student_name" class = "form-control" placeholder = " student name " value = "<?php echo (isset($_POST["student_name"]) ? $_POST["student_name"] : (isset($student["student_name"]) ? $student["student_name"] : '' )) ?>">
                 </div>
                 <div class = "form-group">
                 <label>Students Grade</label>
                 <select name="grade" class = "form-control">
                    <option value = ""> SELECT GRADE </option>
                    <?php foreach($classes as $class) {?>
                    <option value = "<?php echo $class["id"] ?>"<?php echo (isset($_POST['grade']) && $_POST['grade'] == $class["id"] ? 'selected' : (isset($student['grade']) && $student['grade'] == $class["id"] ? 'selected' : ''))?> > <?php echo $class['class']?></option>
                    <?php }?>
                 </select>
                 </div>
                 <div class = "form-group">
                 <input type = "hidden" name = "grade_id" value = "<?php echo (isset($_GET['student_id']) ? $_GET['student_id'] : '')?>" >
                 <input type = "submit" class = " btn btn-primary"value = "update students" name = "submit" >
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