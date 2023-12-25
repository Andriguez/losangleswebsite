<html>
<head>
    <title>manage homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="main-page">
    <div class="container row">
        <div class="col-md-4">
    <div id="img-container" class="d-flex flex-column align-items-center">
        <img src="/media/artist1.png">
        <div class="input-group mt-3">
            <input type="file" class="form-control" id="upload-primary-navbar-logo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
    </div>

    </div>
        <div class="col-md-8">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="password">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">Show</button>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputpronouns" class="form-label">pronouns</label>
            <input type="text" class="form-control" id="inputpronouns">
        </div>
        <div class="col-md-4">
            <label for="inputfirstname" class="form-label">first name</label>
            <input type="text" class="form-control" id="inputfirstname">
        </div>
        <div class="col-md-4">
            <label for="inputlastname" class="form-label">last name</label>
            <input type="text" class="form-control" id="inputlastname">
        </div>

        <div class="col-md-6">
            <label for="inputType" class="form-label">User type</label>
            <select id="inputType" class="form-select">
                <option selected>Choose...</option>
                <option>Admin</option>
                <option>Artist</option>
                <option>Collaborator</option>
            </select>
        </div>
        <div class="col-12">
            <!--<button type="submit" class="btn btn-primary">Send password email</button>-->
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form></div>


    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('inputPassword');
        const button = document.getElementById('togglePassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            button.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            button.textContent = 'Show';
        }
    });
</script>
</body>
</html>
<style>
    #main-page{
    display: flex;
    width: 962px;
    height: 540px;

    .container{
    margin: 50px 20px 20px 20px;

       form{
           width: 500px;
       }
    }}
</style>

