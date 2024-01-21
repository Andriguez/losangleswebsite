<div id="manageuser">
    <h1><?php echo (!isset($user))? 'Create New User' : 'Edit User'?></h1>
    <form class="container row" enctype="multipart/form-data">
        <div class="col-md-4">
            <strong>Profile Picture</strong>
    <div id="img-container" class="d-flex flex-column align-items-center">
        <img id="imgthumbnail" src="<?php echo (!isset($user))? '/media/placeholders/user-picture-placeholder.png' : $user->getPictureSrc()?>" width="200px" height="200px">
    </div>
            <div class="input-group mt-3">
        <input type="file" class="form-control" name="picture" id="user-profile-picture" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onclick="previewImage(this, 'imgthumbnail')">
        </div>
    </div>
        <div class="col-md-8">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail" class="form-label"><strong>Email</strong></label>
            <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo (isset($user))? $user->getEmail() : ''?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label"><strong>Password</strong></label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="password">
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordbtn" onclick="togglePassword()">Show</button>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputpronouns" class="form-label"><strong>pronouns</strong></label>
            <input type="text" name="pronouns" class="form-control" id="inputpronouns" value="<?php echo (isset($user))? $user->getPronouns() : ''?>">
        </div>
        <div class="col-md-4">
            <label for="inputfirstname" class="form-label"><strong>first name</strong></label>
            <input type="text" name="firstname" class="form-control" id="inputfirstname" value="<?php echo (isset($user))? $user->getFirstName() : ''?>">
        </div>
        <div class="col-md-4">
            <label for="inputlastname" class="form-label"><strong>last name</strong></label>
            <input type="text" name="lastname" class="form-control" id="inputlastname" value="<?php echo (isset($user))? $user->getLastName() : ''?>">
        </div>

        <div class="col-md-6">
            <label for="inputType" class="form-label"><strong>User type</strong></label>
            <select id="inputType" name="usertype" class="form-select">
                <option selected value="<?php echo (!isset($user))? '' : $user->getUserType()->getUsertypeId()?>"><?php echo (!isset($user))? 'Choose...' : $user->getUserType()->getUsertype()?></option>
                <?php foreach ($userTypes as $type){ ?>
                <option value="<?php echo $type->getUserTypeId();?>"><?php echo $type->getUserType();?></option>
                <?php }?>
            </select>
        </div>

    </div></div>
    </form>
    <div class="col-12">
        <!--<button type="submit" class="btn btn-primary">Send password email!</button>-->
        <button type="button" class="btn btn-success" onclick="storeUserInfo(<?php echo (!isset($user))? 0 : $user->getUserId();?>)"><?php echo (!isset($user))? 'Create' : 'Save'?></button>
    </div>
</div>