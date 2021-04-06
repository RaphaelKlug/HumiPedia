<?php
    if(isset($_GET['plant_id'])) {
        $plant_id = $_GET['plant_id'];
        require("db.php");
	$result=searchq($plant_id);
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
<?=$result>
</body>
</html>
