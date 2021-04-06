<?php
    if(!isset($_GET['query'])) {
        $query = $_GET['query'];
    } else {
        $query = '';
    }
    require("db.php");
$result=searchq(query);
    if(strpos($result, "found" )!==false){
	header("Location plant.php?plant_id=".query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<header>
    <h1 id="title">Search</h1>
</header>
<form action="search.php">
    <label for="query">
        <input type="search" placeholder="Plant" name="query" id="query">
    </label>
    <input type="submit" value="Suchen"/>
</form>
<div id="results">
    <?=$results?>
</div>
</body>
</html>
