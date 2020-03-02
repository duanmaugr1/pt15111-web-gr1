<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

# Lấy ra tất cả bản ghi trong bảng users
$getAllMemberSql = "select * from users";
$users = queryExecute($getAllMemberSql, true);

# Lấy ra tất cả các bản ghi trong bảng places
$getAllPlaceSql = "select * from places";
$places = queryExecute($getAllPlaceSql, true);

# Lấy ra tất cả các bản ghi trong bảng types
$getAllTypeSql = "select * from types";
$types = queryExecute($getAllTypeSql, true);

# Lấy ra tất cả các bản ghi trong bảng comments
$getAllCommentSql = "select * from comments";
$comments = queryExecute($getAllCommentSql, true);

# Lấy ra tất cả các bản ghi trong bảng ratings
$getAllRatingSql = "select * from ratings";
$ratings = queryExecute($getAllRatingSql, true);

# Lấy ra tất cả các bản ghi trong bảng foods
$getAllFoodSql = "select * from foods";
$foods = queryExecute($getAllFoodSql, true);
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once '../_share/style.php'; ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include_once '../_share/header.php'; ?>
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
                                <h1 class="m-0 text-dark">Dashboard</h1>
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
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo count($users) ?></h3>

                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'users' ?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo count($places) ?></h3>

                                <p>Địa điểm</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-place-of-worship"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'places' ?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->


                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-red">
                            <div class="inner">
                                <h3><?php echo count($foods) ?></h3>

                                <p>Thực phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-utensils"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'foods'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo count($types) ?></h3>

                                <p>Loại thực phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hamburger"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'types'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3><?php echo count($comments) ?></h3>

                                <p>Các bình luận</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comment"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'comments'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-fuchsia">
                            <div class="inner">
                                <h3><?php echo count($ratings) ?></h3>

                                <p>Các đánh giá</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-star-half"></i>
                            </div>
                            <a href="<?php echo ADMIN_URL . 'ratings'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once '../_share/footer.php'?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include_once '../_share/script.php'?>

</body>
</html>

