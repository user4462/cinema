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
        <h2>SAN PHAM</h2>
        <form class="custom-form" action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <select name="cate_id" id="">
                    <option value="0">Chon danh muc</option>
                    <?php
                    if (isset($cate_list)) {
                        foreach ($cate_list as $value)
                            echo '<option value="' . $value['cate_id'] . '">' . $value['cate_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="" placeholder="Ten san pham">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="image" id="">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="view" id="" placeholder="Luot xem">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="old_price" id="" placeholder="Gia cu san pham">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="price" id="" placeholder="Gia san pham">
            </div>
            <button type="submit" class="btn btn-primary" name="add" value="Add">Add New</button>
        </form>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ten san pham</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hinh anh</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Luot xem</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Gia cu</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Gia</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php if (isset($prod_list) && (count($prod_list) > 0)) {
                $i = 1;
                foreach ($prod_list as $item) {
                    echo '<tbody>
                <tr>
                    <td class="border-2 p-2">' . $i . '</td>
                    <td class="border-2 p-2">' . $item['film_name'] . '</td>
                    <td class="border-2 p-2"><img src="' . $item['img'] . '" height="200px" width="140px"></td>
                    <td class="border-2 p-2">' . $item['view'] . '</td>
                    <td class="border-2 p-2">' . $item['old_price'] . '</td>
                    <td class="border-2 p-2">' . $item['price'] . '</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=sanpham_edit&id=' . $item['film_id'] . '">Edit</a>
                            <a href="index.php?act=sanpham_del&id=' . $item['film_id'] . '">Delete</a>
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