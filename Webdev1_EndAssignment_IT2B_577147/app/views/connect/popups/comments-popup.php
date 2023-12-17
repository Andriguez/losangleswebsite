<body>
<div class="box-popup" id="comments-section">
    <div class="comment">
        <div class="name-section">
            <span>poster name</span>
        </div>
        <div class="content-section">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="btns-section">
            <a href="#">reply</a>
            <a href="#">3 replies</a>
        </div>
    </div>
    <div class="child-comment">
        <span>poster name</span>
        <span>:</span>
        <span>this is a comment in the comment section</span>
    </div>
    <div class="child-comment">
        <span>poster name</span>
        <span>:</span>
        <span>this is a comment in the comment section</span>
    </div>
    <div class="child-comment">
        <span>poster name</span>
        <span>:</span>
        <span>this is a comment in the comment section</span>
    </div>
    <div class="comment">
        <div class="name-section">
            <span>poster name</span>
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
            <span>poster name</span>
        </div>
        <div class="content-section">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="btns-section">
            <a href="#">reply</a>
            <a href="#">1 replies</a>
        </div>
    </div>
    <div class="child-comment">
        <span>poster name</span>
        <span>:</span>
        <span>this is a comment in the comment section</span>
    </div>

    <div class="embed-submit-field">
        <input type="text" placeholder="Say something..."/>
        <button type="submit">comment</button>
    </div>
</div>
</div>
</body>
<style>
    .box-popup{
        border: black solid 3px;
        width: 600px;
        height: 400px;
    }
    #comments-section{
        overflow-y: scroll;

    .comment{
        border: black solid 3px;
        float: left;
    }
    .child-comment{
        border: black solid 3px;
        width: 500px;
        float: right;
    }
    .embed-submit-field button {
        border-width: 3px;
        font-weight: bold;
        background-color: white;
    }
    .embed-submit-field button:hover {
        background-color: black;
        border-color: white;
        color: white;
    }  }
</style>
