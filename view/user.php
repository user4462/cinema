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
        <h2>TAI KHOAN <?= $user[0]['user'] ?></h2>
        <form class="custom-form" action="index.php?act=user_update" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                Ten nguoi dung
                <input type="text" class="form-control" name="name" id="" value="<?= $user[0]['name'] ?>">
            </div>
            <div class="mb-3">
                Dia chi
                <input type="text" class="form-control" name="addr" id="" value="<?= $user[0]['address'] ?>">
            </div>
            <div class="mb-3">
                Email
                <input type="text" class="form-control" name="mail" id="" value="<?= $user[0]['email'] ?>">
            </div>
            <div class="mb-3">
                Tai khoan
                <input type="text" class="form-control" name="user" id="" value="<?= $user[0]['user'] ?>">
            </div>
            <div class="mb-3">
                Mat khau
                <input type="text" class="form-control" name="pass" id="" value="<?= $user[0]['pass'] ?>">
            </div>
            <input type="hidden" class="form-control" name="id" id="" value="<?= $user[0]['id'] ?>">
            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>