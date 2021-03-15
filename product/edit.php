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
    $qty = $_POST['qty'];
    $category_id    = $_POST['category_id'];
    $sql = "SELECT * FROM products WHERE title = '$title'";
    $result = $conn->query($sql);
    $tbl_data = $result->fetch_assoc();

    //print_r($tbl_data);

    if (empty($tbl_data)) {
        $sql2 = "UPDATE products SET title = '$title',quantity = '$qty' WHERE id = '$id' ";
        $result = $conn->query($sql2);

        $sql3 = "DELETE FROM product_categories WHERE product_id = '$id'";
        $result = $conn->query($sql3);

        foreach ($category_id as $key => $s_category_id) {
            $sql2 = "INSERT INTO product_categories (product_id, category_id) VALUES ('$id', '$s_category_id')";
            $conn->query($sql2);
        }

        $msg =  'Edit successfully';
    } else {
        $msg =  '<span class="dander">Not Update! Alredy Exist</span>';
    }
}
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
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
                            <h3 class="card-title">Edit product</h3>
                        </div>
                        <form action="" method="post">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php// print_r($product); ?>
                                        <!-- text input -->
                                        <p><?= (isset($msg) && !empty($msg)) ? $msg : ''; ?></p>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control  " placeholder="Enter ..." value="<?= (isset($product['title'])) ? $product['title'] : ''; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="qty" class="form-control  " placeholder="Enter ..." value="<?= (isset($product['quantity'])) ? $product['quantity'] : ''; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Select category</label>
                                            <select name="category_id[]" id="" class="form-control" multiple required>
                                                <?php
                                                $sql = "SELECT * FROM categories";
                                                $result = $conn->query($sql);
                                                $ginti = 1;
                                                while ($category = $result->fetch_assoc()) : ?>
                                                    <option value="<?= $category['id'] ?>"><?= $category['title']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Edit product</button>
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
