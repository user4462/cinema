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
    .border {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    .table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    form {
        margin-top: 20px;
    }

    .form-control {
        width: 70%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-primary {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

</head>

<body>
<div class="border">
    <h3>Binh luan</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="width: 50%;">Noi dung</th>
                <th scope="col" style="width: 30%;">Nguoi binh luan</th>
                <th scope="col" style="width: 20%;">Ngay</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $comment = new Comment();
            $comt_list = $comment->get_all_Comt($idprod);

            foreach ($comt_list as $item) {
                $account = new Account();
                $user = $account->get_one_User($item['user_id']);
            ?>
                <tr>
                    <td><?= $item['content'] ?></td>
                    <td><?= $user[0]['name'] ?></td>
                    <td><?= $item['date'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" name="content" placeholder="Nhập bình luận">
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
            $comment = new Comment();
            $comment->add_Comt($content, $user_id, $film_id, $date);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>