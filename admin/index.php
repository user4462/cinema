<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include "../model/connection.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/donhang.php";
    openCon();
    include "view/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'danhmuc':
                $cate_list = get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_add':
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $cate_name = $_POST['name'];
                    add_Cate($cate_name);
                }
                $cate_list = get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_del':
                if (isset($_GET['id'])) {
                    $cate_id = $_GET['id'];
                    delele_Cate($cate_id);
                }
                $cate_list = get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_edit':
                if (isset($_GET['id'])) {
                    $cate_id = $_GET['id'];
                    $cate = get_one_Cate($cate_id);
                    $cate_list = get_all_Cate();
                    include "view/danhmuc_update_form.php";
                }
                break;
            case 'danhmuc_update':
                if (isset($_POST['id'])) {
                    $cate_id = $_POST['id'];
                    $cate_name = $_POST['name'];
                    update_Cate($cate_id, $cate_name);
                    $cate_list = get_all_Cate();
                    include "view/danhmuc.php";
                }
                break;
            case 'sanpham':
                $cate_list = get_all_Cate();
                $prod_list = get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_add':
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $cate_id = $_POST['cate_id'];
                    $film_name = $_POST['name'];
                    $price = $_POST['price'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 1) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        add_Prod($cate_id, $film_name, $price, $img);
                    }
                }
                $cate_list = get_all_Cate();
                $prod_list = get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_del':
                if (isset($_GET['id'])) {
                    $film_id = $_GET['id'];
                    delete_Prod($film_id);
                }
                $prod_list = get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_edit':
                $cate_list = get_all_Cate();
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $prod = get_one_Prod($_GET['id']);
                }
                $prod_list = get_all_Prod();
                include "view/sanpham_update-form.php";
                break;
            case 'sanpham_update':
                $cate_list = get_all_Cate();
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $cate_id = $_POST['cate_id'];
                    $film_name = $_POST['name'];
                    $price = $_POST['price'];
                    $film_id = $_POST['id'];
                    if ($_FILES["image"]["name"] != "") {
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $img = $target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        // Allow certain file formats
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }
                        if ($uploadOk == 1) {
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                            //insert_sanpham($iddm, $tensp, $gia, $img);
                        }
                    } else $img = "";
                    update_Prod($film_id, $film_name, $img, $price, $cate_id);
                }
                $prod_list = get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'taikhoan':
                $user_list = get_all_User();
                include "view/taikhoan.php";
                break;
            case 'taikhoan_add':
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $name = $_POST['name'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    add_User($name, $addr, $mail, $user, $pass, $role);
                    $user_list = get_all_User();
                    include "view/taikhoan.php";
                }
                break;
            case 'taikhoan_del':
                if (isset($_GET['id'])) {
                    $user_id = $_GET['id'];
                    delete_User($user_id);
                }
                $user_list = get_all_User();
                include "view/taikhoan.php";
                break;
            case 'taikhoan_edit':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $user = get_one_User($_GET['id']);
                }
                $user_list = get_all_User();
                include "view/taikhoan_update-form.php";
                break;
            case 'taikhoan_update':
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    update_User($id, $name, $addr, $mail, $user, $pass, $role);
                }
                $user_list = get_all_User();
                include "view/taikhoan.php";
                break;
            case 'donhang':
                $order_list = get_all_Order();
                include "view/donhang.php";
                break;
            case 'donhang_add':
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $code = $_POST['code'];
                    $total = $_POST['total'];
                    $pttt = $_POST['pttt'];
                    $date = $_POST['date'];
                    if (isset($_POST['user_id']))
                        $user_id = $_POST['user_id'];
                    else $user_id = 0;
                    $name = $_POST['name'];
                    $address = $_POST['addr'];
                    $email = $_POST['mail'];
                    $tel = $_POST['tel'];
                    createOrder($code, $total, $pttt, $date, $user_id, $name, $address, $email, $tel);
                    $order_list = get_all_Order();
                    include "view/donhang.php";
                }
                break;
            case 'donhang_del':
                if (isset($_GET['id'])) {
                    $order_id = $_GET['id'];
                    delete_Order($order_id);
                }
                $order_list = get_all_Order();
                include "view/donhang.php";
                break;
            case 'donhang_del_sanpham':
                if (isset($_GET['id'])) {
                    $cart_id = $_GET['id'];
                }
                $order_id = $_GET['order_id'];
                $order = get_one_Order($order_id);
                $cart = get_one_Cart($cart_id);
                $s = $order[0]['total'] - ($cart[0]['sum_price'] * $cart[0]['amount']);
                update_Total_Order($order_id, $s);
                delete_film_in_Order($cart_id);
                $order = get_one_Order($order_id);
                $cart_list = get_all_Cart_in_Order($order_id);
                if (count($cart_list) > 0) {
                    $order_list = get_all_Order();
                    include "view/donhang_update-form.php";
                    break;
                } else {
                    delete_Order($order_id);
                    header('location: ./index.php?act=donhang');
                    break;
                }
            case 'donhang_edit':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $order = get_one_Order($id);
                }
                $cart_list = get_all_Cart_in_Order($id);
                $order_list = get_all_Order();
                include "view/donhang_update-form.php";
                break;
            case 'donhang_update':
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $tel = $_POST['tel'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $name = $_POST['name'];
                    $total = $_POST['total'];
                    $pttt = $_POST['pttt'];
                    $date = $_POST['date'];
                    update_Order($id, $total, $pttt, $name, $addr, $mail, $tel, $date);
                }
                $order_list = get_all_Order();
                include "view/donhang.php";
                break;
            case 'home':
                $order_list = get_all_Order();
                include "view/home.php";
                break;
            case 'exit':
                if (isset($_SESSION['role'])) unset($_SESSION['role']);
                header('location: ../index.php');
                break;
            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }

    include "view/footer.php";
} else header('location: ../index.php');
