<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include "../model/connection.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/donhang.php";
    include "../model/binhluan.php";
    openCon();
    include "view/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'danhmuc':
                $category = new Category();
                $cate_list = $category->get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_add':
                $category = new Category();
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $cate_name = $_POST['name'];
                    $category->add_Cate($cate_name);
                }
                $cate_list = $category->get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_del':
                $category = new Category();
                if (isset($_GET['id'])) {
                    $cate_id = $_GET['id'];
                    $category->delele_Cate($cate_id);
                }
                $cate_list = $category->get_all_Cate();
                include "view/danhmuc.php";
                break;
            case 'danhmuc_edit':
                $category = new Category();
                if (isset($_GET['id'])) {
                    $cate_id = $_GET['id'];
                    $cate = $category->get_one_Cate($cate_id);
                    $cate_list = $category->get_all_Cate();
                    include "view/danhmuc_update_form.php";
                }
                break;
            case 'danhmuc_update':
                $category = new Category();
                if (isset($_POST['id'])) {
                    $cate_id = $_POST['id'];
                    $cate_name = $_POST['name'];
                    $category->update_Cate($cate_id, $cate_name);
                    $cate_list = $category->get_all_Cate();
                    include "view/danhmuc.php";
                }
                break;
            case 'sanpham':
                $category = new Category();
                $product = new Product();
                $cate_list = $category->get_all_Cate();
                $prod_list = $product->get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_add':
                $category = new Category();
                $product = new Product();
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $cate_id = $_POST['cate_id'];
                    $film_name = $_POST['name'];
                    $price = $_POST['price'];
                    $old_price = $_POST['old_price'];
                    $view = $_POST['view'];
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
                        $product->add_Prod($cate_id, $film_name, $old_price, $price, $img, $view);
                    }
                }
                $cate_list =  $category->get_all_Cate();
                $prod_list =  $product->get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_del':
                $product = new Product();
                if (isset($_GET['id'])) {
                    $film_id = $_GET['id'];
                    $product->delete_Prod($film_id);
                }
                $prod_list =  $product->get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'sanpham_edit':
                $category = new Category();
                $product = new Product();
                $cate_list = $category->get_all_Cate();
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $prod = $product->get_one_Prod($_GET['id']);
                }
                $prod_list = $product->get_all_Prod();
                include "view/sanpham_update-form.php";
                break;
            case 'sanpham_update':
                $category = new Category();
                $product = new Product();
                $cate_list =  $category->get_all_Cate();
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $cate_id = $_POST['cate_id'];
                    $film_name = $_POST['name'];
                    $old_price = $_POST['old_price'];
                    $price = $_POST['price'];
                    $view = $_POST['view'];
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
                    $product->update_Prod($film_id, $film_name, $img, $view, $old_price, $price, $cate_id);
                }
                $prod_list = $product->get_all_Prod();
                include "view/sanpham.php";
                break;
            case 'taikhoan':
                $account = new Account();
                $user_list = $account->get_all_User();
                include "view/taikhoan.php";
                break;
            case 'taikhoan_add':
                $account = new Account();
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $name = $_POST['name'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    $account->add_User($name, $addr, $mail, $user, $pass, $role);
                    $user_list =  $account->get_all_User();
                    include "view/taikhoan.php";
                }
                break;
            case 'taikhoan_del':
                $account = new Account();
                if (isset($_GET['id'])) {
                    $user_id = $_GET['id'];
                    $account->delete_User($user_id);
                }
                $user_list =  $account->get_all_User();
                include "view/taikhoan.php";
                break;
            case 'taikhoan_edit':
                $account = new Account();
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $user =  $account->get_one_User($_GET['id']);
                }
                $user_list =  $account->get_all_User();
                include "view/taikhoan_update-form.php";
                break;
            case 'taikhoan_update':
                $account = new Account();
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
                    $account->update_User($id, $name, $addr, $mail, $user, $pass, $role);
                }
                $user_list =  $account->get_all_User();
                include "view/taikhoan.php";
                break;
            case 'donhang':
                $order = new Order();
                $showAdd = 1;
                if ((isset($_POST['kyw'])) && ($_POST['kyw'] != "")) {
                    $showAdd = 0;
                    $kyw = $_POST['kyw'];
                } else $kyw = "";
                $order_list = $order->get_Order_by_code($kyw);
                include "view/donhang.php";
                break;
            case 'donhang_add':
                $order = new Order();
                $showAdd = 1;
                if (isset($_POST['add']) && ($_POST['add'])) {
                    $code = $_POST['code'];
                    $total = $_POST['total'];
                    if (isset($_POST['pttt']))
                        $pttt = $_POST['pttt'];
                    else $pttt = 1;
                    $date = $_POST['date'];
                    if (isset($_POST['user_id']))
                        $user_id = $_POST['user_id'];
                    else $user_id = 0;
                    $name = $_POST['name'];
                    $address = $_POST['addr'];
                    $email = $_POST['mail'];
                    $tel = $_POST['tel'];
                    $order->createOrder($code, $total, $pttt, $date, $user_id, $name, $address, $email, $tel);
                    $order_list = $order->get_all_Order();
                    include "view/donhang.php";
                }
                break;
            case 'donhang_del':
                $showAdd = 1;
                $order = new Order();
                if (isset($_GET['id'])) {
                    $order_id = $_GET['id'];
                    $order->delete_Order($order_id);
                }
                $order_list = $order->get_all_Order();
                include "view/donhang.php";
                break;
            case 'donhang_del_sanpham':
                $showAdd = 1;
                $order = new Order();
                if (isset($_GET['id'])) {
                    $cart_id = $_GET['id'];
                }
                $order_id = $_GET['order_id'];
                $order_info = $order->get_one_Order($order_id);
                $cart = $order->get_one_Cart($cart_id);
                $s = $order_info[0]['total'] - ($cart[0]['sum_price'] * $cart[0]['amount']);
                $order->update_Total_Order($order_id, $s);
                $order->delete_film_in_Order($cart_id);
                $order_info = $order->get_one_Order($order_id);
                $cart_list = $order->get_all_Item_in_Order($order_id);
                if (count($cart_list) > 0) {
                    $order_list = $order->get_all_Order();
                    include "view/donhang_update-form.php";
                    break;
                } else {
                    $order->delete_Order($order_id);
                    header('location: ./index.php?act=donhang');
                    break;
                }
            case 'donhang_edit':
                $showAdd = 1;
                $order = new Order();
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $order_info = $order->get_one_Order($id);
                }
                $cart_list = $order->get_all_Item_in_Order($id);
                $order_list = $order->get_all_Order();
                include "view/donhang_update-form.php";
                break;
            case 'donhang_update':
                $showAdd = 1;
                $order = new Order();
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $tel = $_POST['tel'];
                    $addr = $_POST['addr'];
                    $mail = $_POST['mail'];
                    $name = $_POST['name'];
                    $total = $_POST['total'];
                    $pttt = $_POST['pttt'];
                    $date = $_POST['date'];
                    $order->update_Order($id, $total, $pttt, $name, $addr, $mail, $tel, $date);
                }
                $order_list = $order->get_all_Order();
                include "view/donhang.php";
                break;
            case 'thongke':
                $order = new Order();
                $opt = $_GET['opt'];
                if ($opt == 1) {
                    $title = "So luong san pham ban duoc theo tung thang";
                    $arr = array();
                    for ($i = 1; $i <= 12; $i++) {
                        $s = $order->count_prod_in_month($i);
                        if ($s[0][0] != "")
                            $arr[$i] = $s[0][0];
                        else $arr[$i] = 0;
                    }
                }
                if ($opt == 2) {
                    $title = "Doanh thu theo tung thang";
                    $arr = array();
                    for ($i = 1; $i <= 12; $i++) {
                        $s = $order->sum_total_in_month($i);
                        if ($s[0][0] != "")
                            $arr[$i] = $s[0][0];
                        else $arr[$i] = 0;
                    }
                }
                include "view/thongke.php";
                break;
            case 'binhluan':
                $comment=new Commemt();
                $comt_list = $comment->get_all_Comt(0);
                include "view/binhluan.php";
                break;
            case 'binhluan_del':
                $comment=new Commemt();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $comment->delele_Comt($id);
                }
                $comt_list = $comment->get_all_Comt(0);
                include "view/binhluan.php";
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
