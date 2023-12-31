<?php
class Product
{
    function get_Ramdom_Prod()
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM film ORDER BY RAND() LIMIT 4");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_hot_Prod()
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM film order by view desc limit 0,6");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function view_increased($id)
    {
        $conn = openCon();
        $sql = "UPDATE film SET view=view+1 WHERE film_id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function add_Prod($cate_id, $film_name, $old_price, $price, $img, $view)
    {
        $conn = openCon();
        $sql = "INSERT INTO film (cate_id,film_name,old_price,price,img,view) VALUES ('$cate_id','$film_name','$old_price','$price','$img','$view')";
        $conn->exec($sql);
    }

    function delete_Prod($id)
    {
        $conn = openCon();
        $sql = "DELETE FROM film WHERE film_id=" . $id;
        $conn->exec($sql);
    }
    function update_Prod($id, $film_name, $img, $view, $old_price, $price, $cate_id)
    {
        $conn = openCon();
        if ($img == "") {
            $sql = "UPDATE film SET film_name='" . $film_name . "',view='" . $view . "',old_price='" . $old_price . "',price='" . $price . "',cate_id='" . $cate_id . "' WHERE film_id=" . $id;
        } else {
            $sql = "UPDATE film SET film_name='" . $film_name . "',view='" . $view . "',old_price='" . $old_price . "',price='" . $price . "',cate_id='" . $cate_id . "',img='" . $img . "' WHERE film_id=" . $id;
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function get_one_Prod($id)
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM film WHERE film_id=" . $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_all_Prod($kyw = "", $cate_id = 0)
    {
        try {
            $conn = openCon();
            $sql = "SELECT * FROM film WHERE 1";

            if (!empty($kyw)) {
                $sql .= " AND film_name LIKE :keyword";
            }

            if ($cate_id > 0) {
                $sql .= " AND cate_id = :cate_id";
            }

            $stmt = $conn->prepare($sql);

            if (!empty($kyw)) {
                $keyword = '%' . $kyw . '%';
                $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
            }

            if ($cate_id > 0) {
                $stmt->bindParam(':cate_id', $cate_id, PDO::PARAM_INT);
            }

            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            return $res;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ PDO tại đây
            // Ví dụ: log lỗi, hiển thị thông báo, ...
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
