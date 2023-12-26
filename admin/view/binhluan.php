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
        <h2>BINH LUAN</h2>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Noi dung</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Nguoi binh luan</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ten phim</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ngay</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php if (isset($comt_list) && (count($comt_list) > 0)) {
                $i = 1;
                foreach ($comt_list as $item) {
                    $acount=new Account();
                    $user=$acount->get_one_User($item['user_id']);
                    $product=new Product();
                    $film=$product->get_one_Prod($item['film_id']);
                    echo '<tbody>
                <tr>
                    <td class="border-2 p-2">' . $i . '</td>
                    <td class="border-2 p-2">' . $item['content'] . '</td>
                    <td class="border-2 p-2">' . $user[0]['name'] . '</td>
                    <td class="border-2 p-2">' . $film[0]['film_name'] . '</td>
                    <td class="border-2 p-2">' . $item['date'] . '</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=binhluan_del&id=' . $item['id'] . '">Delete</a>
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