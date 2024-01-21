
<div id="manageadmindetails">
    <h1>Angles</h1>
    <div id="select-artist-container">
        <label for="inputAdmin" class="form-label"><strong>Select Angle</strong></label>
        <select id="inputAdmin" class="form-select" onchange="displaySelectIdAction(this, 'manageAdminDetails')">
            <option selected value="<?php echo isset($selectedAdmin)? $selectedAdmin->getUserId():''?>"><?php echo isset($selectedAdmin)? $selectedAdmin->getFirstName():'Choose...'?></option>
            <?php foreach ($users as $user){ ?>
                <option value="<?php echo $user->getUserId();?>"><?php echo $user->getFirstName();?></option>
            <?php }?>
        </select>
    </div>
    <?php if(isset($selectedAdmin)){ ?>
    <form enctype="multipart/form-data">
    <div class="container row">
        <div class="col-md-4">
            <strong>Angle Picture</strong>
            <div id="img-container" class="d-flex flex-column align-items-center">
                <img id="imgthumbnail" src="<?php echo (!isset($adminContent))? '/media/placeholders/user-picture-placeholder.png' : $selectedAdmin->getAdminContent()->getPictureSrc()?>">
            </div>
                <div class="input-group mt-3">
                    <input type="file" class="form-control" name="picture" id="admin-picture" aria-describedby="inputGroupFileAddon04" aria-label="Upload"  onclick="previewImage(this, 'imgthumbnail')">
                </div>
        </div>
        <div class="col-md-8">
            <div class="row g-3">
                <div id="nameCol"class="col-md-6">
                <span id="selectedAdminName"><?php echo(isset($selectedAdmin))? $selectedAdmin->getFullName() : '';?></span>
                </div>
                <div class="col-md-6">
                    <label for="inputlink" class="form-label"><strong>name link</strong></label>
                    <input type="text" class="form-control" name="link" id="inputlink" value="<?php echo(isset($adminContent))? $selectedAdmin->getAdminContent()->getNameLink() : ''?>">
                </div>
                <div class="col-md-6">
                    <label for="inputtitles" class="form-label"><strong>title(s)</strong></label>
                    <input type="text" class="form-control" name="titles" id="inputtitles" value="<?php echo(isset($adminContent))? $selectedAdmin->getAdminContent()->getTitles() : ''?>">
                </div>
                <div class="col-md-12">
                    <label for="inputdescription" class="form-label"><strong>description</strong></label>
                    <textarea rows="4" class="form-control" name="description" id="inputdescription"><?php echo(isset($adminContent))? $selectedAdmin->getAdminContent()->getDescription() : ''?></textarea>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="col-12">
        <button type="button" class="btn btn-success" onclick="storeAdminDetails()">Save</button>
    </div>
    <?php } ?>
</div>

