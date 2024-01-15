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
                <label>posted on<cite title="time stamp"><?php echo isset($post) ? ' '.$post->getPostedAt()->format('d/m/y').' at '.$post->getPostedAt()->format('H:i') : ''?></cite></label>
            </div>
        </div>
    </div>
    <div class="comment">
        <div class="name-section">
            <span class="poster-name">poster name</span>
        </div>
        <div class="content-section">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="btns-section">
            <a href="#">delete</a>
        </div>
    </div>
    <div class="comment">
        <div class="name-section">
            <span class="poster-name">poster name</span>
        </div>
        <div class="content-section">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="btns-section">
            <a href="#">reply</a>
        </div>
    </div>
    <div class="comment">
        <div class="name-section">
            <span class="poster-name">poster name</span>
        </div>
        <div class="content-section">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="btns-section">
            <a href="#">reply</a>
        </div>
    </div>


    <div class="comment-submit">
        <input type="text" placeholder="Say something..."/>
        <button type="submit">comment</button>
    </div>
</div>
</body>
<style>
    #comments-section{
        overflow-y: scroll;
        background-color: black;
        width: 500px;
        height: auto;
        max-height: 400px;
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
                #parent-post-content{
                    font-family: "Agency FB" !important;
                    font-size: 20px;
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
        font-family: "Agency FB";
        font-size: 20px;

        .btns-section{
            display: flex;
            justify-content: flex-end;

            a{
                margin: 5px;
                font-weight: bold;
            }
        }
    }

            .name-section{
                margin-top: 5px;
                margin-bottom: 2px;
            }

            a{
                color: black;
                font-family: "Agency FB";
                font-size: 18px;
            }
            a:hover{
                background-color: white;
                filter: invert(100%);
            }

            .poster-name{
                font-family: angles !important;
                font-size: 11px;
                text-transform: uppercase;
                font-weight: bold;
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
                font-family: "Agency FB";
                font-size: 18px;


            }
            button {
                position: absolute;
                right: 0;
                font-family: "Agency FB";
                font-size: 18px;
                font-weight: bold;
                border-width: 3px;
                background-color: white;
            }
            button:hover{
                background-color: black;
                border-color: white;
                color: white;
                cursor: pointer;
            } }


    }
</style>
