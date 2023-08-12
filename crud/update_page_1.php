<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>



<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select * from `players` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query failed" .mysqli_error());
    }
    else{
       
       $row = mysqli_fetch_assoc($result);
       
    }

}


?>


<?php 


if(isset($_POST['update_players'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $f_name = $_POST['f_name'];
    $p_position = $_POST['p_position'];
    $age = $_POST['age'];

    $query = "update `players` set `full_name` = '$f_name', `position` = '$p_position', `age` = '$age' where `id` = '$idnew'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query failed" .mysqli_error());
    }
    else{
        header('location:index.php?update_msg=You have successfully updated the data.');
    }

}


?>



<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
<div class="form-group">
                <label for="f_name">Full Name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['full_name'] ?>">
            </div>
            <div class="form-group">
                <label for="p_position">Position</label>
                <input type="text" name="p_position" class="form-control" value="<?php echo $row['position'] ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
            </div>
            <input type="submit" class="btn btn-success" name="update_players" value="UPDATE">
</form>

<?php include('footer.php'); ?>


