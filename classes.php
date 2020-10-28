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
        if(isset($_POST["class"]))
        {
            $query = "INSERT into classes(`class`) value('{$_POST["class"]}')";
            $result = mysqli_query($link,$query);
           
            if($result)
            {
                header("location:http://localhost/p2c4/crud%20assignment%202/classes.php");
            }
        }
    ?>
    <div class = "container-fluid">
    <div class = "row">
        <div class = "col-lg-6">
            <form method = "POST">
                <div class = "form-group">
                 <label>Class Name</label>
                 <input name = "class" class = "form-control" placeholder = " Class name ">
                 </div>
                 <div class = "form-group">
                 <input type = "submit" class = " btn btn-primary" >
                 </div>
            </form>
        </div>
    </div>
    <div class = "row">
        <div class = "col-lg-12">
            <?php 
            if(isset($_POST['order_by']))
            {
            $query_ = "SELECT * from classes order by {$_POST['order_by']} {$_POST['order_with']}";
            }
            else{
                $query_ = "SELECT * from classes";
            }
                $result_ = mysqli_query($link,$query_);
                $classes = mysqli_fetch_all($result_,1);
            ?>
            <div class = "row">
                        <div class = "col-lg-2">
                            <form method = "POST">
                                <div class = 'form-group'>
                                <label>Order by</label>
                                <select name = "order_by" class = "form-control">
                                    <option value = "class">By name</option>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class</th>
                        <th scope="col">Action</th>
                     </tr>
                </thead>
                <tbody>
                <?php foreach($classes as $class) {?>
                    <tr>
                        <th scope="row"><?php echo $class["id"] ?></th>
                        <td> <?php echo $class["class"] ?></td>
                        <th><a href = "edit-class.php?class_id=<?php echo $class["id"] ?>" class = "btn btn-primary"> Edit </a>
                        <a href = "delete-class.php?class_id=<?php echo $class["id"] ?>" class = "btn btn-warning">Delete </a></th>
                    </tr>
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