<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php
    if(isset($_GET['id'])){
        $id= $_GET['id'];

        $query = "SELECT * FROM `personnel` where `id` = '$id'" ;
        $result = mysqli_query($connexion, $query);

        if (!$result) {
            die("La requête a échoué : " . mysqli_error());
        } else {
             $row = mysqli_fetch_assoc($result);
        }
    }

?>

<?php
    if(isset($_POST['update_users'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $email = $_POST['email'];

        $query = "update `personnel` set `first_name` = '$fname', `last_name` = '$lname', `email` = '$email' where `id`= '$idnew'";

        $result = mysqli_query($connexion, $query);

        if (!$result) {
            die("La requête a échoué : " . mysqli_error());
        }
        else{
            header('location:index.php?update_msg=You have successfully updated the data.');
        }

    }
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">

<div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">
                    </div>
                </div>
                <input type="submit" id = "btnUpdate" class="btn btn-success" name="update_users" value="UPDATE"></button>

                </form>



<?php include('footer.php'); ?>

