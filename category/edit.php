<?php include('../autoload.php');
$Helper = new Helper;
?>
<?php include(ROOT_DIR . 'includes/header.php'); ?>
<?php include(ROOT_DIR . 'includes/sidebar.php'); ?>
<?php
$id = $_GET['id'];

/* Add queries here */
if (isset($_POST) && !empty($_POST)) {
    //$Helper->_ddd($_POST);

    $title = $_POST['title'];
    $sql = "SELECT * FROM categories WHERE title = '$title'";
    $result = $conn->query($sql);
    $tbl_data = $result->fetch_assoc();

    //print_r($tbl_data);

    if (empty($tbl_data)) {
        $sql2 = "UPDATE categories SET title = '$title' WHERE id = '$id' ";
        $result = $conn->query($sql2);

        if ($conn->query($sql2) === TRUE) {
            $msg = "Update Successfully";
        } else {
            $msg =  "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $msg =  '<span class="dander">Not Update! Alredy Exist</span>';
    }
}
$sql = "SELECT * FROM categories WHERE id = '$id'";
$result = $conn->query($sql);
$category = $result->fetch_assoc();
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
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <form action="" method="post">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php //print_r($category); 
                                        ?>
                                        <!-- text input -->
                                        <p><?= (isset($msg) && !empty($msg)) ? $msg : ''; ?></p>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control  " placeholder="Enter ..." value="<?= (isset($category['title'])) ? $category['title'] : ''; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Edit Category</button>
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
