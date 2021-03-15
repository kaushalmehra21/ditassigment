<?php include('../autoload.php');
$Helper = new Helper;
?>
<?php include(ROOT_DIR . 'includes/header.php'); ?>
<?php include(ROOT_DIR . 'includes/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $Helper->breadcum(); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">View Category</h3>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Select category</label>
                                        <select name="category_id" id="" class="form-control" required>
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
                                <div class="col-3">
                                    <button type="submit" name="search_prod" value="some" class="btn btn-info mt-4">Search</button>
                                    <a href="list.php"><button type="button" class="btn btn-success mt-4">clear</button></a>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-3"></div>
                            </div>

                        </form>
                        <form action="" method="post">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Categories</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pcr_str = '';
                                        if (isset($_POST['search_prod']) && !empty($_POST['search_prod'])) {
                                            //die('in');
                                            $category_id = $_POST['category_id'];
                                            $sql11 = "SELECT * FROM product_categories WHERE category_id = '$category_id'";
                                            $result11 = $conn->query($sql11);

                                            $pcr_arr = [];
                                            while ($pcr = $result11->fetch_assoc()) {
                                                $pcr_arr[] = $pcr['product_id'];
                                            }

                                            if (!empty($pcr_arr)) {
                                                $pcr_str = implode(',', $pcr_arr);
                                            }
                                            //echo $pcr_str;
                                        }
                                        $sql = "SELECT * FROM products";

                                        if (isset($_POST['search_prod']) && !empty($_POST['search_prod'])) {
                                            if ($pcr_str != '') {
                                                $sql .= " WHERE id IN ($pcr_str) ";
                                            } else {
                                                $sql .= " WHERE id = '' ";
                                            }
                                        }

                                        echo $sql;
                                        $result = $conn->query($sql);
                                        $ginti = 1;
                                        while ($product = $result->fetch_assoc()) :
                                            $product_id = $product['id'];
                                            $sql2 = "SELECT * FROM product_categories INNER JOIN categories ON product_categories.category_id = categories.id WHERE product_id= $product_id ";
                                            $result2 = $conn->query($sql2); ?>
                                            <tr>
                                                <td><?= $ginti; ?></td>
                                                <td><?= $product['title'] ?></td>
                                                <td><?= $product['quantity'] ?></td>
                                                <td>
                                                    <?php
                                                    while ($category_data = $result2->fetch_assoc()) :
                                                        echo $category_data['title'] . '<br>';
                                                    endwhile;
                                                    ?>
                                                </td>
                                                <td><?= date('M d, Y H:i', strtotime($product['created_date'])) ?></td>
                                                <td><a href="edit.php?id=<?= $product['id'] ?>">Edit</a>&nbsp;&nbsp;<a href="delete.php?id=<?= $product['id'] ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $ginti++; ?>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Categories</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
