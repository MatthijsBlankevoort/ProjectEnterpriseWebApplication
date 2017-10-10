<?php
//Inserting the config file
require "../config.php";
header('Content-type:application/json;charset=utf-8');

if (empty($_GET['username']) || empty($_GET['password'])) {
    die('Invalid data input.');
}

$username = $_GET['username'];
$password = $_GET['password'];

//Database Connection
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8mb4', $db_user, $db_pass);

//Query Statement
$query = ("
        SELECT
            id,
            password,
            salt
        FROM
            user
        WHERE
            username = :username
        LIMIT 
            1
");

//Parameters which we bind for the query
$params = array(
    ":username" => $username
);

//Preparing the query we wrote above
$sth = $db->prepare($query);

//Using the binded parameters with the prepared query.
$sth->execute($params);

//Fetching the result from the database.
$result = $sth->fetch(PDO::FETCH_ASSOC);


//If there is a result (Correct username/password) 
//we get a user returned and the variable is filled.
//Else the database did not return a user, so the credentials is invalid.
if ($result) {
    $hash = $result['password'];
    $salt = $result['salt'];
    
    $salty_hash = hash('sha256', $password.$salt);

    if ($hash == $salty_hash) {
        $_SESSION['user'] = $result['id'];
        echo "Succesfully authenticated!";
    } else {
        echo hash('sha256', $password.$salt);
        echo "Failed to authenticate!";
    }
}