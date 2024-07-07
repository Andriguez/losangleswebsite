<html>
<head>
    <title>login</title>
    <link rel="icon" href="/media/logos/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/login/login.css">
</head>
<body>
<div class="form-container">
<form method="post" action="/login/access">
    <div class="form-floating">
        <input required type="email" name="email" id="floatingInput" placeholder="e-mail">
    </div>
    <div class="form-floating">
        <input name="password" type="password" id="floatingPassword" placeholder="password">
    </div>
    <div class="btn-group">
    <button type="submit">log in</button>
    <!--<button>forgot password?</button>-->
    </div>
</form>
</div>
<?php if(isset($_SESSION['loginError'])){?>
    <div id="error-message-container">
        <span><?php echo $_SESSION['loginError']?></span>
    </div>
    <?php unset($_SESSION['loginError']); }  ?>
</body>
</html>