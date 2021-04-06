<?php
    if(isset($_GET['plant_id'])) {
        $plant_id = $_GET['plant_id'];
        require("db.php");
	$result=searchq($plant_id);
    }
	$plant_name=substr($result, strpos($result, "<h1>")+4, strpos($result, "<h1>")-strpos($result, "<h1>"-4));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$plant_name?></title>
</head>
<body>
    <header>
        <h1 id="title"><?=$plant_name?></h1>
    </header>
<?=$result>
</body>
</html>
