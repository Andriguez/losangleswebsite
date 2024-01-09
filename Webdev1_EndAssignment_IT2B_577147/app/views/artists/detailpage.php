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
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getSocials() : '' ?>"><img src="/media/instagram.svg"></a>
            <a href="mailto:<?php echo (isset($artist)) ? $artist->getArtistContent()->getEmail() : '' ?>"><img src="/media/mail.svg"></a>
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getExtraLink() : '' ?>"><img src="/media/triangle.svg"></a>
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
            margin-top: ;
            display: block;
        }

        .img-container{
            margin: auto;
        }
        .text-container{
            max-width: 420px;
            height: 80%;
            margin: auto;
            padding: 5px;
            justify-content: center;
            overflow-y: auto;
            font-family: "Agency FB";



            span{
                color: white;
                margin-bottom: 2px;
            }
            p{
                margin: 25px 30px 12px 5px;
                font-size: 20px;
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
</style>