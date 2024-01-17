<div id="newuserartist">
    <?php if(isset($application)){?>
    <h1>Create New Artist/Collaborator</h1>
    <form class="container row" enctype="multipart/form-data">
        <div class="col-md-4">
            <strong>Artist Picture</strong>
            <div id="img-container" class="d-flex flex-column align-items-center">
                <img id="imgthumbnail" src="/media/placeholders/user-picture-placeholder.png">
                <div class="input-group mt-3">
                    <input type="file" class="form-control" name="picture" id="upload-artist-picture" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onclick="previewImage(this, 'imgthumbnail')">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label"><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $application->getEmail()?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword" class="form-label"><strong>Password</strong></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="password">
                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordbtn" onclick="togglePassword()">Show</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="inputpronouns" class="form-label"><strong>pronouns</strong></label>
                    <input type="text" name="pronouns" class="form-control" id="inputpronouns" value="<?php echo $application->getPronouns()?>">
                </div>
                <div class="col-md-4">
                    <label for="inputfirstname" class="form-label"><strong>first name</strong></label>
                    <input type="text" name="firstname" class="form-control" id="inputfirstname" value="<?php echo $application->getFirstName()?>">
                </div>
                <div class="col-md-4">
                    <label for="inputlastname" class="form-label"><strong>last name</strong></label>
                    <input type="text" name="lastname" class="form-control" id="inputlastname" value="<?php echo $application->getLastName()?>">
                </div>
                <div class="col-md-5">
                    <label for="inputstagename" class="form-label"><strong>stage name</strong></label>
                    <input type="text" class="form-control" name="stagename" id="inputstagename" value="<?php echo $application->getStagename()?>">
                </div>
                <div class="col-md-6">
                    <label for="inputType" class="form-label"><strong>User type</strong></label>
                    <select id="inputType" name="usertype" class="form-select">
                        <option selected>Choose...</option>
                            <option value="3">Artist</option>
                            <option value="4">Collaborator</option>

                    </select>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="inputDiscipline" class="form-label"><strong>discipline</strong></label>
                            <select id="inputDiscipline" class="form-select" name="discipline">
                                <?php foreach ($disciplines as $discipline){ ?>
                                    <option value="<?php echo $discipline->getDisciplineId();?>"><?php echo $discipline->getName();?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputlocation" class="form-label"><strong>location</strong></label>
                            <input type="text" class="form-control" name="location" id="inputlocation" value="<?php echo $application->getLocation()?>">
                        </div>
                        <div class="col-md-11">
                            <label for="inputdescription" class="form-label"><strong>artist description</strong></label>
                            <textarea rows="4" class="form-control" name="description" id="inputdescription"><?php echo $application->getMessage()?></textarea>
                        </div>
                        <div class="col-md-11">
                            <label for="inputsocials" class="form-label"><strong>social media link</strong></label>
                            <input type="text" class="form-control" name="socialslink" id="inputsocials" value="<?php echo $application->getSocialMedia()?>">
                        </div>
            </div></div>
    </form>
    <div class="col-12">
        <button type="button" class="btn btn-success" onclick="createUserFromApplication()">Create</button>
    </div>
    <?php } ?>
</div>