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
        <button onclick="location.href = 'i1.php'" class="inp" type="submit" name="appendA">Счета на оплату</button>
        <button onclick="location.href = 'i2.php'" class="inp" type="submit" name="appendA">Акты вып.раб.</button>
        <button onclick="location.href = 'i3.php'" class="inp" type="submit" name="appendA">Накладные</button>
        <button onclick="location.href = 'i4.php'" class="inp" type="submit" name="appendA">Счета фактур</button>
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