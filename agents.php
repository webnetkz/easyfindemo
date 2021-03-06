﻿<?php
    session_start();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="content">
        <?php
            if(!empty( $_SESSION['msg'] )) {
                echo '<p class="msg">'. $_SESSION['msg'] .'</p>';
            }
        ?>
        <form action="app/querys/appendAgents.php" method="POST">
            <p>Новый контрагент</p>
            <input type="text" class="inp" placeholder="Наименование агента" name="agtName">
            <input type="text" class="inp" placeholder="БИН\ИИН" name="agtBin">
            <input type="text" class="inp" placeholder="Юр. адрес" name="agtAdres">
            <input type="text" class="inp" placeholder="БИК" name="agtBik">
            <input type="text" class="inp" placeholder="Контакты" name="agtContacts">
            <button id="appendA" class="inp" type="submit" name="appendA">Добавить</button>
        </form>
    </div>
    <footer>
    <a href="invoice.php">
        <img src="public/img/invoice.png" id="invoice" class="menuItem">
    </a>
    <a href="docs.php">
        <img src="public/img/docs.png" id="docs" class="menuItem">
    </a>
    <a href="agents.php">
        <img src="public/img/agents.png" id="agents" class="menuItem">
    </a>
    <a href="items.php">
        <img src="public/img/items.png" id="items" class="menuItem">
    </a>
    <a href="user.php">
        <img src="public/img/user.png" id="user" class="menuItem">
    </a>
    </footer>
    <script src="public/js/main.js"></script>
</body>
</html>