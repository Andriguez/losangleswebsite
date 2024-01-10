<div id="viewtypes">
    <h1>Event Types</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($eventTypes)){foreach ($eventTypes as $type){?>
            <tr>
                <td><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $type->getTypeId()?>"></td>
                <th scope="row"><?php echo $type->getTypeName()?></th>
            </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioAction('deleteeventtype', true)">Delete</button>
        <button class="btn btn-success" onclick="openWindow('admin/manageeventtype')" type="button">Create New Type</button>
    </div>
</div>