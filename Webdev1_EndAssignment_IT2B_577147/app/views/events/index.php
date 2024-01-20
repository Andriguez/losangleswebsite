<!DOCTYPE html>
<head>
    <title>Events</title>
    <!--<link rel="icon" href="/media/onlytb.png" type="image/png">-->
    <link rel="stylesheet" type="text/css" href="/style/events/events.css">
</head>
<body>
<div class="main-container mt-3">
    <div id="gallery">
        <div class="gallery-container">
        </div>
        <div id="date-filter-container">
            <div id="year-container">
                <?php if(isset($yFilters)){ foreach ($yFilters as $index => $year){ ?>
                    <a class="<?php echo ($selectedYear == $year) ? 'selectedFilter': ''?>" href="/events/<?php echo $year ?>"><span><?php echo $year ?>▶</span></a>
                <?php }} ?>
            </div>
            <div id="month-container">
                <?php if(isset($mFilters)){ foreach ($mFilters as $i => $month){ ?>
                    <a class="<?php echo ($selectedMonth == $i) ? 'selectedFilter': ''?>" ><span><?php echo $month ?>▶</span></a>
                    <!---month filter doesn't work yet -->
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<script>
    const eventsData = <?php echo isset($events) ? json_encode($events) : ''?>;
    const selectedYear = <?php echo $selectedYear ?? ''?>
</script>
<script src="/js/events/events.js"></script>
</body>
</html>
