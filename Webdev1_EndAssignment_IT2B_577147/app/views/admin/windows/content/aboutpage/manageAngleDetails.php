
<div id="manageadmindetails">
    <h1>Angles</h1>
    <div id="select-artist-container">
        <label for="inputType" class="form-label"><strong>Select Angle</strong></label>
        <select id="inputType" class="form-select">
            <option selected>Choose...</option>
            <option>Admin</option>
            <option>Artist</option>
            <option>Collaborator</option>
        </select>
    </div>

    <div class="container row">
        <div class="col-md-4">
            <strong>Angle Picture</strong>
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
                    <label for="inputfirstname" class="form-label"><strong>name</strong></label>
                    <input type="text" class="form-control" id="inputfirstname">
                </div>
                <div class="col-md-6">
                    <label for="inputfirstname" class="form-label"><strong>name link</strong></label>
                    <input type="text" class="form-control" id="inputfirstname">
                </div>
                <div class="col-md-6">
                    <label for="inputpronouns" class="form-label"><strong>title(s)</strong></label>
                    <input type="text" class="form-control" id="inputpronouns">
                </div>
                <div class="col-md-12">
                    <label for="inputlastname" class="form-label"><strong>description</strong></label>
                    <textarea rows="4" class="form-control" id="inputlastname"></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form></div>


    </div>
</div>

