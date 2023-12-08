<html>
<head>
    <title>connect</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="container text-center">

    <div id="topics-container" class="container my-4">
        <h5 id="topics-label">Topics</h5>
        <ul class="nav justify-content-center" id="topics-nav">
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">General</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">HRT</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">Gigs</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">Other</a></h6>
            </li>
        </ul>
    </div>

    <div class="row">
            <div class="col">
                <div class="card shadow-sm">
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
    
        <div id="postbtns" class="col mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </div>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</body>
</html>
<style>
    #connect-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    .col{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #topics-container{
        border: 3px solid black; /* Adjust thickness and color as needed */
        text-align: center;
        justify-content: center;
        position: relative;
        padding: 5px;
        display: inline-block;
        width: auto;
    }

    #topics-label {
        position: absolute;
        top: -16px;
        left: 20px;
        height: auto;
        width: 60px;
        background-color: white;
    }

    #topics-nav{
        width: auto;
    }

</style>