<div id="manageevent">
    <h1>Create Event</h1>
    <form enctype="multipart/form-data">
    <div class="container row">
        <div class="col-md-4">
            <strong>Poster Picture</strong>
            <div id="img-container" class="d-flex flex-column align-items-center">
                <img id="imgthumbnail" src="<?php echo isset($selectedEvent) ? $selectedEvent->getPosterSrc() : '/media/placeholders/user-picture-placeholder.png' ?>">
                <div class="input-group mt-3">
                    <input type="file" class="form-control" id="upload-event-picture" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onclick="previewImage(this, 'imgthumbnail')">
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control" id="inputName" value="<?php echo isset($selectedEvent)? $selectedEvent->getName() : ''?>">
                </div>
                <div class="col-md-4">
                    <label for="inputType" class="form-label"><strong>Event type</strong></label>
                    <select id="inputType" class="form-select">
                        <option selected value="<?php echo isset($selectedEvent)? $selectedEvent->getEventType()->getTypeId() : ''?>"><?php echo isset($selectedEvent)? $selectedEvent->getEventType()->getTypeName() : 'Choose...'?></option>
                        <?php if(isset($eventTypes)){ foreach ($eventTypes as $type){?>
                        <option value="<?php echo $type->getTypeId()?>"><?php echo $type->getTypeName()?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputDatetime" class="form-label"><strong>Date/Time</strong></label>
                    <input type="datetime-local" class="form-control" id="inputDatetime" name="datetime" value="<?php echo isset($selectedEvent)? $selectedEvent->getDateTime()->format('Y-m-d\TH:i') : ''?>">
                </div>
                <div class="col-md-4">
                    <label for="inputLocation" class="form-label"><strong>Location</strong></label>
                    <select id="inputLocation" class="form-select">
                        <option selected value="<?php echo isset($selectedEvent)? $selectedEvent->getLocation()->getLocationId() : ''?>"><?php echo isset($selectedEvent)? $selectedEvent->getLocation()->getName() : 'Choose...'?></option>
                        <?php if(isset($eventLocations)){ foreach ($eventLocations as $location){?>
                            <option value="<?php echo $location->getLocationId()?>"><?php echo $location->getName()?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputDescription" class="form-label"><strong>Description</strong></label>
                    <textarea rows="4" class="form-control" id="inputDescription"><?php echo isset($selectedEvent)? $selectedEvent->getDescription() : ''?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputBtnTxt" class="form-label"><strong>Button text</strong></label>
                    <input type="text" class="form-control" id="inputBtnTxt" value="<?php echo isset($selectedEvent)? $selectedEvent->getTicketBtnText() : ''?>">
                </div>
                <div class="col-md-6">
                    <label for="inputBtnLink" class="form-label"><strong>Button link</strong></label>
                    <input type="text" class="form-control" id="inputBtnLink" value="<?php echo isset($selectedEvent)? $selectedEvent->getTicketUrl() : ''?>">
                </div>
            </div></div></div>
    </form>
    <div class="col-12">
        <button type="button" class="btn btn-success" onclick="storeEvent(<?php echo (!isset($selectedEvent))? 0 : $selectedEvent->getEventId();?>)">Save</button>
    </div>
</div>

