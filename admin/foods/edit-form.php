<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
// $getRoleQuery = "select * from roles where status = 1";
// $roles = queryExecute($getRoleQuery, true);

// lấy thông tin của người dùng ra ngoài thông id trên đường dẫn
$id = isset($_GET['id']) ? $_GET['id'] : -1;
// kiểm tra tài khoản có tồn tại hay không
$getUserByIdQuery = "select * from foods where id = $id";
$foods = queryExecute($getUserByIdQuery, false);
if(!$foods){
    header("location: " . ADMIN_URL . 'foods?msg=Tài khoản không tồn tại');die;
}

// kiểm tra xem có quyền để thực hiện edit hay không
// if($foods['id'] != $_SESSION[AUTH]['id']){
//     header("location: " . ADMIN_URL . 'foods?msg=Bạn không có quyền sửa thông tin tài khoản này');die;
// }


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
                        <h1 class="m-0 text-dark">Cập nhật thông tin thực phẩm</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form id="edit-user-form" action="<?= ADMIN_URL . 'foods/save-edit.php'?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $foods['id'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tên thực phẩm<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="name" value="<?= $foods['name']?>">
                                <?php if(isset($_GET['nameerr'])):?>
                                    <label class="error"><?= $_GET['nameerr']?></label>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <img src="<?= BASE_URL . $foods['image'] ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <input type="file" class="form-control" name="image" onchange="encodeImageFileAsURL(this)">
                                </div>

                            </div>
                            <!--Loại thực phẩm chưa fix lỗi chưa cho vào -->
                            <div class="form-group">
                                <label for="">Loại thực phẩm</label>
                            </div>    
                            <!--Địa điểm chưa fix lỗi chưa cho vào -->
                            <div class="form-group">
                                <label for="">Địa điểm</label>
                            </div> 
                            <div class="form-group">
                                <label for="">Giá<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" value="<?= $foods['price']?>">
                                <?php if(isset($_GET['emailerr'])):?>
                                    <label class="error"><?= $_GET['emailerr']?></label>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Thời gian mở</label>
                                <input type="time" class="form-control" name="time_start" value="<?= $foods['time_start']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Thời gian đóng</label>
                                <input type="time" class="form-control" name="time_end" value="<?= $foods['time_end']?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung mô tả</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10"><?= $foods['description']?></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'foods'?>" class="btn btn-danger">Hủy</a>
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
            $('#preview-img').attr('src', "<?= BASE_URL . $foods['image'] ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
    $('#edit-user-form').validate({
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
                    url: "<?= ADMIN_URL . 'foods/verify-food-existed.php'?>",
                    type: "post",
                    data: {
                        food: function() {
                            return $( "input[name='food']" ).val();
                        },
                        id: <?= $foods['id']; ?>
                    }
                }
            },
            phone_number: {
                number: true
            },
            house_no:{
                maxlength: 191
            },
            image: {
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
            phone_number: {
                min: "Bắt buộc là số có 10 chữ số",
                max: "Bắt buộc là số có 10 chữ số",
                number: "Nhập định dạng số"
            },
            house_no:{
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            image: {
                extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
            }
        }
    });
</script>
</body>
</html>