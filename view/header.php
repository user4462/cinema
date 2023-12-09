<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary: #263b5c;
        }

        .background {
            background-color: var(--primary);
        }
    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="background">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand fs-2 ps-5 text-white" href="#">LOGO</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active fs-5 px-3 text-white" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fs-5 px-3 text-white" href="index.php?act=products" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Products
                                </a>
                                <ul class="dropdown-menu">
                                    <?php 
                                    $cate_list = get_all_Cate();
                                    foreach ($cate_list as $item) {
                                        echo '<li><a class="dropdown-item" href="index.php?act=products&id=' . $item['cate_id'] . '">' . $item['cate_name'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="justify-content-end pe-5">
                        <?php
                        if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                            echo '<a href="#""><button type=" button" class="btn btn-primary me-3">' . $_SESSION['username'] . '</button></a>';
                            echo '<a href="index.php?act=exit""><button type=" button" class="btn btn-primary me-3">Thoat</button></a>';
                        } else {
                        ?>
                            <a href="index.php?act=dangnhap"><button type=" button" class="btn btn-primary me-3">Dang nhap</button></a>
                            <a href="index.php?act=dangky"><button type=" button" class="btn btn-primary me-4">Dang ky</button></a>
                        <?php } ?>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <main>

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