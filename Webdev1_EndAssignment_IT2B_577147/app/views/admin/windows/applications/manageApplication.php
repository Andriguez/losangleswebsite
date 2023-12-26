<html>
<head>
    <title>manage applications</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">
    <h1>Edit Application</h1>
    <div class="container">
            <form class="row g-3">
                <div class="col-md-4">
                    <label for="inputName" class="form-label"><strong>name</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-4">
                    <label for="inputName" class="form-label"><strong>stage name</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="inputName">
                </div>
                <div class="col-md-4">
                    <label for="inputpronouns" class="form-label"><strong>location</strong></label>
                    <input type="text" class="form-control" id="inputpronouns" placeholder="city, CTRY">
                </div>
                <div class="col-md-3">
                    <label for="inputpronouns" class="form-label"><strong>pronouns</strong></label>
                    <input type="text" class="form-control" id="inputpronouns">
                </div>
                <div class="col-md-3">
                    <label for="inputpronouns" class="form-label"><strong>gender</strong></label>
                    <input type="text" class="form-control" id="inputpronouns">
                </div>
                <div class="col-md-4">
                    <label for="inputpronouns" class="form-label"><strong>discipline</strong></label>
                    <input type="text" class="form-control" id="inputpronouns">
                </div>

                <div class="col-md-12">
                    <label for="inputlastname" class="form-label"><strong>Message</strong></label>
                    <textarea rows="4" class="form-control" id="inputlastname"></textarea>
                </div>
                <div class="col-md-8">
                    <label for="inputName" class="form-label"><strong>social media</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-4">
                    <label for="datetime" class="form-label"><strong>submission date</strong></label>
                    <input class="form-control" type="text" value="26/12/2023" readonly>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
    </div>
</div>
</body>
</html>
<style>
    #main-page{
        width: 962px;
        height: 540px;
        padding: 20px;

    .container{
        margin: 50px 20px 20px 20px;

    form{
        width: 600px;

        button{
            margin: 10px;
            float: right;
        }
    }
    }}
</style>

