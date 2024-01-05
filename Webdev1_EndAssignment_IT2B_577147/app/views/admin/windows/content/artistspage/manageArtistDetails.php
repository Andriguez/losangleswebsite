<div id="manage-artist-details">
    <h1>Artists</h1>
    <div id="select-artist-container">
    <label for="inputType" class="form-label"><strong>Select Artist</strong></label>
    <select id="inputType" class="form-select">
        <option selected>Choose...</option>
        <option>Admin</option>
        <option>Artist</option>
        <option>Collaborator</option>
    </select>
    </div>

    <div class="container row">
        <div class="col-md-4">
            <strong>Artist Picture</strong>
            <div id="img-container" class="d-flex flex-column align-items-center">
                <img src="/media/artist1.png">
                <div class="input-group mt-3">
                    <input type="file" class="form-control" id="upload-primary-navbar-logo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form class="row g-3">
                <div id="nameCol"class="col-md-6">
                    <span id="selectedAdminName"><?php echo(isset($artist))? $artist->getFullName() : '';?></span>
                </div>
                <div class="col-md-5">
                    <label for="inputfirstname" class="form-label"><strong>stage name</strong></label>
                    <input type="text" class="form-control" id="inputfirstname">
                </div>
                <div class="col-md-5">
                    <label for="inputType" class="form-label"><strong>discipline</strong></label>
                    <select id="inputType" class="form-select">
                        <option selected>Choose...</option>
                        <option>Admin</option>
                        <option>Artist</option>
                        <option>Collaborator</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputpronouns" class="form-label"><strong>location</strong></label>
                    <input type="text" class="form-control" id="inputpronouns">
                </div>
                <div class="col-md-8">
                    <label for="inputName" class="form-label"><strong>inquiry email</strong></label>
                    <input type="email" class="form-control" id="inputName">
                </div>
                <div class="col-md-11">
                    <label for="inputlastname" class="form-label"><strong>artist description</strong></label>
                    <textarea rows="4" class="form-control" id="inputlastname"></textarea>
                </div>
                <div class="col-md-11">
                    <label for="inputName" class="form-label"><strong>instagram link</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-11">
                    <label for="inputName" class="form-label"><strong>soundcloud link</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-11">
                    <label for="inputName" class="form-label"><strong>extra link</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-11">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form></div>


    </div>
</div>

