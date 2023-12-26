<html>
<head>
    <title>manage artists</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">
    <h1>Collaborators</h1>
    <div id="select-artist-container">
        <label for="inputType" class="form-label"><strong>Select Collaborator</strong></label>
        <select id="inputType" class="form-select">
            <option selected>Choose...</option>
            <option>Admin</option>
            <option>Artist</option>
            <option>Collaborator</option>
        </select>
    </div>

    <div class="container row">
        <div class="col-md-8">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputfirstname" class="form-label"><strong>name</strong></label>
                    <input type="text" class="form-control" id="inputfirstname">
                </div>
                <div class="col-md-5">
                    <label for="inputfirstname" class="form-label"><strong>title</strong></label>
                    <input type="text" class="form-control" id="inputfirstname">
                </div>
                <div class="col-md-4">
                    <label for="inputpronouns" class="form-label"><strong>location</strong></label>
                    <input type="text" class="form-control" id="inputpronouns" placeholder="City, CTY">
                </div>
                <div class="col-md-7">
                    <label for="inputName" class="form-label"><strong>social media link</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-11">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form></div>


    </div>
</div>
</body>
</html>
<style>
    #main-page{
        width: 962px;
        height: 540px;
        padding: 10px;

    #select-artist-container{
        width: 200px;
        margin: 20px;
    }
    .container{
        margin: 50px 20px 20px 20px;

    form{
        width: 500px;
    button{
        float: right;
    }
    }
    }}
</style>

