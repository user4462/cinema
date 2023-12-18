<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main">

        <h2>DON HANG</h2>

        <form class="custom-form" action="index.php?act=donhang_add" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="code" id="" placeholder="Ma don hang">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="" placeholder="Nguoi mua">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="addr" id="" placeholder="Dia chi">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="mail" id="" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="tel" id="" placeholder="So dien thoai">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="total" id="" placeholder="Gia tri hang hoa">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="date" id="" placeholder="Ngay dat hang">
            </div>
            <div class="mb-3">
                <tr>
                    <input type="radio" name="pttt" value="1" selected>Thanh toan khi nhan hang <br>
                    <input type="radio" name="pttt" value="2">Thanh toan chuyen khoan <br>
                    <input type="radio" name="pttt" value="3">Thanh toan vi Momo <br>
                </tr>
            </div>
            <button type="submit" class="btn btn-primary" name="add" value="Add">Add New</button>
        </form>

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
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ngay dat hang</th>
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
                    <td class="border-2 p-2">' . $item['date'] . '</td>
                    <td class="border-2 p-2">' . $temp . '</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=donhang_edit&id=' . $item['id'] . '">Edit</a>
                            <a href="index.php?act=donhang_del&id=' . $item['id'] . '">Delete</a>
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