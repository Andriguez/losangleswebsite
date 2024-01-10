<div id="view-locations">
    <h1>Locations</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">city</th>
                <th scope="col">country</th>
                <th scope="col">Map link</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($eventLocations)){ foreach($eventLocations as $location){?>
            <tr>
                <td><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $location->getLocationId()?>"></td>
                <th scope="row"><?php echo $location->getName()?></th>
                <td><?php echo $location->getCity()?></td>
                <td><?php echo $location->getCountry()?></td>
                <td><a href="<?php echo $location->getMap()?>">link</a></td>
            </tr>
    <?php } }?>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioAction('deletelocation', true)">Delete</button>
        <button class="btn btn-primary" type="button" onclick="selectedRadioAction('managelocation', false)">Edit</button>
        <button class="btn btn-success" onclick="openWindow('/admin/managelocation')" type="button">Create Location</button>
    </div>
</div>
