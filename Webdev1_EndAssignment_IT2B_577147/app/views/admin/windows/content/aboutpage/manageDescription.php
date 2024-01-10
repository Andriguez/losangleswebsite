
<div id="managedescription">
    <h1>About</h1>

    <div class="container justify-content-center">
            <form class="row">
                <div class="col-md-4">
                    <label for="inputtitle" class="form-label"><strong>title</strong></label>
                    <input type="text" name="title-text" class="form-control mb-2" id="inputtitle" value="<?php echo (isset($aboutContent)) ? $aboutContent['title-text']->getText() : ''?>">
                </div>
                <div class="col-md-8">
                    <label for="inputtitlelink" class="form-label"><strong>title link</strong></label>
                    <input type="text" name="title-link" class="form-control mb-2" id="inputtitlelink" value="<?php echo (isset($aboutContent)) ? $aboutContent['title-link']->getText() : ''?>">
                </div>
                <div class="col-md-12">
                    <label for="inputdescription" class="form-label"><strong>description</strong></label>
                    <textarea rows="4" class="form-control mb-2" name="about-description" id="inputdescription"><?php echo (isset($aboutContent)) ? $aboutContent['about-description']->getText() : ''?></textarea>
                </div>
                <div class="col-md-4">
                    <label for="inputfooter" class="form-label"><strong>footer</strong></label>
                    <input type="text" name="footer-text" class="form-control" id="inputfooter" value="<?php echo (isset($aboutContent)) ? $aboutContent['footer-text']->getText() : ''?>">
                </div>
                <div class="col-md-8">
                    <label for="inputfooterlink" class="form-label"><strong>footer link</strong></label>
                    <input type="text" class="form-control" name="footer-link" id="inputfooterlink" placeholder="contact email perhaps"  value="<?php echo (isset($aboutContent)) ? $aboutContent['footer-link']->getText() : ''?>">
                </div>
            </form>
        <div class="col-12">
            <button type="button" class="btn btn-success" onclick="storeAboutDetails()">Save</button>
        </div>
    </div>
</div>