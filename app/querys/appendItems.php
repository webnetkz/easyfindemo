<?php

session_start();
require_once '../DB.php';

$name = $_POST['itmName'];
$price = $_POST['itmPrice'];
$code = $_POST['itmCode'];
$unit = 'шт.';
$price_code = '768';

$sql = 'INSERT INTO items(`name`, price, code, unit, code_price) VALUES ("'.$name.'","'.$price.'", "'.$code.'", "'.$unit.'", "'.$price_code.'")';
$res = $pdo->query($sql);

$_SESSION['msg'] = 'Новая услуга\товар успешно добавлен';

header('Location: index.php');