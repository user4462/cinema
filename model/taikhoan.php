<?php
function add_User($name, $addr, $mail, $user, $pass, $role)
{
    $conn = openCon();
    $sql = "INSERT INTO users (name,address,email,user,pass,role) 
    VALUES ('$name','$addr','$mail','$user','$pass','$role')";
    $conn->exec($sql);
}
function delete_User($id)
{
    $conn = openCon();
    $sql = "DELETE FROM users WHERE id=" . $id;
    $conn->exec($sql);
}
function update_User($id, $name, $addr, $mail, $user, $pass, $role)
{
    $conn = openCon();
    $sql = "UPDATE users SET name='" . $name . "',address='" . $addr . "',email='" . $mail . "',user='" . $user . "',pass='" . $pass . "',role='" . $role . "' WHERE id=" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function get_one_User($id)
{
    $conn = openCon();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    return $res;
}
function get_all_User()
{
    $conn = openCon();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    return $res;
}
function getUser_info($user, $pass)
{
    $conn = openCon();
    $stmt = $conn->prepare("SELECT * FROM users WHERE user='" . $user . "' AND pass='" . $pass . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    return $res;
}
function checkUser($user, $pass)
{
    $conn = openCon();
    $stmt = $conn->prepare("SELECT * FROM users WHERE user='" . $user . "' AND pass='" . $pass . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    if (count($res) > 0) return $res[0]['role'];
    else return 0;
}
