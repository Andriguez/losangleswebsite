<div id="viewPosts">
    <h1>Posts</h1>
    <select id="selectTopic" class="form-select" onchange="displaySelectIdAction(this, 'viewPosts')">
        <option selected value="<?php echo isset($selectedTopic) ? $selectedTopic->getTopicId() : ''?>"><?php echo isset($selectedTopic) ? $selectedTopic->getTopicName() : 'Choose..'?></option>
        <?php foreach ($topics as $topic){ ?>
            <option value="<?php echo $topic->getTopicId();?>"><?php echo $topic->getTopicName();?></option>
        <?php }?>
    </select>

    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($posts))foreach ($posts as $post){?>
                <tr>
                    <td><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $post->getId();?>"></td>
                    <th scope="row"><?php echo $post->getUser()->getFullName(); ?></th>
                    <td><?php echo $post->getPostTitle(); ?></td>
                    <td><?php echo $post->getPostedAt()->format('d/m/Y H:i'); ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioBtnAction('deletePost', '<?php echo 'viewPosts/'.$selectedTopic->getTopicId()?>')">Delete</button>
        <button class="btn btn-primary" type="button" onclick="openPostInNewTab('<?php echo $selectedTopic->getTopicName() ?>')">View Post</button>
    </div>
</div>
