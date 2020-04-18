<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;

$foodQuery = "select * from foods where id = $id";
$foods = queryExecute($foodQuery, false);

$typeQuery = "select * from types";
$types = queryExecute($typeQuery, true);

$placeQuery = "select * from places";
$places = queryExecute($placeQuery, true);


if (!$foods) {
    header("location: " . ADMIN_URL . 'foods?msg=Thực phẩm không tồn tại');
    die;
}
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
                    <form id="edit-food-form" action="<?= ADMIN_URL . 'foods/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $foods['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên thực phẩm</label>
                                    <input type="text" class="form-control" name="name" value="<?= $foods['name'] ?>">
                                    <?php if (isset($_GET['nameerr'])) : ?>
                                        <label class="error"><?= $_GET['nameerr'] ?></label>
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
                                <div class="form-group">
                                    <label for="">Loại thực phẩm</label><br>
                                    <select name="type[]" multiple="multiple" class="select2" data-placeholder="Chọn loại thực phẩm" id="" style="width: 100%;" required>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa điểm</label><br>
                                    <select name="place[]" multiple="multiple" class="select2" data-placeholder="Chọn địa điểm" id="" style="width: 100%;" required>
                                        <?php foreach ($places as $place) : ?>
                                            <option value="<?= $place['id'] ?>"><?= $place['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Giá</label>
                                    <input type="number" class="form-control" name="price" value="<?= $foods['price'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian mở</label>
                                    <input type="time" class="form-control" name="time_start" value="<?= $foods['time_start'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian đóng</label>
                                    <input type="time" class="form-control" name="time_end" value="<?= $foods['time_end'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung mô tả</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10"><?= $foods['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>&nbsp;
                                <a href="<?= ADMIN_URL . 'foods' ?>" class="btn btn-danger">Hủy</a>
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
            if (file === undefined) {
                $('#preview-img').attr('src', "<?= BASE_URL . $foods['image'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
        $('#edit-food-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'foods/verify-food-existed.php' ?>",
                        type: "post",
                        data: {
                            nameData: function() {
                                return $("input[name='name']").val();
                            },
                            idData: <?= $foods['id'] ?>
                        }
                    }
                },
                price: {
                    required: true,
                    maxlength: 191
                },
                time_start: {
                    required: true,
                },
                time_end: {
                    required: true,
                },
                image: {
                    extension: "png|jpg|jpeg|gif"
                },
                description: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên thực phẩm",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tên thực phẩm đã tồn tại, vui lòng sử dụng thực phẩm khác"
                },
                place: {
                    required: "Hãy nhập địa điểm"
                },
                type: {
                    required: "Hãy nhập loại thực phẩm"
                },
                price: {
                    required: "Hãy nhập giá",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                time_start: {
                    required: "Hãy nhập giờ mở bán"
                },
                time_end: {
                    required: "Hãy nhập giờ đóng cửa"
                },
                image: {
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                },
                description: {
                    required: "Hãy nhập nội dung mô tả"
                }
            }
        });
    </script>
</body>

</html>