<?php 

    include 'dbcon.php';

    if(isset($_POST['add_users'])){
        $fname=$_POST['f_name'];
        $lname=$_POST['l_name'];
        $email=$_POST['email'];


        if($fname == '' || empty($fname)){
            header('location:index.php?message=Fill the first name.');
        }
        else{
            $query = "insert into `personnel` (`first_name`, `last_name`, `email`) values ('$fname', '$lname', '$email')";

            $result = mysqli_query($connexion ,$query);

            if(!$result)
            {
                die("Query Failed".mysqli_error());
            }else{
                header('location:index.php?insert_msg=Your data has been added successfuly');
            }
        }
    }

?>