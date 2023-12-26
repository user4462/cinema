<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
include 'model/connection.php';
include 'model/danhmuc.php';
include 'model/donhang.php';
include 'model/sanpham.php';
include 'model/taikhoan.php';
include 'model/binhluan.php';
$category = new Category();
$cate_list = $category->get_all_Cate();
$product = new Product();
$prod_list = $product->get_hot_Prod();
include 'view/header.php';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'products':
            $category = new Category();
            $product = new Product();
            if ((isset($_POST['kyw'])) && ($_POST['kyw'] != ""))
                $kyw = $_POST['kyw'];
            else $kyw = "";
            if ((isset($_GET['id'])) && ($_GET['id'] > 0))
                $id = $_GET['id'];
            else $id = 0;
            $cate = $category->get_one_Cate($id);
            $prod_list = $product->get_all_Prod($kyw, $id);
            include 'view/products.php';
            break;
        case 'giohang_add':
            $product = new Product();
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
                $prod = $product->get_one_Prod($film_id);
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
            $product = new Product();
            if ((isset($_GET['id'])) && ($_GET['id'] > 0))
                $id = $_GET['id'];
            $prod = $product->get_one_Prod($id);
            $product->view_increased($id);
            $prod_list = $product->get_Ramdom_Prod();
            include "view/product_info.php";
            break;
        case 'exit':
            unset($_SESSION['kq']);
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            header('location: index.php');
            break;
        case 'login':
            $account = new Account();
            if (isset($_POST['login']) && ($_POST['login'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $kq = $account->getUser_info($user, $pass);
                if ($kq == null) {
                    $new = 'Tai khoan hoac mat khau khong dung';
                    include 'view/dangnhap.php';
                    break;
                } else {
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
            }
        case 'signin':
            $account = new Account();
            if ((isset($_POST['signin'])) && ($_POST['signin'])) {
                $name = $_POST['name'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $addr = $_POST['addr'];
                $email = $_POST['email'];
                if ($name == '' || $user == '' || $pass == '' || $addr == '' || $email == '') {
                    $new = 0;
                } else {
                    $account->add_User($name, $addr, $email, $user, $pass, 0);
                    $new = 1;
                }
            }
            include 'view/dangky.php';
            break;
        case 'thanhtoan':
            $account = new Account();
            $order = new Order;
            if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
                $total = $_POST['total'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                if (isset($_POST['pttt']))
                    $pttt = $_POST['pttt'];
                else $pttt = 1;
                if (isset($_SESSION['iduser'])) {
                    $user_id = $_SESSION['iduser'];
                    $user =  $account->get_one_User($user_id);
                    $name = $user[0]['name'];
                    $email = $user[0]['email'];
                } else {
                    $user_id = 0;
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                }
                $date = date('Y/m/d');
                $code = "aba" . rand(0, 999999);
                $id = $order->createOrder($code, $total, $pttt, $date, $user_id, $name, $address, $email, $tel);
                $_SESSION['id'] = $id;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        $order->add_to_cart($id, $item[0], $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            }
            include 'view/order.php';
            break;
        case 'viewcart':
            if (isset($_SESSION['iduser'])) {
                $account = new Account();
                $user = $account->get_one_User($_SESSION['iduser']);
            }
            $sum_price = 0;
            include 'view/viewcart.php';
            break;
        case 'dangnhap':
            include 'view/dangnhap.php';
            break;
        case 'dangky':
            include 'view/dangky.php';
            break;
        case 'user':
            $account = new Account();
            $order = new Order();
            $user = $account->get_one_User($_SESSION['iduser']);
            $id = $order->get_orderId_from_userId($user[0]['id']);
            include "view/user.php";
            break;
        case 'donhang_del_sanpham':
            $account = new Account();
            $order = new Order();
            $user = $account->get_one_User($_SESSION['iduser']);
            $id = $order->get_orderId_from_userId($user[0]['id']);
            if (isset($_GET['id'])) {
                $cart_id = $_GET['id'];
            }
            $order_id = $_GET['order_id'];
            $order_info = $order->get_one_Order($order_id);
            $cart = $order->get_one_Cart($cart_id);
            $s = $order[0]['total'] - ($cart[0]['sum_price'] * $cart[0]['amount']);
            $order->update_Total_Order($order_id, $s);
            $order->delete_film_in_Order($cart_id);
            $cart_list =  $order->get_all_Item_in_Order($order_id);
            if (count($cart_list) > 0) {
                $order_list =  $order->get_all_Order();
                include "view/user.php";
                break;
            } else {
                $order->delete_Order($order_id);
                unset($_SESSION['giohang']);
                header('location: ./index.php?act=user');
                break;
            }
        case 'user_update':
            $account = new Account();
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $addr = $_POST['addr'];
                $mail = $_POST['mail'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = 0;
                $account->update_User($id, $name, $addr, $mail, $user, $pass, $role);
            }
            $user = $account->get_one_User($_SESSION['iduser']);
            include "view/user.php";
            break;
        case 'about':
            include "view/about_us.php";
            break;
        default:
            include 'view/home.php';
            break;
    }
} else include 'view/home.php';

include 'view/footer.php';
