<html>
<head>
    <title>Join us!</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="form-container">
    <form method="post" action="/register/submitregistration">
        <?php if(isset($_SESSION['registerMessage'])){?>
            <div id="output-message-container">
                <span><?php echo $_SESSION['registerMessage']?></span>
            </div>
            <?php unset($_SESSION['registerMessage']); } else {?>
        <span class="title mb-4">Join us!</span>
        <?php }?>
        <div class="form-floating">
            <input type="text" name="inputName" id="floatingNameInput" placeholder="name">
            <input type="text"  name="inputStageName" id="floatingInput" placeholder="stage name">
        </div>

        <div class="form-floating">
            <input type="text" name="inputPronouns" id="pronouns" placeholder="pro/nouns">
            <input type="text" name="inputGender" id="gender" placeholder="gender">
        </div>
        <div class="form-floating">
            <input type="text" name="inputLocation" id="location" placeholder="location (city, country)">
            <input type="text" name="inputDiscipline" id="discipline" placeholder="discipline">
        </div>
        <div class="form-floating">
            <input type="email" name="inputEmail" id="floatingEmailInput" placeholder="e-mail">
            <input type="text" name="inputSocials" id="socials" placeholder="socials">
        </div>
        <div class="form-floating">
            <textarea name="inputMessage" id="message" placeholder="100 words about you" rows="4"></textarea>
        </div>
        <div class="btn-group">
            <button type="submit">send</button>
        </div>
    </form>
</div>
</body>
</html>
<style>
    body{
        overflow: hidden;
    }
    .form-container{
        margin: 2rem;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 600px;
        font-size: 18px;

        .title{
            font-family: angles;
            text-transform: uppercase;
            font-size: 18px;
        }
    }
    input, textarea{
        border-radius: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: black solid 4px;
        margin: 4px 6px 6px 6px;
        font-family: "Agency FB";
    }
    input:focus, textarea:focus{
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
        font-size: 12px;
        text-transform: uppercase;
        font-family: angles;
    }
    textarea{
        width: 300px;
        resize: none;
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
    #pronouns{
        max-width: 110px;
    }
    #gender{
        max-width: 110px;
    }

    #output-message-container{
        font-weight: bold;
        color: black;
        font-family: "Agency FB";
        font-size: 20px;
        margin: auto;
        width: 300px;
    }
</style>