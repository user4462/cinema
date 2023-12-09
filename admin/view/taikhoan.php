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
        <h2>TAI KHOAN</h2>
        <form class="custom-form" action="index.php?act=taikhoan_add" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="" placeholder="Ten nguoi dung">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="addr" id="" placeholder="Dia chi">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="mail" id="" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="user" id="" placeholder="Tai khoan">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="pass" id="" placeholder="Password">
            </div>
            <div class="mb-3">
                <select name="role" id="">
                    <option value="">Chon vai tro</option>
                    <option value="1">Tai khoan Admin</option>
                    <option value="0">Tai khoan nguoi dung</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add" value="Add">Add New</button>
        </form>
        <table class="table-bordered border-dark custom-table">
            <thead>
                <tr>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">STT</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Ten nguoi dung</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Dia chi</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Email</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Tai khoan</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Mat khau</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Vai tro</th>
                    <th class="border-2 p-2" style="background-color: #d3dce3;">Hanh dong</th>
                </tr>
            </thead>
            <?php if (isset($user_list) && (count($user_list) > 0)) {
                $i = 1;
                foreach ($user_list as $item) {
                    if($item['role']==1) $role="Tai khoan Admin"; else $role="Tai khoan nguoi dung";
                    echo '<tbody>
                <tr>
                    <td class="border-2 p-2">' . $i . '</td>
                    <td class="border-2 p-2">'.$item['name'].'</td>
                    <td class="border-2 p-2">'.$item['address'].'</td>
                    <td class="border-2 p-2">'.$item['email'].'</td>
                    <td class="border-2 p-2">'.$item['user'].'</td>
                    <td class="border-2 p-2">'.$item['pass'].'</td>
                    <td class="border-2 p-2">'.$role.'</td>
                    <td class="border-2 p-2">
                        <div class="d-flex justify-content-around">
                            <a href="index.php?act=taikhoan_edit&id=' . $item['id'] . '">Edit</a>
                            <a href="index.php?act=taikhoan_del&id=' . $item['id'] . '">Delete</a>
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