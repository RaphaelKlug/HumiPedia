<?php
    if(isset($_GET['query'])) {
        $query = $_GET['query'];
        $pdo = new PDO("mysql:host=localhost;dbname=HumiPedia", 'read', '');

        $statement = $pdo->prepare("SELECT * FROM plants WHERE name LIKE :query");
        $statement->bindParam(':query', $query);

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
</div>
</body>
</html>