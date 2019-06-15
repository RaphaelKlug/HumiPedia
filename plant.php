<?php
    if(isset($_GET['plant_id'])) {
        $plant_id = $_GET['plant_id'];
        $pdo = new PDO("mysql:host=localhost;dbname=HumiPedia", 'read', '');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <header>
        <h1 id="title"><?php $plant_name ?></h1>
    </header>
</body>
</html>