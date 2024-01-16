<div id="viewapplications">
    <h1>Applications</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><input type="checkbox" name="row1"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Location</th>
                <th scope="col">Discipline</th>
                <th scope="col">Socials</th>
                <th scope="col">Submission Date</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($applications)){ $i=0; foreach ($applications as $application){?>
            <tr>
                <th scope="row"><input id="<?php echo $application->getApplicationId()?>" type="checkbox" name="row1"></th>
                <td><?php echo $application->getName()?></td>
                <td><?php echo $application->getEmail()?></td>
                <td><?php echo $application->getLocation()?></td>
                <td><?php echo $application->getDiscipline()?></td>
                <td><?php echo $application->getSocialMedia()?></td>
                <td><?php echo $application->getSubmissionDate()->format('d/m/Y')?></td>
            </tr>
            <?php $i++;}} ?>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button type="button" onclick="openWindow('manageapplication')" class="btn btn-info">Create User</button>
        <button type="button" class="btn btn-success">Download Applications</button>
    </div>
</div>