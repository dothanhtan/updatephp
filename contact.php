<?php
    session_start(); // luon o tren cung
    if(!isset($_SESSION["user"])) {
      header("location:login.php");
    }
    include_once('model/user.php');
    $current_user = unserialize($_SESSION["user"]); 
    include_once('header.php');
?>

<div class="container-fluid contact">


    <div class="row pt-5">
        <div class="col-sm-3 left-hand-side">
            <div class="contact-header">
                <span><i class="fa fa-bars"></i></span>
                <img class="gb_la gb_7d" alt="" aria-hidden="true" src="https://www.gstatic.com/images/branding/product/1x/contacts_48dp.png" srcset="https://www.gstatic.com/images/branding/product/1x/contacts_48dp.png 1x, https://www.gstatic.com/images/branding/product/2x/contacts_48dp.png 2x " style="width:40px;height:40px">
                <span class="contact-title">Danh bạ</span>
            </div>
            <button class="btn-create-contact"><i class="fa fa-plus"></i> Tạo liên hệ</button>
            <ul class="nav flex-column menu-contact">
                <li class="nav-item list-active">
                    <a class="nav-link" href=""><i class="far fa-user"></i> Danh bạ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="far fa-clock"></i> Thường xuyên liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="far fa-square"></i> Liên hệ trùng lặp</a>
                </li>
            </ul>
            <div class="dropdown-divider"></div>

            <a class="nav-link" role="button" href="" data-toggle="collapse" data-target="#collapseLable"><i class="fa fa-chevron-up"></i> Nhãn</a>
            <div id="collapseLable" class="collapse">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-tag"></i> Bạn bè</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-tag"></i> Gia đình</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-tag"></i> Giáo viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-tag"></i> Người thân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-plus"></i> Tạo nhãn</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-9 right-hand-side">
            <div class="search-box">
                <form action="">
                    <div class="input-group mb-3 search-bar">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input name="txtContact" type="text" class="form-control" id="search-contact" placeholder="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="contact-list">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-1">
                                <label class="custom-control-label name" for="contact-1">Thanh Tân</label>
                            </div>
                        </td>
                        <td>thanhtan280198@gmail.com</td>
                        <td>0356464333</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-2">
                                <label class="custom-control-label name" for="contact-2">Đức Nghĩa</label>
                            </div>
                        </td>
                        <td>ducnghia69@gmail.com</td>
                        <td>0835463490</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Đức Phúc</label>
                            </div>
                        </td>
                        <td>ducphuc1202@gmail.com</td>
                        <td>0702402434</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Đình Tín</label>
                            </div>
                        </td>
                        <td>tora27011998@gmail.com</td>
                        <td>0393865525</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Quý Đôn</label>
                            </div>
                        </td>
                        <td>quydon1998@gmail.com</td>
                        <td>0905865525</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Bình Minh</label>
                            </div>
                        </td>
                        <td>binhminh1997@gmail.com</td>
                        <td>0369578978</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Khánh Quân</label>
                            </div>
                        </td>
                        <td>khanhquan1402@gmail.com</td>
                        <td>0782244449</td>
                    </tr>
                    <tr>
                        <td class="contact-name">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact-3">
                                <label class="custom-control-label name" for="contact-3">Thầy Dũng</label>
                            </div>
                        </td>
                        <td>nguyendung622@gmail.com</td>
                        <td>0905148380</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
