<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        input {
            border: none;
            /* Tắt viền cho tất cả trường nhập liệu */
            outline: none;
            /* Tắt đường viền xung quanh khi trường được chọn */
        }
    </style>
</head>

<body>
    <ol class="breadcrumb ps-5">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">giohang</li>
    </ol>
    <section class="ab-info-main">
        <div class="container py-3">
            <h3 class="tittle text-center">GIO HANG</h3>
            <div class="row contact-main-info mt-4">
                <div class="col-md-6 contact-left-content ">
                    <h3>San pham trong gia hang</h3>
                    <?php
                    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
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
                                        <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                                    </tr>
                                </thead>';
                        $i = 0;
                        $sum_price = 0;
                        foreach ($_SESSION['giohang'] as $item) {
                            $tt = $item[3]* $item[4];
                            $sum_price += $tt;
                            echo
                            '<tbody>
                                    <tr>
                                        <td class="border-2 p-2">' . ($i + 1) . '</td>
                                        <td class="border-2 p-2">' . $item[1] . '</td>
                                        <td class="border-2 p-2"><img src="./uploads/' . $item[2] . '" width=80px></td>
                                        <td class="border-2 p-2">' . $item[3] . '</td>
                                        <td class="border-2 p-2">' . $item[4] . '</td>
                                        <td class="border-2 p-2">' . $sum_price . '</td>
                                        <td class="border-2 p-2">
                                            <div class="d-flex justify-content-around">
                                                <a href="index.php?act=giohang_del&i=' . ($i) . '">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>';
                            $i++;
                        }
                        echo '<td class="border-2 p-2" colspan="5">Tong</td><td class="border-2 p-2">' . $sum_price . '</td><td class="border-2 p-2"></td>';
                        echo '</table>';
                    }
                    ?>
                    <div class="mt-4 text-decoration-none">
                        <a href="index.php" class="text-decoration-none">Tiep tuc mua hang</a> |
                        <a href="index.php?act=giohang_del" class="text-decoration-none">Xoa gio hang</a>
                    </div>
                </div>

                <div class="col-md-6 contact-right-content">
                    <h3>Thong tin dat hang</h3>
                    <form action="index.php?act=thanhtoan" method="post">
                        <input type="hidden" name="total" value="<?= $sum_price ?>">
                        <table class="table-bordered border-dark custom-table">
                            <thead>
                                <tr>
                                    <td class="border-2 p-2"><input type="text" name="name" id="" placeholder="Nhap ho ten"></td>
                                </tr>
                                <tr>
                                    <td class="border-2 p-2"><input type="text" name="address" id="" placeholder="Nhap dia chi"></td>
                                </tr>
                                <tr>
                                    <td class="border-2 p-2"><input type="text" name="email" id="" placeholder="Nhap email"></td>
                                </tr>
                                <tr>
                                    <td class="border-2 p-2"><input type="text" name="tel" id="" placeholder="Nhap sdt"></td>
                                </tr>
                                <tr>
                                    <td class="border-2 p-2">
                                        <input type="radio" name="pttt" value="1" selected>Thanh toan khi nhan hang <br>
                                        <input type="radio" name="pttt" value="2">Thanh toan chuyen khoan <br>
                                        <input type="radio" name="pttt" value="3">Thanh toan vi Momo <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-2 p-2">
                                        <button type="submit" class="btn btn-outline-primary" name="thanhtoan" value="thanhtoan">
                                            Thanh toan
                                        </button>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>