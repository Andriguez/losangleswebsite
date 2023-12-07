<html>
<head>
    <title>events</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/carousel2.css">
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="main-container">
    <div class="button" id="left" onclick="shiftLeft()"><img src="/media/arrow_left.svg" alt=""></div>

    <div class="car-container">
<div class="car">
    <div class="car-item">
        <img src="/media/event1.png" alt="Item 1" height="430" width="400">
    </div>
    <div class="car-item">
        <img src="/media/event2.png" alt="Item 2" height="430" width="400">
    </div>
    <div class="car-item">
        <img src="/media/event3.png" alt="Item 3" height="430" width="400">
    </div>
    <div class="car-item">
        <img src="/media/event1.png" alt="Item 4" height="430" width="400">
    </div>
    <div class="car-item">
        <img src="/media/event2.png" alt="Item 5" height="430" width="400">
    </div>
</div></div>
    <div class="button" id="right" onclick="shiftRight()"><img src="/media/arrow_right.svg" alt=""></div>
</div>

<script type="text/javascript">
    function shiftLeft() {
        const boxes = document.querySelectorAll(".car-item");
        const tmpNode = boxes[0];
        boxes[0].className = "car-item move-out-from-left";

        setTimeout(function() {
            if (boxes.length > 5) {
                tmpNode.classList.add("car-item--hide");
                boxes[5].className = "car-item move-to-position5-from-left";
            }
            boxes[1].className = "car-item move-to-position1-from-left";
            boxes[2].className = "car-item move-to-position2-from-left";
            boxes[3].className = "car-item move-to-position3-from-left";
            boxes[4].className = "car-item move-to-position4-from-left";
            boxes[0].remove();

            document.querySelector(".car").appendChild(tmpNode);

        }, 80);

    }

    function shiftRight() {
        const boxes = document.querySelectorAll(".car-item");

        console.log("Number of elements in NodeList:", boxes.length);

        // Ensure that there are elements in the NodeList before proceeding
        if (boxes.length > 0) {
            boxes[4].className = "car-item move-out-from-right";

            setTimeout(function() {
                const noOfCards = boxes.length;
                if (noOfCards > 4) {
                    boxes[4].className = "car-item car-item--hide";
                }

                const tmpNode = boxes[noOfCards - 1];
                tmpNode.classList.remove("car-item--hide");
                boxes[noOfCards - 1].remove();
                let parentObj = document.querySelector(".car");
                parentObj.insertBefore(tmpNode, parentObj.firstChild);
                tmpNode.className = "car-item move-to-position1-from-right";
                boxes[0].className = "car-item move-to-position2-from-right";
                boxes[1].className = "car-item move-to-position3-from-right";
                boxes[2].className = "car-item move-to-position4-from-right";
                boxes[3].className = "car-item move-to-position5-from-right";
            }, 80);
        } else {
            console.error("No elements found with class .car-item");
        }
    }
</script>
<style>
    #events-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
</style>
</body>
</html>
