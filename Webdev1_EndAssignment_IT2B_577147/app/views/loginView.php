<html>
<head>
    <title>login</title>
</head>
<body>
<?php include_once __DIR__.'/navbar.php'?>
<div class="form-container">
<form method="post" action="/login/access">
    <div class="form-floating">
        <input required type="email" name="email" id="floatingInput" placeholder="e-mail">
    </div>
    <div class="form-floating">
        <input id="passwordfield" name="password" type="password" style="-webkit-text-security: disc;" id="floatingPassword" placeholder="password">
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
<style>
    body{
        overflow: hidden;
        position: relative;
    }
    .form-container{
        margin-top: 80px;
        padding: 0;
        height: 40vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    form{
        position: relative;
        max-width: 350px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: angles;
        font-size: 12px;
    }
    form #passwordfield{
    }
    input{
        border-radius: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: black solid 4px;
        margin: 10px;
    }
    input:focus{
        outline: none;
        border-bottom: silver;
        box-shadow: black;
    }
    button{
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 4px !important;
        background-color: white !important;
        color: black !important;
        font-weight: bold !important;
        margin: 2px;
        text-align: center;
        font-size: 13px !important;
    }
    button:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
        border-width: 2px !important;
        margin: 4px !important;
    }
    .btn-group{
        margin-top: 20px;
    }
    #error-message-container{
        color: red;
        font-family: "Agency FB";
        font-size: 16px;
        margin: auto;
        width: 300px;

    }
</style>