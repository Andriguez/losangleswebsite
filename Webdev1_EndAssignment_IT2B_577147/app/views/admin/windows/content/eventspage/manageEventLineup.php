<div id="manage-location">
    <h1><?php echo (isset($selectedLineup)) ? 'Edit Lineup' : 'Create Lineup'?></h1>
    <div class="container row">
        <div class="col-md-12">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEvent" class="form-label"><strong>Select Event</strong></label>
                    <select id="inputEvent" class="form-select">
                        <option selected value="<?php echo isset($selectedLineup)? $selectedLineup->getEvent()->getEventId() : ''?>"><?php echo isset($selectedLineup)? $selectedLineup->getEvent()->getName() : 'Choose...'?></option>
                        <?php if(isset($events)){ foreach ($events as $event){?>
                            <option value="<?php echo $event->getEventId()?>"><?php echo $event->getName()?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCategory" class="form-label"><strong>Category</strong></label>
                    <input type="text" name="address" class="form-control" id="inputCategory" value="<?php echo (isset($selectedLineup)) ? $selectedLineup->getCategory() : ''?>">
                </div>
                <div class="col-md-12">
                    <label for="inputArtist" class="form-label"><strong>Artists</strong></label>
                    <?php if(isset($selectedLineup)) { $artists = $selectedLineup->getArtists(); } ?>
                    <textarea rows="3" class="form-control" id="inputArtist"><?php if (isset($artists)) foreach ($artists as $index => $artist){ echo $artist.';';} else echo ''?></textarea>
                    <span>artists' names should be separated by a semicolon (;)</span>
                </div>
            </form>
            <div class="col-12">
                <button type="button" class="btn btn-success" onclick="storeEventLineUp()">Save</button>
            </div>
        </div>
    </div>
</div>