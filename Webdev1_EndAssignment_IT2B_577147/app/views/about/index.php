<html>
<head>
    <title>about us</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="album py-4">
    <div class="container text-center">

        <div class="text-container mx-5" style="width: 50rem;">
        <h4 class="mb-4">Some text about los angles</h4>
        <h6 class="mb-5">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</h6>
        </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <div class="col">
                <div class="card shadow-sm position-relative">
                    <div class="card-body">
                        <div class="card-front">
                            <img style="max-width: 100%; max-height: 100%;" src="/media/artist1.png" role="img">
                            <h5 class="card-text">Angle Name</h5>
                        </div>
                        <div class="card-back text-center">
                            <h6 class="mx-3">this is a text about one of the angles in the front! idk how long it should be</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm position-relative">
                    <div class="card-body">
                        <div class="card-front">
                            <img style="max-width: 100%; max-height: 100%;" src="/media/artist2.png" role="img">
                            <h5 class="card-text">Angle Name</h5>
                        </div>
                        <div class="card-back text-center">
                            <h6 class="mx-3">this is a text about one of the angles in the front! idk how long it should be</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm position-relative">
                    <div class="card-body">
                        <div class="card-front">
                            <img style="max-width: 100%; max-height: 100%;" src="/media/artist1.png" role="img">
                            <h5 class="card-text">Angle Name</h5>
                        </div>
                        <div class="card-back text-center">
                            <h6 class="mx-3">this is a text about one of the angles in the front! idk how long it should be</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    #about-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }

    .card {
        perspective: 1000px;
        width: 300px;
        height: 300px;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.5s;
        cursor: pointer;
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 3px;
    }

    .card-body {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.5s;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card:hover {
        transform: rotateY(180deg);
    }

    .card-front,
    .card-back {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 !important;
        box-sizing: border-box;
    }

    /**.card-back{
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        position: absolute;;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 !important;
    } */

    .card-back {
        transform: rotateY(180deg);
    }

</style>