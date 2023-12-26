<?php
class Order
{

    function get_orderId_from_userId($id)
    {
        $conn = openCon();
        $sql = "SELECT id FROM orders WHERE user_id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    function sum_total_in_month($mon)
    {
        $conn = openCon();
        $sql = "SELECT sum(total) FROM `orders` WHERE month(date)=" . $mon;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    function count_prod_in_month($mon)
    {
        $conn = openCon();
        $sql = "SELECT sum(amount) FROM cart join orders on cart.order_id=orders.id and month(orders.date)=" . $mon;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
    function update_Total_Order($id, $total)
    {
        $conn = openCon();
        $sql = "UPDATE orders SET total='" . $total . "' WHERE id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function update_Order($id, $total, $pttt, $name, $address, $email, $tel, $date)
    {
        $conn = openCon();
        $sql = "UPDATE orders SET total='" . $total . "',pttt='" . $pttt . "',user_name='" . $name . "',address='" . $address . "',email='" . $email . "',tel='" . $tel . "',date='" . $date . "' WHERE id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function delete_Order($id)
    {
        $conn = openCon();
        $sql = "DELETE FROM cart WHERE order_id=" . $id;
        $conn->exec($sql);
        $sql = "DELETE FROM orders WHERE id=" . $id;
        $conn->exec($sql);
    }
    function delete_film_in_Order($id)
    {
        $conn = openCon();
        $sql = "DELETE FROM cart WHERE id=" . $id;
        $conn->exec($sql);
    }
    function createOrder($code, $total, $pttt, $date, $user_id, $name, $address, $email, $tel)
    {
        $conn = openCon();
        $sql = "INSERT INTO orders (code,total,pttt,date,user_id,user_name,address,email,tel) VALUES ('$code','$total','$pttt','$date','$user_id','$name','$address','$email','$tel')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return  $last_id;
    }
    function add_to_cart($order_id, $film_id, $film_name, $img, $sum_price, $amount)
    {
        $conn = openCon();
        $sql = "INSERT INTO cart (order_id,film_id,film_name,img,sum_price,amount) VALUES ('$order_id','$film_id','$film_name','$img','$sum_price','$amount')";
        $conn->exec($sql);
    }
    function get_all_Item_in_Order($id)
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM cart WHERE order_id=" . $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_one_Cart($id)
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM cart WHERE id=" . $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_Order_by_code($kyw)
    {
        $conn = openCon();
        $sql = "SELECT * FROM orders WHERE 1";
        if ($kyw != "")
            $sql .= " AND code like '%" . $kyw . "%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_one_Order($id)
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id=" . $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    function get_all_Order()
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM orders");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
    
}