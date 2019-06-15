<?php
    if(isset($_GET['query'])) {
        $query = $_GET['query'];
        $pdo = new PDO("mysql:host=localhost;dbname=HumiPedia", 'read', '');
        $query = "%$query%";

        $statement = $pdo->prepare("SELECT id FROM plants WHERE name LIKE :query");
        $statement->bindParam(':query', $query);

        if ($statement->execute()) {
            $results = $statement->fetchAll();
            var_dump($results);
        } else {
            echo "Error at search.php:9";
        }

    } else {
        echo "<script>document.location='index.html';</script>";
        die();
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
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

                $name = $pdo->prepare("SELECT name FROM plant WHERE id == ".$result["id"]);
                $name->execute();
                $name = $name->fetchAll();
                $name_german = $name_latin = $name;
                $short_description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At";
                $plant_img = "https://thumbs-prod.si-cdn.com/EhgZKi9-p516XkxOdd2XD0JUMe8=/fit-in/1600x0/https://public-media.si-cdn.com/filer/cf/46/cf460bf8-3d66-4edc-b7a6-97195a15eb7a/lemonpot_edit.jpg";

                echo "<li><div class=\"entry\">
    <img alt=\"Foto von $name_german\" src=\"$plant_img\" class=\"plant_img\"/>
    <span class=\"name_german\">$name_german</span>
    <br>
    <span class=\"name_latin\">$name_latin</span>
    <p class=\"short_description\">$short_description</p>
</div>";
            }
            echo "</ul>";
        }
    ?>
</div>
</body>
</html>