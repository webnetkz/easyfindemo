<?php

session_start();
require_once '../DB.php';

$name = $_POST['agtName'];
$bin = $_POST['agtBin'];
$adres = $_POST['agtAdres'];
$bik = $_POST['agtBik'];
$contacts = $_POST['agtContacts'];

$sql = 'INSERT INTO agents(`name`, bin, adres, bik, contacts) VALUES ("'.$name.'","'.$bin.'", "'.$adres.'", "'.$bik.'", "'.$contacts.'")';
$res = $pdo->query($sql);

$_SESSION['msg'] = 'Новый агент успешно добавлен';

header('Location: index.php');