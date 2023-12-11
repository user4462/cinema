<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .custom-form {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <h2>DON HANG</h2>
                <?php
                foreach ($id as $key) {
                    $order=get_one_Order($key['id']);
                    echo '
                    <table class="table-bordered border-dark custom-table mt-4">
                        <thead>
                            <tr>
                                <th class="border-2 p-2 fs-5" colspan="7" style="background-color: #d3dce3;">Ma don hang: '.$order[0]['code'].'</th>
                            </tr>
                            <tr>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">Ten san pham</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">Hinh anh</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">Don gia</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">So luong</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">Thanh tien</th>
                                <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                            </tr>
                        </thead>';
                    $cart_list = get_all_Cart_in_Order($key['id']);
                    $i = 0;
                    $s = 0;
                    foreach ($cart_list as $item) {
                        $tt = $item['sum_price'] * $item['amount'];
                        $s += $tt;
                        echo '<tbody>
                                    <tr>
                                        <td class="border-2 p-2">' . ($i + 1) . '</td>
                                        <td class="border-2 p-2">' . $item['film_name'] . '</td>
                                        <td class="border-2 p-2"><img src="../uploads/' . $item['img'] . '" height=120px width=80px></td>
                                        <td class="border-2 p-2">' . $item['sum_price'] . '</td>
                                        <td class="border-2 p-2">' . $item['amount'] . '</td>
                                        <td class="border-2 p-2">' . $tt . '</td>
                                        <td class="border-2 p-2">
                                            <div class="d-flex justify-content-around">
                                            <a href="index.php?act=donhang_del_sanpham&order_id=' . $key['id'] . '&id=' . $item['id'] . '">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>';
                        $i++;
                    }
                    echo '<th class="border-2 p-2" style="background-color: #d3dce3;" colspan="5">Tong</th>
                        <td class="border-2 p-2">' . $s . '</td>
                        <td class="border-2 p-2"></td>';
                }
                ?>
                </table>
            </div>
            <div class="col-md-12 col-lg-6">
                <h2>
                    TAI KHOAN <a href="" class="text-danger"><?= $user[0]['user'] ?></a>
                </h2>
                <form class="custom-form" action="index.php?act=user_update" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        Ten nguoi dung
                        <input type="text" class="form-control" name="name" id="" value="<?= $user[0]['name'] ?>">
                    </div>
                    <div class="mb-3">
                        Dia chi
                        <input type="text" class="form-control" name="addr" id="" value="<?= $user[0]['address'] ?>">
                    </div>
                    <div class="mb-3">
                        Email
                        <input type="text" class="form-control" name="mail" id="" value="<?= $user[0]['email'] ?>">
                    </div>
                    <div class="mb-3">
                        Tai khoan
                        <input type="text" class="form-control" name="user" id="" value="<?= $user[0]['user'] ?>">
                    </div>
                    <div class="mb-3">
                        Mat khau
                        <input type="text" class="form-control" name="pass" id="" value="<?= $user[0]['pass'] ?>">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="" value="<?= $user[0]['id'] ?>">
                    <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>