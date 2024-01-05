<div id="view-disciplines">
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
            <?php if (isset($disciplines)){foreach ($disciplines as $discipline){?>
            <tr>
                <td><input class="radioBtn" type="checkbox" name="row1" id="<?php echo $discipline->getDisciplineId();?>"></td>
                <th scope="row"><?php echo $discipline->getName()?></th>
            </tr>
            <?php }} ?>

            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioAction('deletediscipline', true)">Delete</button>
        <button class="btn btn-success" onclick="openWindow('admin/managediscipline')" type="button">Create new</button>

    </div>
</div>