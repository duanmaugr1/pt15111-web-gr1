

<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$getcommentTypesQuery = "select 
                        cm.*,
                        u.name user_name,
                        f.name food_name
                        from comments cm
                        join foods f
                        on f.id = cm.food_id
                        join users u
                        on u.id = cm.user_id";
$comments = queryExecute($getcommentTypesQuery, true);


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
                                <h1 class="m-0 text-dark">Danh sách bình luận</h1>
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
                                <th>STT</th>
                                <th>Người bình luận</th>
                                <th>Món ăn được bình luận</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                </thead>
                                <tbody>
                                <?php foreach ($comments as $comm): ?>
                                    <tr>
                                        <td><?php echo $comm['id'] ?></td>
                                        <td><?php echo $comm['user_name'] ?></td>
                                        <td><?php echo $comm['food_name'] ?></td>
                                        <td><?php echo $comm['content'] ?></td>
                                        <td><?php echo $comm['create_at'] ?></td>
                                        <td>
                                            <a href="<?php echo ADMIN_URL . 'comments/remove.php?id=' . $comm['id'] ?>"
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
    $(document).ready(function () {
        $('.btn-remove').on('click', function () {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa bình luận này?",
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
