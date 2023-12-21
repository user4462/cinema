<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>