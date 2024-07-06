<html>
<head>
    <title>Error</title>
    <!--<link rel="icon" href="/media/onlytb.png" type="image/png">-->
    <link rel="stylesheet" type="text/css" href="/style/connect/connect.css">
</head>
<body>
<h1>Oops! Something went wrong</h1>
<h3>Error code: <?php echo $this->code ?? '' ?></h3>
<h3>Error message: <?php echo $this->message ?? '' ?></h3>

</body>