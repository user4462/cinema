<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        input {
            border: none;
            outline: none;
        }
    </style>
</head>

<body>
    <ol class="breadcrumb ps-5">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">donhang</li>
    </ol>
    <section class="ab-info-main">
        <div class="container py-3">
            <div class="row contact-main-info mt-4">
                <div class="col-md-6 contact-left-content ">
                    <h3>Thong tin gio hang</h3>
                    <?php
                    if ((isset($_SESSION['id'])) && ($_SESSION['id'] > 0)) {
                        $cart_list = get_all_Cart_in_Order($_SESSION['id']);
                        if ((isset($cart_list)) && (count($cart_list) > 0)) {
                            echo '
                            <table class="table-bordered border-dark custom-table">
                                <thead>
                                    <tr>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">Ten san pham</th>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">Hinh anh</th>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">Don gia</th>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">So luong</th>
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thanh tien</th>
                                    </tr>
                                </thead>';
                            $i = 0;
                            $sum = 0;
                            foreach ($cart_list as $item) {
                                $tien = $item['amount'] * $item['sum_price'];
                                $sum += $tien;
                                echo
                                '<tbody>
                                    <tr>
                                        <td class="border-2 p-2">' . ($i + 1) . '</td>
                                        <td class="border-2 p-2">' . $item['film_name'] . '</td>
                                        <td class="border-2 p-2"><img src="./uploads/' . $item['img'] . '" width=80px></td>
                                        <td class="border-2 p-2">' . $item['sum_price'] . '</td>
                                        <td class="border-2 p-2">' . $item['amount'] . '</td>
                                        <td class="border-2 p-2">' . $tien . '</td>
                                    </tr>
                                </tbody>';
                                $i++;
                            }
                            echo '<td class="border-2 p-2" colspan="5">Tong</td><td class="border-2 p-2">' . $sum . '</td>';
                            echo '</table>';
                        }
                    } else echo 'gio hang trong.<a href="index.php"> tiep tuc dat hang</a>';
                    ?>
                </div>
                <div class="col-md-6 contact-right-content">
                    <h3>Thong tin giao hang</h3>
                    <?php
                    if ((isset($_SESSION['id'])) && ($_SESSION['id'] > 0)) {
                        $order = get_one_Order($_SESSION['id']);
                        if (count($order) > 0);
                    }
                    ?>
                    <h4>Ma don hang: <?= $order[0]['code'] ?></h4>
                    <table class="">
                        <thead>
                            <tr>
                                <td><strong>Ten nguoi nhan: </strong><br><?= $order[0]['user_name'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dia chi nguoi nhan: </strong><br><?= $order[0]['address'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email nguoi nhan: </strong><br><?= $order[0]['email'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dien thoai nguoi nhan: </strong><br><?= $order[0]['tel'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ngay dat hang: </strong><br><?= $order[0]['date'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phuong thuc thanh toan: </strong><br>
                                    <?php
                                    switch ($order[0]['pttt']) {
                                        case '1':
                                            $temp = "Thanh toan khi nhan hang";
                                            break;
                                        case '2':
                                            $temp = "Thanh toan chuyen khoan";
                                            break;
                                        default:
                                            $temp = "Thanh toan vi momo";
                                            break;
                                    }
                                    echo $temp;
                                    ?>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>