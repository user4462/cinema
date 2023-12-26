<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-4">
        <div class="row pb-1">
            <div class="col-6">
                <h1><?= $new ?></h1>
                <h1><?php if ($cate != "") echo $cate['cate_name']; ?></h1>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($prod_list as $item) {
                echo '<div class="col-md-6 col-lg-4 py-3">
                <div class="product-item py-3 border">
                    <form action="index.php?act=giohang_add" method="post">
                        <div class="bg-light overflow-hidden">
                            <a href="index.php?act=sanpham_chitiet&id=' . $item['film_id'] . '">
                                <img src="./uploads/' . $item['img'] . '" class="container-fluid w-100" alt="" height="470px">
                            </a>
                        </div>
                        <div class="text-center p-3">
                            <a href="index.php?act=sanpham_chitiet&id=' . $item['film_id'] . '" class="h5 d-block mb-2">' . $item['film_name'] . '</a>
                            <span class="me-1">$' . $item['price'] . '</span>
                            <span class="text-decoration-line-through">$' . $item['old_price'] . '</span>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-outline-primary w-100" name="view" value="view">
                                <i class="fa-solid fa-eye me-2"></i>
                                View
                            </button>
                            <button type="submit" class="btn btn-outline-primary w-100" name="addtocart" value="addtocart">
                                <i class="fa-solid fa-bag-shopping me-2"></i>
                                Add
                            </button>
                        </div>
                        <input type="hidden" value="' . $item['film_id'] . '" name="id">
                        <input type="hidden" value="' . $item['film_name'] . '" name="name">
                        <input type="hidden" value="' . $item['img'] . '" name="image">
                        <input type="hidden" value="' . $item['price'] . '" name="price">
                    </form>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>