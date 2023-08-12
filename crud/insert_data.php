<?php 
include 'dbcon.php';
if(isset($_POST['add_players'])){
    
    $f_name = $_POST['f_name'];
    $p_position = $_POST['p_position'];
    $age = $_POST['age'];


    if($f_name == "" || empty($f_name)){
        header('location:index.php?message=Please fill in the full name!');
    }

    else{

        $query = "insert into `players`(`full_name`, `position`, `age`) values ('$f_name', '$p_position', '$age')";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }

        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }

}

?>