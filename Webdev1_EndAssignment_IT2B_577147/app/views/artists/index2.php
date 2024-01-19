<html>
<head>
    <title>artists</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/artists/artists.css">
</head>
<body>
<?php $this->navbar->displayNavbar(); ?>
<div class="mt-1 mb-2 ms-5">
    <select data-discipline-param="<?php echo (isset($targetDiscipline)) ? $targetDiscipline->getDisciplineId() : ''?>" id="disciplineFilter" class="form-select">
        <option value="<?php echo isset($targetDiscipline) ? $targetDiscipline->getName() : ''?>" selected><?php echo isset($targetDiscipline) ? $targetDiscipline->getName() : 'discipline'?> </option>
        <?php foreach ($disciplines as $discipline){ ?>
            <option value="<?php echo $discipline->getName();?>"><?php echo $discipline->getName();?></option>
        <?php }?>
    </select>
</div>
<div class="album pt-1 pb-3">
    <?php foreach ($disciplines as $discipline){ ?>
    <div id="<?php echo $discipline->getDisciplineId()?>" data-discipline-name="<?php echo $discipline->getName()?>" class="artists-container">
        <label class="type-label"><?php echo $discipline->getName()?>s</label>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php foreach ($allArtists[$discipline->getDisciplineId()] as $artist) { ?>
                <div id="<?php echo $artist->getUserId()?>" class="col">
                    <a class="artist-name" onclick="toggleDiv(<?php echo $artist->getUserId()?>)"><span><?php echo $artist->getArtistContent()->getStageName(); ?></span></a>
                </div>
            <?php } ?>
        </div></div>
    <?php } ?>

</div>
<script src="/js/artists/artists.js"></script>
</body>
</html>