<?php
    session_start();
    require_once 'app/DB.php';
    
    $sql = 'SELECT * FROM invoice';
    $res = $pdo->query($sql);
    $res = $res->fetchAll(PDO::FETCH_ASSOC);

    //echo '<pre>';
    //var_dump($res);
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
        <?php
            foreach($res as $k => $v) {
                echo "<button onclick='location.href = \"tamplates/waybill.php\"' class=\"inp\">".$v['today'] .'/'. $v['agent']."</button>";
            }
        ?>
    
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