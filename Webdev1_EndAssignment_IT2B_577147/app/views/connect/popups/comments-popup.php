<body>
<div id="comments-section">
    <div id="parent-post">
        <div id="parent-post-body">
            <div id="parent-post-headers">
                <img id="poster-picture" src="<?php echo isset($post) ? $post->getUser()->getPictureSrc() : ''?>" role="img" width="50px" height="50px">
                <div id="parent-post-header-text">
                    <h5 class="poster-name"><?php echo isset($post) ? $post->getUser()->getFullName() : ''?></h5>
                    <h5 id="parent-post-title"><?php echo isset($post) ? $post->getPostTitle() : ''?></h5>
                </div>
            </div>
            <p id="parent-post-content" class="mx-3"><?php echo isset($post) ? $post->getTextContent() : ''?></p>
            <div class="post-footer">
                <label>posted on<cite title="time stamp"><?php echo isset($post) ? ' '.$post->getPostedAt()->format('D d/m/y').' at '.$post->getPostedAt()->format('H:i') : ''?></cite></label>
            </div>
        </div>
    </div>
    <?php if (isset($comments)){ foreach ($comments as $comment){?>
        <div id="<?php echo $comment->getId()?>" class="comment">
            <div class="name-section">
                <span class="poster-name"><?php echo $comment->getUser()->getFullName()?></span>
            </div>
            <div class="content-section">
                <span><?php echo $comment->getContentText()?></span>
            </div>
            <div class="btns-section">
                <label>commented on<cite title="time stamp"><?php echo ' '.$comment->getPostedAt()->format('D d/m/y').' at '.$comment->getPostedAt()->format('H:i')?></cite></label>
            </div>
        </div>
    <?php }} ?>

    <div class="comment-submit">
        <input Id="<?php echo $post->getId()?>-commentsection" type="text" placeholder="Say something..."/>
        <button type="button" onclick="storeComment(<?php echo $post->getId()?>, '<?php echo $post->getTopic()->getTopicName()?>', '<?php echo $post->getId()?>-commentsection')">comment</button>
    </div>
</div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&display=swap');

    #comments-section{
        overflow-y: scroll;
        background-color: black;
        max-width: 500px;
        min-width: 400px;
        height: auto;
        max-height: 380px;
        padding: 5px;

        #parent-post{
            color: white !important;
            margin-bottom: 5px;
            #parent-post-body{
                align-items: center;
                #parent-post-headers{
                    display: flex;
                    #parent-post-header-text{
                        margin: 5px;
                    }
                }
                #parent-post-title{
                    font-family: "Agdasima", sans-serif;
                    font-weight: 700;
                    font-style: normal;
                    font-size: 26px;
                }
                #parent-post-content{
                    font-family: "Agdasima", sans-serif;
                    font-weight: 400;
                    font-style: normal;
                    font-size: 22px;
                    max-height: 100px;
                    overflow-y: auto;
                }
            }
        }

        .comment{
            border: white solid 2px;
            color: black;
            background-color: white;
            padding: 5px;
            margin-bottom: 5px;
            font-family: "Agdasima", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 22px;

            .btns-section{
                display: flex;
                justify-content: flex-end;

                a{
                    margin: 5px;
                    font-weight: bold;
                }
                label{
                    font-size: 14px;
                }
            }
        }

        .name-section{
            margin-top: 5px;
            margin-bottom: 2px;
        }

        a{
            color: black;
            font-family: "Agdasima", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 20px;
        }
        a:hover{
            background-color: white;
            filter: invert(100%);
        }

        .poster-name{
            font-family: "Agdasima", sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 13px;
            text-transform: uppercase;
        }

        .comment-submit{
            width: 100%;
            position: sticky;
            bottom: 0;
            margin: 0;
            height: 30px;
            background-color: white;


            input{
                width: 85%;
                position: relative;
                height: 30px;
                font-family: "Agdasima", sans-serif;
                font-weight: 400;
                font-style: normal;
                font-size: 20px;
                border: 0 solid white;
            }
            input:focus{
                outline: none;
            }
            button {
                position: absolute;
                right: 0;
                font-family: "Agdasima", sans-serif;
                font-weight: 700;
                font-style: normal;
                font-size: 20px;
                border-width: 3px;
                background-color: white;
                color: black;
            }
            button:hover{
                background-color: black;
                border-color: white;
                color: white;
                cursor: pointer;
            } }


    }
</style>
