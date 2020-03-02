<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$getfoodTypesQuery = "select * from types";
$foodTypes = queryExecute($getfoodTypesQuery, true);
// dd($foodTypes);
?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../_share/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../_share/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">LOẠI THỰC PHẨM</h1>
                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Loại thức ăn</th>
                                        <!-- <th>Trạng thái</th> -->

                                        <th>
                                            <a href="<?php echo ADMIN_URL . 'types/add-form.php' ?>"
                                                class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($foodTypes as $type): ?>
                                        <tr>
                                            <td><?php echo $type['id'] ?></td>
                                            <td><?php echo $type['name'] ?></td>

                                            <td>
                                                <a href="<?php echo ADMIN_URL . 'types/edit-form.php?id=' . $type['id'] ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo ADMIN_URL . 'types/remove.php?id=' . $type['id'] ?>"
                                                    class="btn-remove btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.row -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php'; ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php'; ?>
    <script>
    $(document).ready(function() {
        $('.btn-remove').on('click', function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa loại thức ăn này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
            }).then((result) => { // arrow function es6 (es2015)
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            });
            return false;
        });
        $("#example1").DataTable({
            "searching": false,
        }); <?php
        if (isset($_GET['msg'])): ?>
            Swal.fire({
                position: 'bottom-center',
                icon: 'warning',
                title: "<?= $_GET['msg'];?>",
                showConfirmButton: false,
                timer: 1500
            }); <?php endif; ?>
    });
    </script>
</body>

</html>