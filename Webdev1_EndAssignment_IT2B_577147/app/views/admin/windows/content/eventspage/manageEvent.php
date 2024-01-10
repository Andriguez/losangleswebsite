<div id="manageevent">
    <h1>Create Event</h1>
    <div class="container row">
        <div class="col-md-4">
            <strong>Poster Picture</strong>
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
                    <label for="inputName" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-4">
                    <label for="inputType" class="form-label"><strong>Event type</strong></label>
                    <select id="inputType" class="form-select">
                        <option selected>Choose...</option>
                        <option>Admin</option>
                        <option>Artist</option>
                        <option>Collaborator</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="datetime" class="form-label"><strong>Date/Time</strong></label>
                    <input type="datetime-local" class="form-control" id="datetime" name="datetime">
                </div>
                <div class="col-md-4">
                    <label for="inputType" class="form-label"><strong>Location</strong></label>
                    <select id="inputType" class="form-select">
                        <option selected>Choose...</option>
                        <option>Admin</option>
                        <option>Artist</option>
                        <option>Collaborator</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputlastname" class="form-label"><strong>Description</strong></label>
                    <textarea rows="4" class="form-control" id="inputlastname"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><strong>Button text</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><strong>Button link</strong></label>
                    <input type="text" class="form-control" id="inputName">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

            </form></div>
    </div>
</div>

