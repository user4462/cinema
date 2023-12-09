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
        <h2>CAP NHAT DANH MUC</h2>
        <form class="custom-form" action="index.php?act=danhmuc_update" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="" value="<?php echo $cate[0]['cate_name'] ?>">
                <input type="hidden" name="id" value="<?php echo $cate[0]['cate_id'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ten danh muc</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php if (isset($cate_list) && (count($cate_list) > 0)) {
                $i = 1;
                foreach ($cate_list as $item) {
                    echo '<tbody>
                <tr>
                    <td class="border-2 p-2">' . $i . '</td>
                    <td class="border-2 p-2">' . $item['cate_name'] . '</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=danhmuc_edit&id=' . $item['cate_id'] . '">Edit</a>
                            <a href="index.php?act=danhmuc_del&id=' . $item['cate_id'] . '">Delete</a>
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