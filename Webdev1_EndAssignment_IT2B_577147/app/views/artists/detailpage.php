<?php ?>
<div id="<?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?>-details" class="artist-details-desktop">
    <div class="img-container">
        <img src="<?php echo (isset($artist)) ? $artist->getArtistContent()->getPictureSrc() : '' ?>" alt="Artist Image">
    </div>
    <div class="text-container">
        <span class="artist-name"><?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?></span>
        <label><?php echo (isset($artist)) ? $artist->getPronouns() : '' ?>/<?php echo (isset($artist)) ? $artist->getArtistContent()->getDiscipline()->getName() : '' ?></label>
        <p><?php echo (isset($artist)) ? $artist->getArtistContent()->getDescription() : '' ?></p>
    </div>
    <div class="media-container" style="padding-top: 30px;">
        <div class="soundcloud-container">
            <?php if (isset($artist) && $artist->getArtistContent()->getSoundcloudUrl() != '#') { ?>
                <iframe width="100%" height="200" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo $artist->getArtistContent()->getSoundcloudUrl() ?>"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"></div>
            <?php } else { echo ''; } ?>
        </div>
        <div class="icon-container">
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getSocials() : '' ?>"><img src="/media/icons/instagram.svg"></a>
            <a href="mailto:<?php echo (isset($artist)) ? $artist->getArtistContent()->getEmail() : '' ?>"><img src="/media/icons/mail.svg"></a>
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getExtraLink() : '' ?>"><img src="/media/icons/triangle.svg"></a>
        </div>
    </div>
</div>




<div id="<?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?>-details" class="artist-details-medium">
    <div class="img-container">
        <img src="<?php echo (isset($artist)) ? $artist->getArtistContent()->getPictureSrc() : '' ?>" alt="Artist Image">
        <div class="icon-container">
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getSocials() : '' ?>"><img src="/media/icons/instagram.svg"></a>
            <a href="mailto:<?php echo (isset($artist)) ? $artist->getArtistContent()->getEmail() : '' ?>"><img src="/media/icons/mail.svg"></a>
            <a href="<?php echo (isset($artist)) ? $artist->getArtistContent()->getExtraLink() : '' ?>"><img src="/media/icons/triangle.svg"></a>
        </div>
    </div>
    <div class="text-container">
        <span class="artist-name"><?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?></span>
        <label><?php echo (isset($artist)) ? $artist->getPronouns() : '' ?>/<?php echo (isset($artist)) ? $artist->getArtistContent()->getDiscipline()->getName() : '' ?></label>
        <p><?php echo (isset($artist)) ? $artist->getArtistContent()->getDescription() : '' ?></p>
    </div>
    <div class="media-container">
        <?php if ($artist->getArtistContent()->getSoundcloudUrl() != '#'){?>
            <div class="soundcloud-container">
                <iframe width="200%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo $artist->getArtistContent()->getSoundcloudUrl() ?>"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"></div>
            </div>
        <?php } ?>
    </div>
</div>





<div id="<?php echo (isset($artist)) ? $artist->getArtistContent()->getStageName() : '' ?>-details" class="artist-details-phone">
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
        <?php if ($artist->getArtistContent()->getSoundcloudUrl() != ''){?>
        <div class="soundcloud-container">
            <?php if (isset($artist)) { ?>
                <iframe width="100%" height="200" scrolling="no" frameborder="no" allow="autoplay" src="<?php echo $artist->getArtistContent()->getSoundcloudUrl() ?>"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"></div>
            <?php } else { echo ''; } ?>
        </div>
        <?php } ?>
    </div>
</div>

<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/fonts/losangles-font.ttf');
    }

    @media (min-width: 1049px) {
        .artist-details-phone{
            display: none !important;
        }
        .artist-details-medium{
            display: none !important;
        }
        .artist-details-desktop {
            overflow-x: hidden;
            display: flex;
            flex-wrap: wrap;
            align-items: center;

            .artist-name {
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
            min-height: 280px;

            img {
                height: 250px !important;
                width: 250px !important;
            }

            .artist-name {
                display: block;
            }

            .img-container {
                margin: auto;
            }

            .text-container {
                min-width: 320px;
                max-height: 310px;
                height: 80%;
                padding: 10px;
                justify-content: center;
                align-items: center;
                font-family: "Agency FB";

                span {
                    color: white;
                    margin-bottom: 2px;
                }

                p {
                    margin: 25px 30px 12px 5px;
                    font-size: 20px;
                    max-width: 320px;
                    max-height: 210px;
                    overflow-y: auto;
                }
            }

            .media-container {
                margin: auto auto 10px auto;

                .icon-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 5px;
                    margin-top: 5px;

                    img {
                        width: 55px !important;
                        height: 55px !important;
                        margin: 20px;
                        border-radius: 30%;
                    }

                    img:hover {
                        background-color: black;
                        filter: invert(100%);
                    }

                    .soundcloud-container {
                        margin-right: 20px;
                        margin-top: 20px !important;
                        margin-bottom: 10px;
                    }
                }
            }
        }
    }
    

    @media (max-width: 1049px) {
        .artist-details-desktop{
            display: none !important;
        }
        .artist-details-phone{
            display: none !important;
        }
        .artist-details-medium {
            overflow-x: hidden;
            overflow-y: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;

            .artist-name {
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
            min-height: 280px;

            img {
                height: 250px !important;
                width: 250px !important;
            }

            .artist-name {
                display: block;
            }

            .img-container {
                margin: auto;
                .icon-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 10px;
                    margin-top: 10px;

                    img {
                        width: 55px !important;
                        height: 55px !important;
                        margin: 20px;
                        border-radius: 30%;
                    }

                    img:hover {
                        background-color: black;
                        filter: invert(100%);
                    }}

            }

            .text-container {
                min-width: 320px;
                max-height: 300px;
                height: 80%;
                margin: auto;
                padding: 5px;
                justify-content: center;
                align-items: center;
                font-family: "Agency FB";

                span {
                    color: white;
                    margin-bottom: 2px;
                }

                p {
                    margin: 25px 30px 12px 5px;
                    font-size: 20px;
                    max-width: 320px;
                    overflow-y: auto;
                }
            }

            .media-container {
                align-content: center;
                    .soundcloud-container {
                    }
                }
            }
        }
    }
    
    @media (max-width:740px) {
        .artist-details-desktop{
            display: none !important;
        }
        .artist-details-medium{
            display: none !important;
        }
        .artist-details-phone {
            overflow-x: hidden;
            overflow-y: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;

            .artist-name {
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
            min-height: 280px;

            img {
                height: 250px !important;
                width: 250px !important;
            }

            .artist-name {
                display: block;
            }

            .img-container {
                margin: auto;
            }

            .text-container {
                min-width: 320px;
                max-height: 300px;
                height: 80%;
                margin: auto;
                padding: 5px;
                justify-content: center;
                align-items: center;
                font-family: "Agency FB";

                span {
                    color: white;
                    margin-bottom: 2px;
                }

                p {
                    margin: 25px 30px 12px 5px;
                    font-size: 20px;
                    max-width: 320px;
                    overflow-y: auto;
                }
            }

            .media-container {
                margin: auto auto 10px auto;

                .icon-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 10px;
                    margin-top: 10px;

                    img {
                        width: 55px !important;
                        height: 55px !important;
                        margin: 20px;
                        border-radius: 30%;
                    }

                    img:hover {
                        background-color: black;
                        filter: invert(100%);
                    }

                    .soundcloud-container {
                        margin-right: 20px;
                        margin-top: 10px !important;
                        margin-bottom: 10px;
                    }
                }
            }
        }
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