<?php include('dbcon.php'); ?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "delete from `personnel` where `id` = '$id'";

    $result = mysqli_query($connexion, $query);

    if(!$result){
        die("Query Failed".mysqli_error());
    }

    else{
        header('location:index.php?delete_msg= You have deleted the record');
    }

?>