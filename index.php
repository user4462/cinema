<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
include 'model/connection.php';
include 'model/danhmuc.php';
include 'model/donhang.php';
include 'model/sanpham.php';
include 'model/taikhoan.php';
$cate_list = get_all_Cate();
$prod_list = get_hot_Prod();
include 'view/header.php';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'products':
            if ((isset($_POST['kyw'])) && ($_POST['kyw'] != ""))
                $kyw = $_POST['kyw'];
            else $kyw = "";
            if ((isset($_GET['id'])) && ($_GET['id'] > 0))
                $id = $_GET['id'];
            else $id = 0;
            $cate = get_one_Cate($id);
            $prod_list = get_all_Prod($kyw, $id);
            include 'view/products.php';
            break;
        case 'giohang_add':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $film_id = $_POST['id'];
                $film_name = $_POST['name'];
                $img = $_POST['image'];
                $price = $_POST['price'];
                if (isset($_POST['sl']) && ($_POST['sl'] > 0))
                    $sl = $_POST['sl'];
                else $sl = 1;
                $flag = 0;
                $i = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[1] == $film_name) {
                        $slnew = $sl + $item[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $flag = 1;
                        break;
                    }
                    $i++;
                }
                if ($flag == 0) {
                    $item = array($film_id, $film_name, $img, $price, $sl);
                    $_SESSION['giohang'][] = $item;
                }
                header('location: index.php?act=viewcart');
            }
            if (isset($_POST['view']) && ($_POST['view'])) {
                $film_id = $_POST['id'];
                $prod = get_one_Prod($film_id);
                include "view/product_info.php";
            }
            break;
        case "giohang_del":
            if (isset($_GET['i']) && ($_GET['i'] >= 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
            } else {
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location: index.php?act=viewcart');
            } else {
                header('location: index.php');
            }
            break;
        case "sanpham_chitiet":
            if ((isset($_GET['id'])) && ($_GET['id'] > 0))
                $id = $_GET['id'];
            $prod = get_one_Prod($id);
            view_increased($id);
            include "view/product_info.php";
            break;
        case 'exit':
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            header('location: index.php');
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = getUser_info($user, $pass);
                $role = $kq[0]['role'];
                if ($role == 1) {
                    $_SESSION['role'] = $role;
                    header('location: admin/index.php');
                } else {
                    $_SESSION['role'] = $role;
                    $_SESSION['iduser'] = $kq[0]['id'];
                    $_SESSION['username'] = $kq[0]['user'];
                    header('location: index.php');
                    break;
                }
            }
        case 'signin':
            if ((isset($_POST['signin'])) && ($_POST['signin'])) {
                $name = $_POST['name'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $addr = $_POST['addr'];
                $email = $_POST['email'];
                add_User($name, $addr, $email, $user, $pass, 0);
                $new = "dang ky thanh cong";
            }
            include 'view/dangky.php';
            break;
        case 'thanhtoan':
            if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
                $total = $_POST['total'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                if (isset($_POST['pttt']))
                    $pttt = $_POST['pttt'];
                else $pttt = 1;
                if (isset($_SESSION['iduser']))
                    $user_id = $_SESSION['iduser'];
                else $user_id = 0;
                $date = date('Y/m/d');
                $code = "aba" . rand(0, 999999);
                $id = createOrder($code, $total, $pttt, $date, $user_id, $name, $address, $email, $tel);
                $_SESSION['id'] = $id;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        add_to_cart($id, $item[0], $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            }
            include 'view/order.php';
            break;
        case 'viewcart':
            $sum_price=0;
            include 'view/viewcart.php';
            break;
        case 'dangnhap':
            include 'view/dangnhap.php';
            break;
        case 'dangky':
            include 'view/dangky.php';
            break;
        case 'user':
            $user = get_one_User($_SESSION['iduser']);
            $id = get_orderId_from_userId($user[0]['id']);
            include "view/user.php";
            break;
        case 'donhang_del_sanpham':
            $user = get_one_User($_SESSION['iduser']);
            $id = get_orderId_from_userId($user[0]['id']);
            if (isset($_GET['id'])) {
                $cart_id = $_GET['id'];
            }
            $order_id = $_GET['order_id'];
            $order = get_one_Order($order_id);
            $cart = get_one_Cart($cart_id);
            $s = $order[0]['total'] - ($cart[0]['sum_price'] * $cart[0]['amount']);
            update_Total_Order($order_id, $s);
            delete_film_in_Order($cart_id);
            $cart_list = get_all_Cart_in_Order($order_id);
            if (count($cart_list) > 0) {
                $order_list = get_all_Order();
                include "view/user.php";
                break;
            } else {
                delete_Order($order_id);
                unset($_SESSION['giohang']);
                header('location: ./index.php?act=user');
                break;
            }
        case 'user_update':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $addr = $_POST['addr'];
                $mail = $_POST['mail'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = 0;
                update_User($id, $name, $addr, $mail, $user, $pass, $role);
            }
            $user = get_one_User($_SESSION['iduser']);
            include "view/user.php";
            break;
        default:
            include 'view/home.php';
            break;
    }
} else include 'view/home.php';

include 'view/footer.php';
