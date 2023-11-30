<?php

use models\ContentType;
use Repositories\Repository;

try{
    require __DIR__ . '/../repositories/Repository.php';
    require __DIR__ . '/../models/ContentType.php';


    $repo = new Repository();

    $stmt = $repo->contentdb->prepare('SELECT * FROM content_type');
    $stmt->execute();
    $contents = new ArrayObject();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $content = new ContentType();
    $content->setTypeId($row['content_type_Id']);
    $content->setName($row['content_type_name']);

    $contents->append($content);
    }

} catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>
<html>
<head>
    <title>Los Angles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<h1>Los Angles Home</h1>
<?php foreach ($contents as $c){
 echo '<p>'.$c->getTypeId().'has name '.$c->getName().'</p>';
} ?>
</body>
</html>