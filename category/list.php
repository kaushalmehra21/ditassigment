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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $result = $conn->query($sql);
                                        $ginti = 1;
                                        while ($category = $result->fetch_assoc()) : ?>
                                            <tr>
                                                <td><?= $ginti; ?></td>
                                                <td><?= $category['title'] ?></td>
                                                <td><?= date('M d, Y H:i', strtotime($category['created_date'])) ?></td>
                                                <td><a href="edit.php?id=<?= $category['id'] ?>">Edit</a>&nbsp;&nbsp;<a href="delete.php?id=<?= $category['id'] ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $ginti++; ?>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
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
