<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getRoleQuery = "select * from roles where status = 1";
$roles = queryExecute($getRoleQuery, true);

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
                        <h1 class="m-0 text-dark">Tạo tài khoản</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form id="add-user-form" action="<?= ADMIN_URL . 'foods/save-add.php'?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                        <!-- id 
name 
image 
price 
time 
description 
address  -->
                            <div class="form-group">
                                <label for="">food<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                                <?php if(isset($_GET['nameerr'])):?>
                                    <label class="error"><?= $_GET['nameerr']?></label>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">avatar<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" onchange="encodeImageFileAsURL(this)">
                            </div>

                            <div class="row">
                                <div class="col-md-3 offset-md-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price">
                                <?php if(isset($_GET['priceerr'])):?>
                                    <label class="error"><?= $_GET['priceerr']?></label>
                                <?php endif; ?>
                            </div>
                           
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">time<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="time">
                            </div>
                            <div class="form-group">
                                <label for="">description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        <div class="col-6 d-flex justify-content-end offset-md-3 ">
                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'users'?>" class="btn btn-danger">Hủy</a>
                        </div>
                        </div>
                    </div>
                </form>
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
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
    $('#add-user-form').validate({
        rules:{
            name: {
                required: true,
                maxlength: 191
            },
            email: {
                required: true,
                maxlength: 191,
                email: true,
                remote: {
                    url: "<?= ADMIN_URL . 'users/verify-email-existed.php'?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $( "input[name='email']" ).val();
                        }
                    }
                }
            },
            password:{
                required: true,
                maxlength: 191
            },
            cfpassword: {
                required: true,
                equalTo: "#main-password"
            },
            phone_number: {
                number: true
            },
            house_no:{
                maxlength: 191
            },
            avatar: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "Hãy nhập tên người dùng",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            email: {
                required: "Hãy nhập email",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                email: "Không đúng định dạng email",
                remote: "Email đã tồn tại, vui lòng sử dụng email khác"
            },
            password:{
                required: "Hãy nhập mật khẩu",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            cfpassword: {
                required: "Nhập lại mật khẩu",
                equalTo: "Cần khớp với mật khẩu"
            },
            phone_number: {
                min: "Bắt buộc là số có 10 chữ số",
                max: "Bắt buộc là số có 10 chữ số",
                number: "Nhập định dạng số"
            },
            house_no:{
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            avatar: {
                required: "Hãy nhập ảnh đại diện",
                extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
            }
        }
    });
</script>
</body>
</html>