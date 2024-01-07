<div id="manage-artist-details">
    <h1>Artists</h1>
    <div id="select-artist-container">
    <label for="inputType" class="form-label"><strong>Select Artist</strong></label>
    <select id="inputType" class="form-select" onchange="displaySelectedUserDetails(this, 'manageArtistDetails')">
        <option selected><?php echo isset($selectedArtist)? $selectedArtist->getFirstName():'Choose...'?></option>
        <?php foreach ($artists as $artist){ ?>
            <option value="<?php echo $artist->getUserId();?>"><?php echo $artist->getFirstName();?></option>
        <?php }?>
    </select>
    </div>
    <form method="POST" action="/admin/storeartistdetails/<?php echo (isset($selectedArtist))? $selectedArtist->getUserId() : '';?>" enctype="multipart/form-data">
    <div class="container row">
        <div class="col-md-4">
            <strong>Artist Picture</strong>
            <div id="img-container" class="d-flex flex-column align-items-center">
                <img id="imgthumbnail" src="<?php echo (!isset($artistContent))? '/media/placeholders/user-picture-placeholder.png' : $artistContent->getPictureSrc()?>">
                <div class="input-group mt-3">
                    <input type="file" class="form-control" name="picture" id="upload-primary-navbar-logo" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onclick="previewImage(this, 'imgthumbnail')">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row g-3">
                <div id="nameCol" class="col-md-6">
                    <span id="selectedAdminName"><?php echo(isset($selectedArtist))? $selectedArtist->getFullName() : '';?></span>
                </div>
                <div class="col-md-5">
                    <label for="inputstagename" class="form-label"><strong>stage name</strong></label>
                    <input type="text" class="form-control" name="stagename" id="inputstagename" value="<?php echo (isset($artistContent))? $artistContent->getStagename():''?>">
                </div>
                <div class="col-md-5">
                    <label for="inputType" class="form-label"><strong>discipline</strong></label>
                    <select id="inputType" class="form-select" name="discipline">
                        <option selected value="<?php echo isset($artistContent)? $artistContent->getDiscipline()->getDisciplineId():'0'?>"><?php echo (isset($artistContent))? $artistContent->getDiscipline()->getName():'Choose...'?></option>
                        <?php foreach ($disciplines as $discipline){ ?>
                            <option value="<?php echo $discipline->getDisciplineId();?>"><?php echo $discipline->getName();?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputlocation" class="form-label"><strong>location</strong></label>
                    <input type="text" class="form-control" name="location" id="inputlocation" value="<?php echo (isset($artistContent))? $artistContent->getLocation():''?>">
                </div>
                <div class="col-md-8">
                    <label for="inputEmail" class="form-label"><strong>inquiry email</strong></label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo (isset($artistContent))? $artistContent->getEmail():''?>">
                </div>
                <div class="col-md-11">
                    <label for="inputdescription" class="form-label"><strong>artist description</strong></label>
                    <textarea rows="4" class="form-control" name="description" id="inputdescription"><?php echo (isset($artistContent))? $artistContent->getDescription():''?></textarea>
                </div>
                <div class="col-md-11">
                    <label for="inputsocials" class="form-label"><strong>social media link</strong></label>
                    <input type="text" class="form-control" name="socialslink" id="inputsocials" value="<?php echo (isset($artistContent))? $artistContent->getSocials():''?>">
                </div>
                <div class="col-md-11">
                    <label for="inputsoundcloud" class="form-label"><strong>soundcloud link</strong></label>
                    <input type="text" class="form-control" name="soundcloudlink" id="inputsoundcloud" value="<?php echo (isset($artistContent))? $artistContent->getSoundcloudUrl():''?>">
                </div>
                <div class="col-md-11">
                    <label for="inputlink" class="form-label"><strong>extra link</strong></label>
                    <input type="text" class="form-control" name="extralink" id="inputlink" value="<?php echo (isset($artistContent))? $artistContent->getExtraLink():''?>">
                </div>
                <div class="col-11">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div></div>
    </div>
    </form>
</div>

