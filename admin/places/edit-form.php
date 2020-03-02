<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getPlacesEditQuery = "select * from places where id = '$id'";
$placesEdit = queryExecute($getPlacesEditQuery, false);

// $getPlacesTypesQuery = "select * from vehicle_types";
// $placesTypes = queryExecute($getPlacesTypesQuery, true);

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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Sửa địa điểm</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
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
                                    <form id="edit-places-form" action="<?= ADMIN_URL . 'places/save-edit.php' ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <input name="id" value="<?php echo $placesEdit['id'] ?>" hidden>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Địa điểm<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?php echo $placesEdit['name'] ?>">
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                                    <a href="<?= ADMIN_URL . 'places' ?>" class="btn btn-danger">Hủy</a>
                                                </div>
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

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
    $('#add-places-form').validate({
        rules: {
            plate_number: {
                required: true,
                maxlength: 191,
                remote: {
                    url: "<?= ADMIN_URL . 'places/verify-plate-number-vehicle-existed.php'?>",
                    type: "post",
                    data: {
                        name: function() {
                            return $("input[name='name']").val();
                        }
                    }
                }
            },

        },
        messages: {
            name: {
                required: "Hãy nhập địa điểm",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                remote: "Địa điểm đã tồn tại."
            },

        }
    });
    </script>
</body>