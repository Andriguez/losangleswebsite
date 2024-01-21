<?php ?>
<div id="<?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?>-details" class="artist-details">
    <div class="img-container">
        <img src="<?php echo (isset($artist)) ? $artist->getArtistContent()->getPictureSrc() : '' ?>" alt="Artist Image">
    </div>
    <div class="text-container">
        <span class="artist-name"><?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?></span>
        <label><?php echo (isset($artist)) ? $artist->getPronouns() : '' ?>/<?php echo (isset($artist)) ? $artist->getArtistContent()->getDiscipline()->getName() : '' ?></label>
        <p><?php echo (isset($artist)) ? $artist->getArtistContent()->getDescription() : '' ?></p>
    </div>
    <div class="media-container">
        <div class="icon-container">
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getSocials() : '' ?>"><img src="/media/icons/instagram.svg"></a>
            <a href="mailto:<?php echo (isset($artist)) ? $artist->getArtistContent()->getEmail() : '' ?>"><img src="/media/icons/mail.svg"></a>
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getExtraLink() : '' ?>"><img src="/media/icons/triangle.svg"></a>
        </div>
        <div class="soundcloud-container">
            <?php echo (isset($artist)) ? $artist->getArtistContent()->getSoundcloudUrl() : '' ?>
        </div>
    </div>
</div>

<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/fonts/losangles-font.ttf');
    }

    .artist-details{
        overflow-x: hidden;
        overflow-y: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;

        .artist-name{
            color: black;
            font-weight: bold;
            font-size: 20px;
            font-family: angles;
            text-transform: uppercase;
        }

        width: 100% !important;
        background-color: black !important;
        color: white !important;
        display: flex;
        height: 280px;

        img{
            height: 250px !important;
            width: 250px !important;
        }
        .artist-name{
            display: block;
        }

        .img-container{
            margin: auto;
        }
        .text-container{
            min-width: 320px;
            height: 80%;
            margin: auto;
            padding: 5px;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
            font-family: "Agency FB";

            span{
                color: white;
                margin-bottom: 2px;
            }
            p{
                margin: 25px 30px 12px 5px;
                font-size: 20px;
                max-width: 320px;
            }
        }

        .media-container {
            margin: auto auto 10px auto;
            .icon-container {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 30px;

                img {
                    width: 55px !important;
                    height: 55px !important;
                    margin: 20px;
                    border-radius: 30%;
                }

                img:hover{
                    background-color: black;
                    filter: invert(100%);
                }

                .soundcloud-container{
                    margin-right: 10px;
                    margin-top: 50px !important;
                }
            }  }
    }

    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
        width: 5px; /* Set width of the scrollbar */
    }

    ::-webkit-scrollbar-thumb {
        background-color: black; /* Color of the thumb */
        border-radius: 3px; /* Rounded corners of the thumb */
    }

    ::-webkit-scrollbar-track {
        background-color: white; /* Color of the track */
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: whitesmoke; /* Color of the thumb on hover */
    }
</style>