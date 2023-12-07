<!DOCTYPE html>
<head>
    <title>3D Carousel</title>
    <link rel="stylesheet" href="/style/jquery.flipster.min.css">


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery.flipster.min.js"></script>

</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<!--<div id="coverflow">
     <li data-flip-title="139 Los Angles">
            <img src="/media/event1.png" width="400" height="400">
        </li>
        <li data-flip-title="Arvi's Angles">
            <img src="/media/event2.png" width="400" height="400">
        </li>
        <li data-flip-title="Club XXX Angles">
            <img src="/media/event3.png" width="400" height="400">
        </li>
    </ul>
</div>
<script>
    var coverflow = $("#coverflow").flipster();
</script>

<pre class="code">$("#coverflow").flipster();</pre> -->

<!--<div id="carousel">
    <ul class="flip-items">
        <li data-flip-title="139 Los Angles">
            <img src="/media/event1.png" width="600" height="600">
        </li>
        <li data-flip-title="Arvi's Angles">
            <img src="/media/event2.png" width="600" height="600">
        </li>
        <li data-flip-title="Club XXX Angles">
            <img src="/media/event3.png" width="500" height="500">
        </li>
    </ul>
</div>

<script>
    var carousel = $("#carousel").flipster({
        style: 'carousel',
        spacing: -0.5,
        nav: true,
        buttons:   true,
    });
</script>

<pre class="code">$("#carousel").flipster({
    style: 'carousel',
    spacing: -0.5,
    nav: true,
    buttons: true,
});</pre>
-->
<!--
<div id="wheel">
    <ul>
        <li data-flip-title="139 Los Angles">
            <img src="/media/event1.png" width="400" height="400">
        </li>
        <li data-flip-title="Arvi's Angles">
            <img src="/media/event2.png" width="400" height="400">
        </li>
        <li data-flip-title="Club XXX Angles">
            <img src="/media/event3.png" width="400" height="400">
        </li>
    </ul>
</div>
<script>
    var wheel = $("#wheel").flipster({
        style: 'wheel',
        spacing: 0
    });
</script>
-->
<div id="flat">
    <ul>
        <li data-flip-title="139 Los Angles">
            <img src="/media/event1.png" width="400" height="430">
        </li>
        <li data-flip-title="Arvi's Angles">
            <img src="/media/event2.png" width="400" height="430">
        </li>
        <li data-flip-title="Club XXX Angles">
            <img src="/media/event3.png" width="400" height="430">
        </li>
    </ul>
</div>

<script>
    var flat = $("#flat").flipster({
        style: 'flat',
        spacing: -0.25
    });
</script>
<style>
    body{
        overflow: hidden;
    }
</style>

</body>
</html>