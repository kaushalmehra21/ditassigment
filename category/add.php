<?php include('../autoload.php');
$Helper = new Helper;
?>
<?php include(ROOT_DIR . 'includes/header.php'); ?>
<?php include(ROOT_DIR . 'includes/sidebar.php'); ?>
<?php
/* Add queries here */
if (isset($_POST) && !empty($_POST)) {
    //$Helper->_ddd($_POST);

    $title = $_POST['title'];
    echo $sql = "SELECT * FROM categories WHERE title = '$title'";
    $result = $conn->query($sql);
    $category = $result->fetch_assoc();

    print_r($category);

    if (empty($category)) {
        $sql = "INSERT INTO categories (title) VALUES ('$title')";

        if ($conn->query($sql) === TRUE) {
            $msg = "New record created successfully";
        } else {
            $msg =  "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $msg =  '<span class="dander">Not Insert Alredy Exist</span>';
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $Helper->breadcum(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <form action="" method="post">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <p><?= (isset($msg) && !empty($msg)) ? $msg : ''; ?></p>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control  " placeholder="Enter ..." required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Add Category</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include(ROOT_DIR . 'includes/footer.php');
