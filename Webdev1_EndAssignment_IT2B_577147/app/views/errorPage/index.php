<html>
<head>
    <title>Error</title>
    <link rel="icon" href="/media/logos/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/connect/connect.css">
</head>
<body>
<div class="main">
    <h1 id="error-code">ERROR <?php echo $this->code ?? '' ?></h1>
    <h3 class="error-message">Seems like something went wrong <?php echo isset($this->message) ? ':' : ''?> </h3>
    <h3 class="error-message"><?php echo $this->message ?? '' ?></h3>
    <br>
    <h5 class="error-message">Make sure the url is correct and reload the page</h5>
    <br>
    <p class="error-message" style="font-size: 20px">Or go back to the <a href="/" style="font-size: 20px">main page</a></p>
    <br>
    <img src="/media/logos/losangles-text.png" alt="logo" style="width: 90px; height: 45px">
</div>


</body>

<style>
    body{
        text-align: center;
    }

    .main{
        padding: 50px;
        margin: 20px;
    }

    #error-code{
        color: black;
        font-family: angles;
    }

    .error-message{
        font-family: "Agency FB";
    }

    a{
        color: black;
        font-weight: bolder;
    }
</style>