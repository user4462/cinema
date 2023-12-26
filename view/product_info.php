<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .film-thumbnail {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 100%;
            height: 300px;
            /* Chiều cao cố định (có thể điều chỉnh) */
        }

        .film-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .film-thumbnail:hover {
            transform: scale(1.05);
        }

        .film-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            text-align: center;
            box-sizing: border-box;
        }
    </style>



</head>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="desc1-left col-md-5 pb-3">
                <img src="/uploads/<?= $prod[0]['img'] ?>" class="" alt="" height="500px" width="350px">
            </div>
            <div class="desc1-right col-md-6 pl-lg-4">
                <h3><?= $prod[0]['film_name'] ?></h3>
                <h5>
                    <span class="me-1">$<?= $prod[0]['price'] ?></span>
                    <span class="text-decoration-line-through">$<?= $prod[0]['old_price'] ?></span>
                </h5>
                <div class="available mt-3">
                    <form action="index.php?act=giohang_add" method="post" class="w3layouts-newsletter">
                        <input type="hidden" value="<?= $prod[0]['film_id'] ?>" name="id">
                        <input type="hidden" value="<?= $prod[0]['film_name'] ?>" name="name">
                        <input type="hidden" value="<?= $prod[0]['img'] ?>" name="image">
                        <input type="hidden" value="<?= $prod[0]['price'] ?>" name="price">
                        <div class="d-flex">
                            <input type="number" value="1" min=1 max=50 name="sl" required="">
                            <button type="submit" class="btn btn-outline-primary" name="addtocart" value="addtocart"><i class="fa-solid fa-cart-shopping pe-2"></i>Add</button>
                        </div>
                    </form>
                    <div>
                        <?= $prod[0]['detail'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <h3>Trailer</h3>
                <p class="fs-5"><?= $prod[0]['trailer'] ?></p>
            </div>
            <div class="col-md-6 pl-lg-4">
                <h3>Gioi thieu</h3>
                <p class="fs-5"><?= $prod[0]['desc'] ?></p>
            </div>
        </div>
        <div class="row pt-3">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#cmt").load("view/comment/comment_form.php", {
                        idprod: <?= $prod[0]['film_id'] ?>
                    });
                });
            </script>
            <div class="" id="cmt">
            </div>
        </div>
        <div class="row pt-3 film-suggestion">
            <h3>Phim gợi ý</h3>
            <div class="container">
                <div class="row">
                    <?php foreach ($prod_list as $item) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="film-thumbnail">
                                <a href="index.php?act=sanpham_chitiet&id=<?= $item['film_id'] ?>">
                                    <img src="./uploads/<?= $item['img'] ?>" class="img-fluid" alt="<?= $item['film_name'] ?>">
                                    <p class="film-title"><?= $item['film_name'] ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>