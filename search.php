<?php
    if(!isset($_GET['query'])) {
        $query = $_GET['query'];
    } else {
        $query = '';
    }

    $query = $_GET['query'];
    $pdo = new PDO("mysql:host=localhost;dbname=HumiPedia", 'read', '');
    $query = "%$query%";

    $statement = $pdo->prepare("SELECT id FROM plants WHERE LOWER(name) LIKE LOWER(:query)");
    $statement->bindParam(':query', $query);

    if ($statement->execute()) {
        $results = $statement->fetchAll();
    } else {
        echo "Error at search.php:9";
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
    <?php
        if(0 < count($results)) {
            echo "<ul>";
            foreach($results as $result) {

                $name_german = $pdo->prepare("SELECT name FROM plants WHERE id = ".$result["id"]);
                $name_german->execute();
                $name_german = $name_german->fetch()[0];

                $name_latin = $pdo->prepare("SELECT name_latin FROM plants WHERE id = ".$result["id"]);
                $name_latin->execute();
                $name_latin = $name_latin->fetch()[0];

                $plant_img = $pdo->prepare("SELECT plant_img FROM plants WHERE id = ".$result["id"]);
                $plant_img->execute();
                $plant_img = $plant_img->fetch()[0];

                $short_description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At";

                echo "<li><div class=\"entry\">
    <img alt=\"Foto von $name_german\" src=\"$plant_img\" class=\"plant_img\"/>
    <span class=\"name_german\">$name_german</span>
    <br>
    <span class=\"name_latin\">$name_latin</span>
    <p class=\"short_description\">$short_description</p>
</div>";
            }
            echo "</ul>";
        } else {
            echo "<h2>No results for your query</h2>";
        }
    ?>
</div>
</body>
</html>