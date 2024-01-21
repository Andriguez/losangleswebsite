
<div id="allposts">
<?php if(isset($posts)){foreach ($posts as $post){?>
    <div class="row">
        <div class="col">
            <div id="<?php echo $post->getId()?>" class="post-container">
                <div class="<?php echo ($post->getUser()->getUserType()->getUserTypeId() === 2) ? 'admin-post-card' : 'post-card'?> shadow-sm">
                    <div class="card-body">
                        <div class="profile-picture">
                            <img class="picture" src="<?php echo $post->getUser()->getPictureSrc() ?>" role="img" width="90px" height="90px">
                            <!--<img class="frame" src="/media/picture-frame.svg" role="img" width="90px"> -->
                        </div>
                        <h5 class="poster-name"><?php echo $post->getUser()->getFullName()?><?php echo ($post->getUser()->getUserType()->getUserTypeId() === 2) ? '⭐' : ''?></h5>
                        <h5 class="post-title"><?php echo $post->getPostTitle()?></h5>
                        <p class="post-content mx-3"><?php echo $post->getTextContent()?></p>
                        <div class="post-footer">
                            <a class="card-link" onclick="displayComments('<?php echo $post->getTopic()->getTopicName()?>', <?php echo (int)$post->getId()?>)"><?php echo $post->getCommentAmount();?> comments</a>
                            <p>‣</p>
                            <label>posted on<cite title="time stamp"><?php echo ' '.$post->getPostedAt()->format('D d/m/y').' at '.$post->getPostedAt()->format('H:i')?></cite></label>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <div class="embed-submit-field">
                        <input id="<?php echo $post->getId()?>" type="text" placeholder="Say something..."/>
                        <button type="button" onclick="storeComment(<?php echo $post->getId()?>, '<?php echo $post->getTopic()->getTopicName()?>', <?php echo $post->getId()?>)"> comment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }}?>
</div>
<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a onclick="loadPosts('<?php echo $this->selectedTopic->getTopicName()?>',<?php echo $i?>)" class="page-link<?php echo ($i === $this->currentPage)? ' current-page': ''?> "><?php echo $i; ?></a>
    <?php endfor; ?>
</div>


