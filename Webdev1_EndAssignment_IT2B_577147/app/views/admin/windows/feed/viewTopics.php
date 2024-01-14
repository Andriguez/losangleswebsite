<div id="main-page">
    <h1>Feed Topics</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            <tr><?php if(isset($topics)){ foreach ($topics as $topic){?>
                <td><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $topic->getTopicId()?>"></td>
                <th scope="row"><?php echo $topic->getTopicName()?></th>
            </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioBtnAction('deleteFeedTopic', 'viewtopics')">Delete</button>
        <button class="btn btn-success" onclick="openWindow('manageTopic')" type="button">Create New</button>
    </div>
</div>