<div id="viewapplications">
    <h1>Applications</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><input id="checkAll" type="checkbox" name="row1" onchange="selectAll(this)"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Location</th>
                <th scope="col">Discipline</th>
                <th scope="col">Socials</th>
                <th scope="col">Submission Date</th>
                <th scope="col">Is User?</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($applications)){ $i=0; foreach ($applications as $application){?>
            <tr>
                <th scope="row"><input id="<?php echo $application->getApplicationId()?>"  class="aa-checkbox" type="checkbox" name="row<?php echo $i?>"></th>
                <td><?php echo $application->getName()?></td>
                <td><?php echo $application->getEmail()?></td>
                <td><?php echo $application->getLocation()?></td>
                <td><?php echo $application->getDiscipline()?></td>
                <td><?php echo $application->getSocialMedia()?></td>
                <td><?php echo $application->getSubmissionDate()->format('d/m/Y')?></td>
                <td><?php echo ($application->getIsUser()) ? 'Yes' : 'No'?></td>
            </tr>
            <?php $i++;}} ?>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedCheckAction('deleteapplication','viewapplications', false, 'delete')">Delete</button>
        <button class="btn btn-primary" type="button" onclick="selectedCheckOpenWindow('manageapplication')">Edit</button>
        <button type="button" onclick="selectedCheckOpenWindow('displayNewUserArtistForm')" class="btn btn-info">Create User</button>
        <button type="button" class="btn btn-success" onclick="selectedCheckAction('downloadArtistApplications', 'viewApplications', true)">Download Applications</button>
    </div>
</div>