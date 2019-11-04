<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php 
    $maSinhVien = $ho = $ten = $ngaySinh = $email = "";
    // var_dump($_SERVER);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        # get value
        $maSinhVien = $_REQUEST["maSinhVien"];
        $ho = $_REQUEST["ho"];
        $ten = $_REQUEST["ten"];
        $ngaySinh = $_REQUEST["ngaySinh"];
        $email = $_REQUEST["email"];

        # validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
            echo "Bạn đã nhập email đúng định dạng";
        else
            echo "Bạn đã nhập email sai định dạng"; 
        // var_dump($_FILES);

        # save file to folder: uploads
        if($_FILES["avt"]["name"] != "")
            move_uploaded_file($_FILES["avt"]["tmp_name"], "uploads/images.jpg");
        else
            echo "Chúc mừng bạn đã không thành công";
    }
?>
<div id="wrapper">
    <div class="container">
        <h3 class="text-center"> <strong>Thông tin sinh viên</strong> </h3>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <label for="msv">Mã sinh viên</label>
                <input name="maSinhVien" value="<?php echo $maSinhVien ?>" type="text" required class="form-control"
                    id="msv" placeholder="Nhập mã sinh viên">
            </div>
            <div class="form-group">
                <label for="ho">Họ</label>
                <input name="ho" value="<?php echo $ho ?>" type="text" required class="form-control" id="ho"
                    placeholder="Nhập họ">
            </div>
            <div class="form-group">
                <label for="ten">Tên</label>
                <input name="ten" value="<?php echo $ten ?>" type="text" require class="form-control" id="ten"
                    placeholder="Nhập tên">
            </div>
            <div class="form-group">
                <label for="dob">Ngày sinh</label>
                <input name="ngaySinh" value="<?php echo $ngaySinh ?>" type="date" required class="form-control"
                    id="dob" placeholder="Ngày sinh">
            </div>
            <div class="form-group">
                <label for="mail">Email</label>
                <input name="email" value="<?php echo $email ?>" type="email" required class="form-control" id="mail"
                    placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="avt">Ảnh đại diện</label>
                <input name="avt" type="file" class="form-control" id="avt" placeholder="Ảnh đại diện">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="#btn-sub" value="Submit">
            </div>
        </form>
    </div>
</div>
<?php include_once("footer.php") ?>