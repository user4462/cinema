<?php
session_start();
ob_start();
include '../../model/connection.php';
include '../../model/binhluan.php';
include '../../model/taikhoan.php';
$idprod = $_REQUEST['idprod'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .table th,
        .table td {
            word-wrap: break-word;
            white-space: normal;
            max-width: 500px;
            /* Limit maximum width for better responsiveness */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Add ellipsis for long content */
        }
    </style>
</head>

<body>
    <div class="border">
        <h3>Binh luan</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 300px;">Noi dung</th>
                    <th scope="col" style="width: 150px;">Nguoi binh luan</th>
                    <th scope="col" style="width: 100px;">Ngay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $comment = new Commemt();
                    $comt_list = $comment->get_all_Comt($idprod);
                    foreach ($comt_list as $item) {
                        $account = new Account();
                        $user = $account->get_one_User($item['user_id']);
                        echo '
                <tr><td>' . $item['content'] . '</td>
                <td>' . $user[0]['name'] . '</td>
                <td>' . $item['date'] . '</td></tr>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="content" placeholder="Nhap binh luan">
            </div>
            <input type="hidden" class="form-control" name="prod_id" value="<?= $idprod ?>">
            <button type="submit" class="btn btn-primary" name="addCmt" value="addCmt">Submit</button>
        </form>
    </div>
    <?php
    if (isset($_POST['addCmt']) && ($_POST['addCmt'])) {
        if (!isset($_SESSION['iduser'])) header('location: ../../index.php?act=dangnhap');
        else {
            $user_id = $_SESSION['iduser'];
            $content = $_POST['content'];
            $film_id = $_POST['prod_id'];
            $date = date('Y/m/d');
            $comment = new Commemt();
            $comment->add_Comt($content, $user_id, $film_id, $date);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>