<?php
include 'inc/header.php';
include 'inc/sidebar.php';

if (isset($_GET['id']) && $_GET['id'] != null) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $db->select($query);

        if($result == '') {
            $_SESSION['error'] = "User not found!";
            goToUrl('viewuser.php');
        }else{
                $query = "SELECT * FROM users WHERE id='$id'";
                $getuser = $db->select($query);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $db->link->real_escape_string($_POST['name']);
                    $email = $db->link->real_escape_string($_POST['email']);
                    $gender = $db->link->real_escape_string($_POST['gender']);
                    $role = $db->link->real_escape_string($_POST['role_id']);
                    $birthday = $_POST['birthday'];

                    if ($name == "" || $email == "" || $gender == "" || $birthday == "" || $role == "") {
                        $_SESSION['error'] = "Field can not be empty!";
                    }else{

                        if (empty($_POST['password'])) {
                           $query ="UPDATE users SET
                                name = '$name',
                                email = '$email',
                                gender = '$gender',
                                birthday = '$birthday',
                                role_id = '$role_id'
                                WHERE id = '$userid'";
                        }else{
                            $password = $db->link->real_escape_string(md5($_POST['password']));
                            $query ="UPDATE users SET
                                name = '$name',
                                email = '$email',
                                gender = '$gender',
                                birthday = '$birthday',
                                role_id = '$role_id',
                                password = '$password'
                                WHERE id = '$userid'";
                            }

                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            $_SESSION['success'] = "User Updated Successfully.";
                            goToUrl('profile.php');
                        }else {
                            $_SESSION['error'] = "User Not Updated!";
                    }
                }
            }
        }
    }
 ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <?php include '../helper/message.php'; ?>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php
                        if ($getuser) {
                            while ($user = $getuser->fetch_assoc()) {
                     ?>
                    <form role="form" action="profile.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" id="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control"  id="email" placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="Gender" class="form-control">
                                    <option value="">Select Gender</option>
                                        <option value="1" <?php if ($user['gender'] == 1) {echo "selected ";} ?>>Male</option>
                                        <option value="2" <?php if ($user['gender'] == 2) {echo "selected ";} ?>>Female</option>
                                        <option value="3" <?php if ($user['gender'] == 3) {echo "selected ";} ?>>Other</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="date">Birth Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="<?php echo $user['birthday']; ?>" name="birthday" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile Picture
                                    </label>
                                    <input type="file" class="form-control" name="image" id="">
                                </div>

                            </div>
                            <div class="form-group mb-5">
                                <label for="role">User Role</label>
                                <select name="role_id" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                        <option value="1" <?php if ($user['role_id'] == 1) {echo "selected";} ?>>Admin</option>
                                        <option value="2" <?php if ($user['role_id'] == 2) {echo "selected";} ?>>Editor</option>
                                        <option value="3" <?php if ($user['role_id'] == 3) {echo "selected";} ?>>Author</option>
                                    </select>
                                </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>

                <?php } } ?>
                    </div>
                    <!-- /.box -->
                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
 

        <?php
        include 'inc/footer.php';

        ?>
