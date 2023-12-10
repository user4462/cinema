<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="view/style.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="main">
            <h2>THONG KE NAM 2023</h2>
            <table class="table-bordered border-dark custom-table">
                <thead>
                    <tr>
                        <th class="border-2 p-2"></th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 1</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 2</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 3</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 4</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 5</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 6</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 7</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 8</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 9</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 10</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 11</th>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Thang 12</th>
                    </tr>
                </thead>
                <?php
                $arr = array();
                for ($i = 1; $i <= 12; $i++) {
                    $s = count_prod_in_month($i);
                    if ($s[0][0] != "")
                        $arr[$i] = $s[0][0];
                    else $arr[$i] = 0;
                } ?>
                <tbody>
                    <tr>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">So luong da ban</th>
                        <td class="border-2 p-2"><?= $arr[1] ?></td>
                        <td class="border-2 p-2"><?= $arr[2] ?></td>
                        <td class="border-2 p-2"><?= $arr[3] ?></td>
                        <td class="border-2 p-2"><?= $arr[4] ?></td>
                        <td class="border-2 p-2"><?= $arr[5] ?></td>
                        <td class="border-2 p-2"><?= $arr[6] ?></td>
                        <td class="border-2 p-2"><?= $arr[7] ?></td>
                        <td class="border-2 p-2"><?= $arr[8] ?></td>
                        <td class="border-2 p-2"><?= $arr[9] ?></td>
                        <td class="border-2 p-2"><?= $arr[10] ?></td>
                        <td class="border-2 p-2"><?= $arr[11] ?></td>
                        <td class="border-2 p-2"><?= $arr[12] ?></td>
                </tbody>
                <?php
                $arr = array();
                for ($i = 1; $i <= 12; $i++) {
                    $s = sum_total_in_month($i);
                    if ($s[0][0] != "")
                        $arr[$i] = $s[0][0];
                    else $arr[$i] = 0;
                } ?>
                <tbody>
                    <tr>
                        <th class="border-2 p-2" style="background-color: #d3dce3;">Doanh thu</th>
                        <td class="border-2 p-2"><?= $arr[1] ?></td>
                        <td class="border-2 p-2"><?= $arr[2] ?></td>
                        <td class="border-2 p-2"><?= $arr[3] ?></td>
                        <td class="border-2 p-2"><?= $arr[4] ?></td>
                        <td class="border-2 p-2"><?= $arr[5] ?></td>
                        <td class="border-2 p-2"><?= $arr[6] ?></td>
                        <td class="border-2 p-2"><?= $arr[7] ?></td>
                        <td class="border-2 p-2"><?= $arr[8] ?></td>
                        <td class="border-2 p-2"><?= $arr[9] ?></td>
                        <td class="border-2 p-2"><?= $arr[10] ?></td>
                        <td class="border-2 p-2"><?= $arr[11] ?></td>
                        <td class="border-2 p-2"><?= $arr[12] ?></td>
                </tbody>
            </table>
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