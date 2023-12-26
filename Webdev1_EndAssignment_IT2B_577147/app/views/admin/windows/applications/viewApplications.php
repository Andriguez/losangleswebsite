<html>
<head>
    <title>manage applications</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">
    <h1>Applications</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Location</th>
                <th scope="col">Discipline</th>
                <th scope="col">Socials</th>
                <th scope="col">Submission Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><input type="checkbox" name="row1"></th>
                <td>Andy Rodriguez</td>
                <td>andhriguez@outlook.com</td>
                <td>Amsterdam, NL</td>
                <td>It girl</td>
                <td>@brhiguez</td>
                <td>26/12/2023</td>
            </tr>
            <tr>
                <th scope="row"><input type="checkbox" name="row1"></th>
                <td>Andy</td>
                <td>andhriguez@outlook.com</td>
                <td>Amsterdam, NL</td>
                <td>It girl</td>
                <td>@brhiguez</td>
                <td>26/12/2023</td>
            </tr>
            <tr>
                <th scope="row"><input type="checkbox" name="row1"></th>
                <td>Andy</td>
                <td>andhriguez@outlook.com</td>
                <td>Amsterdam, NL</td>
                <td>It girl</td>
                <td>@brhiguez</td>
                <td>26/12/2023</td>
            </tr>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button type="button" class="btn btn-info">Create User</button>
        <button type="button" class="btn btn-success">Download Applications</button>
    </div>
</div>
</body>
</html>
<style>
    #main-page{
        width: 962px;
        height: 540px;
        padding: 20px;

    #selectType{
        width: 150px;
        margin: 10px;
    }

    #table-container {
        max-height: 300px !important;
        overflow-y: auto;
    }

    #button-container{
        float: right;
        margin: 10px;

    button{

    }
    }

    }
</style>

