<div id="view-events">
    <h1>Events</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">date</th>
                <th scope="col">location</th>
                <th scope="col">type</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($events)){ foreach ($events as $event){?>
            <tr>
                <th scope="row"><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $event->getEventId()?>"></th>
                <td><?php echo $event->getName()?></td>
                <td><?php echo $event->getDateTimeString()?></td>
                <td><?php echo $event->getLocation()->getName()?></td>
                <td><?php echo $event->getEventType()->getTypeName()?></td>
            </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioBtnAction('deleteevent', 'viewevents')">Delete</button>
        <button class="btn btn-primary" type="button" onclick="selectedRadioBtnOpenWindow('manageevent')">Edit</button>
        <button class="btn btn-success" onclick="openWindow('manageevent')" type="button">Create Event</button>

    </div>
</div>