<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/style.css">
    <style>
        :root {
            --primary: #263b5c;
        }
    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="case py-3">
            <div class="custom-form">
                <form action="index.php?act=signin" method="post">
                    <fieldset>
                        <legend class="py-3 d-flex justify-content-center fs-2 fw-bold" style="color:var(--primary);">DANG KY</legend>
                        <div class="my-3">
                            <input type="text" id="disabledTextInput" name="name" class="form-control" placeholder="Ten nguoi dung">
                        </div>
                        <div class="my-3">
                            <input type="text" id="disabledTextInput" name="user" class="form-control" placeholder="Tai khoan">
                        </div>
                        <div class="my-3">
                            <input type="text" id="disabledTextInput" name="pass" class="form-control" placeholder="Mat khau">
                        </div>
                        <div class="my-3">
                            <input type="text" id="disabledTextInput" name="addr" class="form-control" placeholder="Dia chi">
                        </div>
                        <div class="my-3">
                            <input type="text" id="disabledTextInput" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary w-50" name="signin" value="signin">Sign in</button></div>
                        <div class="text-danger mt-3">
                            <?php 
                                if((isset($new))&&($new!="")) echo $new;
                            ?>
                        </div>
                    </fieldset>
                </form>
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