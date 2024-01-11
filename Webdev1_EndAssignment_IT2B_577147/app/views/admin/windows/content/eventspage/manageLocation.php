<div id="manage-location">
    <h1><?php echo (isset($selectedLocation)) ? 'Edit Location' : 'Create Location'?></h1>
    <div class="container row">
        <div class="col-md-12">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control" id="inputName" value="<?php echo (isset($selectedLocation)) ? $selectedLocation->getName() : ''?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label"><strong>Address</strong></label>
                    <input type="text" name="address" class="form-control" id="inputAddress" value="<?php echo (isset($selectedLocation)) ? $selectedLocation->getAddress() : ''?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label"><strong>City</strong></label>
                    <input type="text" name="city" class="form-control" id="inputCity" value="<?php echo (isset($selectedLocation)) ? $selectedLocation->getCity() : ''?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCountry" class="form-label"><strong>Country</strong></label>
                    <input type="text" name="country" class="form-control" id="inputCountry" value="<?php echo (isset($selectedLocation)) ? $selectedLocation->getCountry() : ''?>">
                </div>
                <div class="col-md-12">
                    <label for="inputUrl" class="form-label"><strong>map's url</strong></label>
                    <input type="text" name="mapurl" class="form-control" id="inputUrl" value="<?php echo (isset($selectedLocation)) ? $selectedLocation->getMap() : ''?>">
                </div>
            </form>
            <div class="col-12">
                <button type="button" class="btn btn-success" onclick="storeEventLocation()">Save</button>
            </div>
        </div>
    </div>
</div>