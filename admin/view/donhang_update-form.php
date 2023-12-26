<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="main">
        <h2>CAP NHAT DON HANG</h2>
        <form class="custom-form" action="index.php?act=donhang_update" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="" id="" value="<?php echo $order_info[0]['code'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="" value="<?php echo $order_info[0]['user_name']?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="addr" id="" value="<?php echo $order_info[0]['address'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="mail" id="" value="<?php echo $order_info[0]['email'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="tel" id="" value="<?php echo $order_info[0]['tel'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="total" id="" value="<?php echo $order_info[0]['total'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="date" id="" value="<?php echo $order_info[0]['date'] ?>">
            </div>
            <div class="mb-3">
                <tr>
                    <?php
                    if ($order_info[0]['pttt'] == 1)
                        echo '<input type="radio" name="pttt" value="1" checked>Thanh toan khi nhan hang <br>
                        <input type="radio" name="pttt" value="2">Thanh toan chuyen khoan <br>
                        <input type="radio" name="pttt" value="3">Thanh toan vi Momo <br>';
                    else if ($order_info[0]['pttt'] == 2)
                        echo '<input type="radio" name="pttt" value="1">Thanh toan khi nhan hang <br>
                        <input type="radio" name="pttt" value="2" checked>Thanh toan chuyen khoan <br>
                        <input type="radio" name="pttt" value="3">Thanh toan vi Momo <br>';
                    else
                        echo '<input type="radio" name="pttt" value="1">Thanh toan khi nhan hang <br>
                        <input type="radio" name="pttt" value="2">Thanh toan chuyen khoan <br>
                        <input type="radio" name="pttt" value="3" checked>Thanh toan vi Momo <br>';
                    ?>
                </tr>
            </div>
            <input type="hidden" name="id" value="<?php echo $order_info[0]['id'] ?>">
            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ten san pham</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hinh anh</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Don gia</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">So luong</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Thanh tien</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php
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
                            <a href="index.php?act=donhang_del_sanpham&order_id=' . $order_info[0]['id'] . '&id=' . $item['id'] . '">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>';
                $i++;
            }
            ?>
            <th class="border-2 p-2" style="background-color: #d3dce3;" colspan="5">Tong</th>
            <td class="border-2 p-2"><?= $s ?></td>
            <td class="border-2 p-2"></td>
        </table>
        <br>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ma don hang</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Nguoi mua</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Dia chi</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Email</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">So dien thoai</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Gia tri don hang</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Phuong thuc thanh toan</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php if (isset($order_list) && (count($order_list) > 0)) {
                $i = 1;
                foreach ($order_list as $item) {
                    if ($item['pttt'] == 1) $temp = "Thanh toan khi nhan hang";
                    else if ($item['pttt'] == 2) $temp = "Thanh toan chuyen khoan";
                    else $temp = "Thanh toan vi Momo";
                    echo '<tbody>
                <tr>
                    <td class="border-2 p-2">' . $i . '</td>
                    <td class="border-2 p-2">' . $item['code'] . '</td>
                    <td class="border-2 p-2">' . $item['user_name'] . '</td>
                    <td class="border-2 p-2">' . $item['address'] . '</td>
                    <td class="border-2 p-2">' . $item['email'] . '</td>
                    <td class="border-2 p-2">' . $item['tel'] . '</td>
                    <td class="border-2 p-2">' . $item['total'] . '</td>
                    <td class="border-2 p-2">' . $temp . '</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=donhang_edit&id=' . $item['id'] . '">Edit</a>
                            <a href="index.php?act=donhang_del_sanpham&id=' . $item['id'] . '">Delete</a>
                        </div>
                    </td>
                </tr>
            </tbody>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>