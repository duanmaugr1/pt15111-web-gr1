<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getFoodTypeEditQuery = "select * from types where id = '$id'";
$FoodTypeEdit = queryExecute($getFoodTypeEditQuery, false);

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
                                    <h1 class="m-0 text-dark">Sửa loại thực phẩm</h1>
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


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <form id="edit-vehicle-type-form" action="<?= ADMIN_URL . 'types/save-edit.php' ?>"
                                        method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $FoodTypeEdit['id'] ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Loại thực phẩm<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?php echo $FoodTypeEdit['name'] ?>">

                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                                                    <a href="<?= ADMIN_URL . 'types' ?>" class="btn btn-danger">Hủy</a>
                                                </div>
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
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
   $('#edit-vehicle-type-form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 191,
                remote: {
                    url: "<?= ADMIN_URL . 'types/verify-name-type-existed.php'?>",
                    type: "post",
                    data: {
                        name: function() {
                            return $("input[name='name']").val();
                        },
                        id: <?= $FoodTypeEdit['id']?>
                    }
                }
            },

        },
        messages: {
            name: {
                required: "Hãy nhập loại phương tiện",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                remote: "Loại thực phẩm đã tồn tại."
            },
        }
    });
    </script>
</body>

</html>