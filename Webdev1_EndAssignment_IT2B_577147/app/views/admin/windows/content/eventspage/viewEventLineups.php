<div id="view-lineups">
    <h1>Event Lineups</h1>
    <div id="select-event-container">
        <label for="inputEvent" class="form-label"><strong>Select Event</strong></label>
        <select id="inputEvent" class="form-select" onchange="displaySelectIdAction(this, 'viewLineups')">
            <option selected value="<?php echo isset($selectedEvent)? $selectedEvent->getEventId():''?>"><?php echo isset($selectedEvent)? $selectedEvent->getName():'Choose...'?></option>
            <?php foreach ($events as $event){ ?>
                <option value="<?php echo $event->getEventId();?>"><?php echo $event->getName();?></option>
            <?php }?>
        </select>
    </div>
    <?php if (isset($selectedEvent)){?>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Lineup Category</th>
                <th scope="col">Artists</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($lineups)){ foreach ($lineups as $lineup){ ?>
                <tr>
                    <th><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $lineup->getLineupId() ?>"></th>
                    <td><?php echo $lineup->getEvent()->getName() ?></td>
                    <td><?php echo $lineup->getCategory() ?></td>
                    <?php $artists = $lineup->getArtists() ?>
                    <td><?php foreach ($artists as $index => $artist){ echo $artist.',';} ?></td>

                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioBtnAction('deleteLineup', 'viewlineups')">Delete</button>
        <button class="btn btn-primary" type="button" onclick="selectedRadioBtnOpenWindow('manageLineup')">Edit</button>
        <button class="btn btn-success" onclick="openWindow('manageLineup')" type="button">Create Lineup</button>
    </div>
    <?php } ?>
</div>