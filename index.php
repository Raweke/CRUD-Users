<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>ALL USERS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">ADD USER</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Arrival time</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM `personnel`";
        $result = mysqli_query($connexion, $query);

        if (!$result) {
            die("La requête a échoué : " . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['arrival_time']; ?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php
    if(isset($_GET['message'])){
        echo '<h6 class="error-message">'.$_GET['message'].'</h6>';
    }
?>

<?php
    if(isset($_GET['insert_msg'])){
        echo '<h6 class="success-message">'.$_GET['insert_msg'].'</h6>';
    }
?>


<?php
    if(isset($_GET['update_msg'])){
        echo '<h6 class="success-message">'.$_GET['update_msg'].'</h6>';
    }
?>

<?php
    if(isset($_GET['delete_msg'])){
        echo '<h6 class="success-message">'.$_GET['delete_msg'].'</h6>';
    }
?>


<form action="insert_data.php" method="POST">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ADD USERS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="add_users" value="ADD"></button>
                </div>
            
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>
