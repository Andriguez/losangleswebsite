<html>
<head>
    <title>manage events</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">
    <h1>Event Types</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Club Night</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Exhibition</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Livestream</th>
            </tr>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button class="btn btn-success" type="button">Create new</button>

    </div>
</div>
</body>
</html>
<style>
    #main-page{
        width: 962px;
        height: 540px;
        padding: 20px;

    #table-container {
        max-height: 300px !important;
        overflow-y: auto;
    }

    #button-container{
        float: right;
        margin: 10px;


    }

    }
</style>