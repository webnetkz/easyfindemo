<?php
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
            <p>Новый счет на оплату</p>
            <select name="invAgent" class="inp">
                <option value="">Агент</option>
            </select>
            <select name="invItems" class="inp">
                <option value="">Товар\Услуга</option>
            </select>
            <input type="number" class="inp" placeholder="Кол-во" name="invValue">
            <button id="appendA" class="inp" type="submit" name="appendA">Создать</button>
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