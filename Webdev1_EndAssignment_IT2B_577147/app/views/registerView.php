<html>
<head>
    <title>Join us!</title>
    <link rel="icon" href="/media/logos/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/register/register.css">
</head>
<body>
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