<div id="manage-home-logo">
    <h1>Homepage Picture</h1>

    <div id="img-container" class="d-flex flex-column align-items-center">
        <div id="picture-container">
            <img id="imgthumbnail" src="<?php echo $pictureSrc ?? ''?>" alt="picture" width="100%" height="100%">
        </div>
    </div>
    <div class="input-group mt-3">
            <input type="file" class="form-control" name="picture" id="upload-homepage-picture" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onclick="previewImage(this, 'imgthumbnail')">
        </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-success" onclick="updateHomepagePicture()">Save</button>
    </div>
