<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <div class="banner pt-1">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/deovnpo-13edcd12-5482-454b-8b12-06d6a7b3ee2f.jpg" class="d-block w-100" height="960px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/carousel-3.jpg" class="d-block w-100" height="960px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/fast-x-4004x5000-10989.jpg" class="d-block w-100" height="960px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <main>
        <div class="container pt-4">
            <div class="row pb-1">
                <div class="col-6">
                    <h1>Phim hot</h1>
                </div>
                <div class="col-6 ">
                    <nav class="navbar bg-body-tertiary justify-content-end">
                        <form action="index.php?act=products" method="post" class="d-flex" role="search">
                            <button class="btn btn-outline-tertiary" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input class="form-control me-2" type="search" placeholder="" aria-label="Search" name="kyw">
                        </form>
                    </nav>
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
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>