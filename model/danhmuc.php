<?php
class Category
{
    function add_Cate($name)
    {
        $conn = openCon();
        $sql = "INSERT INTO category (cate_name) VALUES ('$name')";
        $conn->exec($sql);
    }
    function delele_Cate($id)
    {
        $conn = openCon();
        $sql = "DELETE FROM category WHERE id=" . $id;
        $conn->exec($sql);
    }
    function update_Cate($id, $name)
    {
        $conn = openCon();
        $sql = "UPDATE category SET cate_name='" . $name . "' WHERE id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function get_one_Cate($id)
    {
        $conn = openCon();
        if ($id > 0) {
            $stmt = $conn->prepare("SELECT * FROM category WHERE id=" . $id);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetch();
            return $res;
        } else return "";
    }
    function get_all_Cate()
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT * FROM category");
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
}
