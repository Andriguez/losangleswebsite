<html>
<head>
    <title>manage homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">

    <h1>Images</h1>
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
               <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
            <div class="col">
                <button><img src="/media/artist1.png"></button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<style>
    #main-page{
        align-content: center;
        .container{
        width: 500px;
        height: 400px;
        overflow-y: scroll;

            img{
                width: 130px;
                height: 130px;
            }
            img:hover{
                filter: blur(3px);
            }

    }
    }

</style>
