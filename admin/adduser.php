<?php
include 'inc/header.php';
include 'inc/sidebar.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $db->link->real_escape_string($_POST['name']);
    $email = $db->link->real_escape_string($_POST['email']);
    $gender = $db->link->real_escape_string($_POST['gender']);
    $password = $db->link->real_escape_string(md5($_POST['password']));
    $role = $db->link->real_escape_string($_POST['role_id']);
    $birthday = $_POST['birthday'];

    if ($name == "" || $email == "" || $gender == "" || $birthday == "" || $password == "" || $role == "") {
        $_SESSION['error'] = "Field can not be empty!";
    }else{
        $query = "INSERT INTO users(name, email, gender, birthday, password, role_id) VALUES('$name', '$email', '$gender', '$birthday', '$password', '$role')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            $_SESSION['success'] = "User created Successfully.";
        }else {
            $_SESSION['error'] = " User not created!";
        }
    }
} ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New user
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
                    <form role="form" action="adduser.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="Gender" class="form-control">
                                    <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Birth Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="birthday" class="form-control pull-right" id="datepicker">
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
                                        <option value="1">Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3">Author</option>
                                    </select>
                                </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script type="text/javascript">
            $(function() {

                nav_highlight('users','add-user');

            });
        </script>

        <?php
        include 'inc/footer.php';

        ?>
