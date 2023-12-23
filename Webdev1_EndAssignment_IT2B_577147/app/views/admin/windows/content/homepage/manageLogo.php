<html>
<head>
    <title>manage homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">

    <div class="input-group">
        <input type="file" class="form-control" id="upload-primary-navbar-logo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-success" type="submit" id="upload-primary-navbar-logo">Upload</button>
    </div>
    <div id="picture-container">
        <img src="/media/trialpagelogo.png" alt="trial picture" width="100%" height="100%">
    </div>
    <div class="btn-group" role="group">
        <a type="button" class="btn btn-primary" href="/admin">go back</a>
        <button type="button" class="btn btn-success">save</button>
    </div>


</div>
</body>
</html>
<style>
    #main-page{
    align-content: center;
    #picture-container{
        border: 2px black solid;
        background-color: grey;
        padding: 5px;
        width: 300px;
        height: 300px;
        margin: auto;
    }
    .input-group{
        width: 400px;
        margin: 30px auto 30px auto;
    }
    .btn-group{
        margin: 20px;
        float: right;
    }

    #specifications-container{
        text-align: center;
    img{
        margin: auto;
        display: block;
    }
    }
    }
</style>
