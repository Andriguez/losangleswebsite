<div id="manageuser">
    <h1><?php echo (!isset($user))? 'Create New User' : 'Edit User'?></h1>
    <div class="container row">
        <div class="col-md-4">
            <strong>Profile Picture</strong>
    <div id="img-container" class="d-flex flex-column align-items-center">
        <img src="<?php echo (!isset($user))? '/media/placeholders/user-picture-placeholder.png' : $user->getPictureSrc()?>" width="200px" height="200px">
        <div class="input-group mt-3">
        <input type="file" class="form-control" id="upload-primary-navbar-logo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
    </div>
    </div>
        <div class="col-md-8">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail" class="form-label"><strong>Email</strong></label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo (isset($user))? $user->getEmail() : ''?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label"><strong>Password</strong></label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="password" value="<?php echo (isset($user))? $user->getPassword() : ''?>">
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordbtn" onclick="togglePassword()">Show</button>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputpronouns" class="form-label"><strong>pronouns</strong></label>
            <input type="text" class="form-control" id="inputpronouns" value="<?php echo (isset($user))? $user->getPronouns() : ''?>">
        </div>
        <div class="col-md-4">
            <label for="inputfirstname" class="form-label"><strong>first name</strong></label>
            <input type="text" class="form-control" id="inputfirstname" value="<?php echo (isset($user))? $user->getFirstName() : ''?>">
        </div>
        <div class="col-md-4">
            <label for="inputlastname" class="form-label"><strong>last name</strong></label>
            <input type="text" class="form-control" id="inputlastname" value="<?php echo (isset($user))? $user->getLastName() : ''?>">
        </div>

        <div class="col-md-6">
            <label for="inputType" class="form-label"><strong>User type</strong></label>
            <select id="inputType" class="form-select">
                <option selected><?php echo (!isset($user))? 'Choose...' : $user->getUserType()->getUsertype()?></option>
                <option>Admin</option>
                <option>Artist</option>
                <option>Collaborator</option>
            </select>
        </div>
        <div class="col-12">
            <!--<button type="submit" class="btn btn-primary">Send password email</button>-->
            <button type="submit" class="btn btn-success"><?php echo (!isset($user))? 'Create' : 'Save'?></button>
        </div>
    </form></div>
    </div>
</div>


