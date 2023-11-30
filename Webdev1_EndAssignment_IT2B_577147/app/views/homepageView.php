
<?php
require __DIR__ . '/../config/dbconfig.php';

try{
    $connection = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected succesfully";
} catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>
<!DOCTYPE html>
<head>
    <title>Los Angles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<h1>Los Angles Home</h1>
<h3><?php print_r($_GET)?></h3>
</body>
</html>