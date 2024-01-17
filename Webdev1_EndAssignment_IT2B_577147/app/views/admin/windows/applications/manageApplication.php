<div id="manageapplication">
    <h1>Edit Application</h1>
    <div class="container">
        <?php if (isset($application)){?>
            <form class="row g-3">
                <div class="col-md-4">
                    <label for="inputName" class="form-label"><strong>applicant name</strong></label>
                    <input type="text" class="form-control" id="inputName" value="<?php echo $application->getName()?>">
                </div>
                <div class="col-md-4">
                    <label for="inputStageName" class="form-label"><strong>applicant stage name</strong></label>
                    <input type="text" class="form-control" id="inputStageName" value="<?php echo $application->getStageName()?>">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label"><strong>applicant Email</strong></label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $application->getEmail()?>">
                </div>
                <div class="col-md-4">
                    <label for="inputLocation" class="form-label"><strong>applicant location</strong></label>
                    <input type="text" class="form-control" id="inputLocation" placeholder="city, country" value="<?php echo $application->getLocation()?>">
                </div>
                <div class="col-md-3">
                    <label for="inputpronouns" class="form-label"><strong>applicant pronouns</strong></label>
                    <input type="text" class="form-control" id="inputpronouns" value="<?php echo $application->getPronouns()?>">
                </div>
                <div class="col-md-3">
                    <label for="inputGender" class="form-label"><strong>applicant gender</strong></label>
                    <input type="text" class="form-control" id="inputGender" value="<?php echo $application->getGender()?>">
                </div>
                <div class="col-md-4">
                    <label for="inputDiscipline" class="form-label"><strong>discipline</strong></label>
                    <input type="text" class="form-control" id="inputDiscipline" value="<?php echo $application->getDiscipline()?>">
                </div>

                <div class="col-md-12">
                    <label for="inputMessage" class="form-label"><strong>applicant Message</strong></label>
                    <textarea rows="4" class="form-control" id="inputMessage"><?php echo $application->getMessage()?></textarea>
                    <label>message can only be a maximum of 100words</label>
                </div>
                <div class="col-md-8">
                    <label for="inputSocials" class="form-label"><strong>applicant social media</strong></label>
                    <input type="text" class="form-control" id="inputSocials" value="<?php echo $application->getSocialMedia()?>">
                </div>
                <div class="col-md-4">
                    <label for="datetime" class="form-label"><strong>submission date</strong></label>
                    <input class="form-control" type="text" value="<?php echo $application->getSubmissionDate()->format('d/m/Y')?>" readonly>
                </div>
            </form>
        <div class="col-12">
            <button type="button" onclick="storeApplication()" class="btn btn-success">Save</button>
        </div>
        <?php } ?>
    </div>
</div>

