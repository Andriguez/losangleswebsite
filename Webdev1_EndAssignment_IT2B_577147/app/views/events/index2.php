<!DOCTYPE html>
<head>
    <title>events</title>
    <link href="style/bootstrap.css" rel="stylesheet" />
    <link href="style/rotatingcard.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="page">
    <div class="col-md-4 col-sm-6">
        <div class="card-container manual-flip">
            <div class="card">
                <div class="front">
                    <div class="cover">
                        <img src="images/rotating_card_thumb.png"/>
                    </div>
                    <div class="user">
                        <img class="img-circle" src="images/rotating_card_profile2.png"/>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h3 class="name">Andrew Mike</h3>
                            <p class="profession">Web Developer</p>
                            <p class="text-center">"Lamborghini Mercy <br>Your chick she so thirsty <br>I'm in that two seat Lambo"</p>
                        </div>
                        <div class="footer">
                            <button class="btn btn-simple" onclick="rotateCard(this)">
                                <i class="fa fa-mail-forward"></i> Manual Rotation
                            </button>
                        </div>
                    </div>
                </div> <!-- end front panel -->
                <div class="back">
                    <div class="header">
                        <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h4 class="text-center">Job Description</h4>
                            <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>

                            <div class="stats-container">
                                <div class="stats">
                                    <h4>235</h4>
                                    <p>
                                        Followers
                                    </p>
                                </div>
                                <div class="stats">
                                    <h4>114</h4>
                                    <p>
                                        Following
                                    </p>
                                </div>
                                <div class="stats">
                                    <h4>35</h4>
                                    <p>
                                        Projects
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                            <i class="fa fa-reply"></i> Back
                        </button>
                        <div class="social-links text-center">
                            <a href="https://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                            <a href="https://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                            <a href="https://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                        </div>
                    </div>
                </div> <!-- end back panel -->
            </div> <!-- end card -->
        </div> <!-- end card-container -->
    </div>
</div>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

        $('a.scroll-down').click(function(e){
            e.preventDefault();
            scroll_target = $(this).data('href');
            $('html, body').animate({
                scrollTop: $(scroll_target).offset().top - 60
            }, 1000);
        });

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }


</script>
</body>
</html>
<style>
    .page {
        margin-top: 60px;
        font-size: 14px;
        font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
        background-color: #E5E9ED;
    }
    .btn:hover,
    .btn:focus,
    .btn:active{
        outline: 0 !important;
    }
    /* entire container, keeps perspective */
    .card-container {
        -webkit-perspective: 800px;
        -moz-perspective: 800px;
        -o-perspective: 800px;
        perspective: 800px;
        margin-bottom: 30px;
    }
    /* flip the pane when hovered */
    .card-container:not(.manual-flip):hover .card,
    .card-container.hover.manual-flip .card{
        -webkit-transform: rotateY( 180deg );
        -moz-transform: rotateY( 180deg );
        -o-transform: rotateY( 180deg );
        transform: rotateY( 180deg );
    }

    .btn-info,
    .btn-info:hover,
    .btn-info:focus{
        color: #FFF !important;
        background-color: #00bbff !important;
        border-color: #00bbff !important;
    }

    .btn-info{
        opacity: .8;
        transition: all 0.1s;
        -webkit-transition: all 0.1s;
    }
    .btn-info:hover,
    .btn-info:focus{
        opacity: 1;
    }
</style>

