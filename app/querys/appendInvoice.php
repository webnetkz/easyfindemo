<?php

session_start();
require_once '../DB.php';

$agent = $_POST['invAgent'];
$item = $_POST['invItem'];
$value = $_POST['invValue'];
$date = date('d.m.y');

$sql = 'INSERT INTO invoice(today, agent, items, value_1) VALUES ("'.$date.'","'.$agent.'", "'.$item.'", "'.$value.'")';
$res = $pdo->query($sql);

$_SESSION['msg'] = 'Новый счет на оплату сформирован';

header('Location: index.php');