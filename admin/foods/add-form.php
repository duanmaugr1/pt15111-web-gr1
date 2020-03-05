<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$getTypeQuery = "select * from types";
$types = queryExecute($getTypeQuery, true);

$getPlaceQuery = "select * from places";
$places = queryExecute($getPlaceQuery, true);

$getIdQuery = "select * from foods";
$foods = queryExecute($getIdQuery,true);

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
                        <h1 class="m-0 text-dark">Thêm thực phẩm</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form id="add-food-form" action="<?= ADMIN_URL . 'foods/save-add.php'?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tên thực phẩm<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="name">
                                <?php if(isset($_GET['nameerr'])):?>
                                    <label class="error"><?= $_GET['nameerr']?></label>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                
                            <div class="row">
                                <div class="col-md-3 offset-md-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                            </div>

                                <label for="">Ảnh<span class="text-danger"></span></label>
                                <input type="file" class="form-control" name="image" onchange="encodeImageFileAsURL(this)">
                            </div>

                            <div class="form-group">
                                <label for="">Loại thực phẩm</label><br>
                                    <select name="type[]" multiple="multiple" class="select2" data-placeholder="Chọn loại thực phẩm" id="" style="width: 100%;">
                                        <?php foreach($types as $type):?>
                                            <option value="<?= $type['id']?>"><?= $type['name']?></option>
                                        <?php endforeach?>
                                </select>
                            </div>            
                            <div class="form-group">
                                <label for="">Địa điểm</label><br>
                                <select name="place[]" multiple="multiple" class="select2" data-placeholder="Chọn địa điểm" id="" style="width: 100%;">
                                    <?php foreach($places as $place):?>
                                        <option value="<?= $place['id']?>"><?= $place['name']?></option>
                                    <?php endforeach?> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Giá<span class="text-danger"></span></label>
                                <input type="number" min='0' class="form-control" name="price">
                                <?php if(isset($_GET['priceerr'])):?>
                                    <label class="error"><?= $_GET['priceerr']?></label>
                                <?php endif; ?>
                            </div>
                           
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Thời gian mở<span class="text-danger"></span></label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    <input type="time" class="form-control" name="time_start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Thời gian đóng<span class="text-danger"></span></label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    <input type="time" class="form-control" name="time_end">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung mô tả</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
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
    $('#add-food-form').validate({
        rules:{
            name: {
                required: true,
                maxlength: 191,
                remote: {
                    url: "<?= ADMIN_URL . 'foods/verify-food-existed.php'?>",
                    type: "post",
                    data: {
                        name: function() {
                            return $( "input[name='name']" ).val();
                        }
                    }
                },
            },
            price: {
                required: true,
                maxlength: 191
            },
            time_start:{
                required: true,
            },
            time_end:{
                required: true,
            },
            image: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "Hãy nhập tên thực phẩm",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                remote: "Tên thực phẩm đã tồn tại, vui lòng sử dụng email khác"
            },
            price:{
                required: "Hãy nhập giá",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            house_no:{
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            image: {
                required: "Hãy nhập ảnh đại diện",
                extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
            }
        }
    });
</script>
</body>
</html>