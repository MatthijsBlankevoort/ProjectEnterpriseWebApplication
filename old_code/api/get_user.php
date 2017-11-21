<?php
require "../config.php";
header('Content-type:application/json;charset=utf-8');

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8mb4', $db_user, $db_pass);

$query = ("
        SELECT
            id,
            username
        FROM
            user
        WHERE
            username = :username
");

$params = array(
    ":username" => "Cedric"
);

$sth = $db->prepare($query);
$sth->execute($params);
$result = $sth->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);