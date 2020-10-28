<?php require_once("./connection.php") ?>
<?php
    if(isset($_GET["student_id"]))
    {
        if(!empty($_GET['student_id']))
        {
            $query = "DELETE from students where id  = '{$_GET['student_id']}' ";
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
    }
?>