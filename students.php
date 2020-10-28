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
        if(isset($_POST['student_name']) && isset($_POST['grade']))
        {
            $query  =  "INSERT into students(`student_name`,`grade`) values('{$_POST['student_name']}','{$_POST['grade']}')";
            $result = mysqli_query($link,$query);
            if($result)
            {
                header("location:students.php");
            }
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
                 <input name = "student_name" class = "form-control" placeholder = " student name ">
                 </div>
                 <div class = "form-group">
                 <label>Students Grade</label>
                 <select name="grade" class = "form-control">
                    <option value = ""> SELECT GRADE </option>
                    <?php foreach($classes as $class) {?>
                    <option value = "<?php echo $class["id"] ?>"> <?php echo $class['class']?></option>
                    <?php }?>
                 </select>
                 </div>
                 <div class = "form-group">
                 <input type = "submit" class = " btn btn-primary" >
                 </div>
            </form>
        </div>
    </div>
    <div class = "row">
                        <div class = "col-lg-2">
                            <form method = "POST">
                                <div class = 'form-group'>
                                <input name = "filter_by" class = 'form-control' placeholder = 'search...'> 
                                <input type = 'submit' class = 'btn btn-warning' value ="filter"> 
                                </div>
                                
                    
                                <div class = 'form-group'>
                                
                                <select name = "order_by" class = "form-control">
                                    <option value = "student_name">By name</option>
                                    <option value = "class">By grade</option>
                                </select>
                                <select name = "order_with" class = "form-control">
                                    <option value = "asc">Ascending</option>
                                    <option value = "desc">Descending</option>
                                </select>
                                <input type = 'submit' class = 'btn btn-warning' value ="Sort"> 
                                </div>
                                
                            </form>
                        </div>
                        </div>
    <div class = "row">
        <div class = "col-lg-12">
            <?php 
            $append_query = null;
            if(isset($_POST['order_by']))
            {
                $append_query = " order by {$_POST['order_by']} {$_POST['order_with']}";
            }
                if(isset($_POST['filter_by']) && !empty(trim($_POST['filter_by'])))
                {
                
                        $query_ = "SELECT students.id, students.student_name, classes.class from students inner join classes on students.grade = classes.id where students.student_name like \"%{$_POST['filter_by']}%\" or students.grade like \"%{$_POST['filter_by']}%\" ";
                }
                else
                     {
                    $query_ = "SELECT students.id, students.student_name, classes.class from students inner join classes on students.grade = classes.id";
                    }
                
                if($append_query)
                {
                    $query = $append_query;
                }
                $result_ = mysqli_query($link,$query_);
                $classes = mysqli_fetch_all($result_,1);
            ?>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name </th>
                        <th scope="col">Grade </th>
                        <th scope="col">Action</th>
                     </tr>
                </thead>
                <tbody>
                <?php if(count($classes)>0) { ?>
                <?php foreach($classes as $class) {?>
                    <tr>
                        <th scope="row"><?php echo $class["id"] ?></th>
                        <td> <?php echo $class["student_name"] ?></td>
                        <td> <?php echo $class["class"] ?></td>
                        <th><a href = "edit-student.php?student_id=<?php echo $class["id"] ?>" class = "btn btn-primary"> Edit </a>
                        <a href = "delete-student.php?student_id=<?php echo $class["id"] ?>" class = "btn btn-warning">Delete </a></th>
                    </tr>
                
                    <?php }  ?>
                <?php } else { ?>
                    <tr><td colspan="4">Records not found</td></tr>
                <?php } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>