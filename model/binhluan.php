<?php
class Commemt
{
    function add_Comt($content, $user_id, $film_id, $date)
    {
        $conn = openCon();
        $sql = "INSERT INTO comment (content,user_id,film_id,date) VALUES ('$content','$user_id','$film_id','$date')";
        $conn->exec($sql);
    }
    function delele_Comt($id)
    {
        $conn = openCon();
        $sql = "DELETE FROM comment WHERE id=" . $id;
        $conn->exec($sql);
    }
    function get_all_Comt($id)
    {
        $conn = openCon();
        $sql = "SELECT * FROM comment WHERE 1";
        if ($id > 0) $sql .= " AND film_id='" . $id . "' order by date desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();
        return $res;
    }
}
