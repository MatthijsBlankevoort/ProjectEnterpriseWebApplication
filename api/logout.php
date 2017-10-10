<?php
header('Content-type:application/json;charset=utf-8');

session_start();
session_destroy();

$data['message'] = "You successfully logout!";

die(json_encode($data['message']));