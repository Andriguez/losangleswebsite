<html>
<head>
    <title>login</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="form-container">
    <form>
        <h3 class="mb-4">Join us!</h3>
        <div class="form-floating">
            <input type="text" id="floatingInput" placeholder="name">
            <input type="text" id="floatingInput" placeholder="stage name">
        </div>

        <div class="form-floating">
            <input type="text" id="pronouns" placeholder="pro/nouns">
            <input type="text" id="gender" placeholder="gender">
        </div>
        <div class="form-floating">
            <input type="text" id="location" placeholder="location">
            <input type="text" id="discipline" placeholder="discipline">
        </div>
        <div class="form-floating">
            <input type="email" id="floatingInput" placeholder="e-mail">
            <input type="text" id="socials" placeholder="socials">
        </div>
        <div class="form-floating">
            <textarea id="message" placeholder="100 words about you" rows="8"></textarea>
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
        font-family: angles;
        font-size: 10px;
    }
    input, textarea{
        border-radius: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: black solid 4px;
        margin: 5px;
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
</style>