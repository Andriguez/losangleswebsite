<div class="post-text-popup" id="post-text">
    <form method="post" action="/feed/<?php echo $this->selectedTopic->getTopicName();?>/post">
        <select id="topicSelect" class="form-select" name="post-topic">
            <option selected value="<?php echo $this->selectedTopic->getTopicId();?>"><?php echo $this->selectedTopic->getTopicName();?></option>
            <?php if(isset($topics)){foreach ($topics as $topic){?>
            <option value="<?php echo $topic->getTopicId();?>"><?php echo $topic->getTopicName();?></option>
            <?php }} ?>
        </select>
        <input type="text" placeholder="title" name="post-title">
        <textarea rows="7" placeholder="content" name="post-content"></textarea>
        <button class="post-btn" type="submit">POST</button>
    </form>
</div>
<style>
    #post-text{
        width: 400px;
        height: auto;
        background-color: black;

        form{
            margin: 0 !important;
            position: relative;

            #topicSelect{
                border-radius: 0 !important;
                width: 35%;
                height: 30px;
                font-family: angles;
                border-color: black !important;
                border-width: 4px !important;
                background-color: white !important;
                color: black !important;
                font-size: 10px !important;
                text-transform: uppercase;
                display: inline;
            }
            #topicSelect:hover {
                background-color: black !important;
                border-color: white !important;
                color: white !important;
                cursor: pointer;
            }

            option:hover {
                background-color: black !important;
                border-color: white !important;
                color: white !important;
            }
            input{
                width: 55%;
                height: 30px;
                font-family: "Agency FB";
                font-size: 20px;
            }

            textarea{
                width: 100%;
                margin-top: 2px;
                font-family: "Agency FB";
                font-size: 20px;
            }
            .post-btn{
                position: absolute;
                right: 0;
                bottom: 0;
                font-family: angles;
            }
        } }
</style>