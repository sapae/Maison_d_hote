<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Style/reservation.css">
    <title>Reservation</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed navbar-expand-lg navbar-dark bg-dark p-md-3" style="background-color: black;">
        <div class="container">
            <a href="#" class="navbar-brand fs-3">Vacatya</a>
            <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
                aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white fs-5">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="gallery.php" class="nav-link text-white fs-5">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="signin.php" class="nav-link text-white fs-5">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="reservation.php" class="nav-link  text-white fs-5 border-bottom">Reservation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- body form -->
    <div class="bg-light">
        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-4 order-md-2 mb-4">
                    <form class="card p-2">
                        <img src="Assets/Img/font.jpg" alt="" id="resImg">
                        <div class="input-group-append text-center m-1">
                            <label id="description" class="m-2 fs-4">Our beautiful Destinations</label>
                        </div>
                    </form>
                </div>
                <!----billing address-->
                <div class="col-sm-8 order-md-1">
                    <h4 class="mb-3 text-center fs-1">Reservation</h4>
                    <form class="needs-validation" novalidate="">
                        <!---first name-->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Firstname">Date In</label>
                                <input id="fn" class="form-control" type="date" required="">

                            </div>
                            <!----last name---->
                            <div class="col-md-6 mb-3">
                                <label for="Lasttname">Date Out</label>
                                <input id="ln" class="form-control" type="date" required="">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="">
                                <label for="" class="">Choose a Good to reserve!</label>
                                <select name="reservation" value="" id="good" onchange="Good()">
                                    <option value="empty"></option>
                                    <option value="simplechamber">Normal Chamber</option>
                                    <option value="doublechamber">Double Chamber</option>
                                    <option value="bungalow">Bungalow</option>
                                    <option value="appartment">Appartment</option>
                                </select>
                                <div id="affichage"></div>
                            </div>
                        </div>
                        <div>
                            <div class="">
                                <label for="" class="">Choose a Pension!</label>
                                <select name="" value="" id="pension" onchange="">
                                    <option value="empty"></option>
                                    <option value="nopension">None</option>
                                    <option value="allpension">Complete</option>
                                    <optgroup label="Half">
                                        <option value="breakfastandlunch">Breakfast/Lunch</option>
                                        <option value="breakfastanddinner">Breakfast/Dinner</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div>

                            <div class="">
                                <label for="">How many Kids You have ?</label>
                                <input type="number" id="nbr_childs" oninput="kids()">
                                <div id="display"></div>
                            </div>

                        </div>
                        <!---button-->
                        <hr class="mb-4">
                        <div class="d-flex justify-content-between mx-auto">
                            <button class="btn btn-success btn-block m-2" id="finalbooking" type="submit">Book Now</button>
                            <button class="btn btn-primary btn-block m-2" id="addreservation" type="submit">Add Reservation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="page-footer bg-dark w-100">
        <div class="container text-center text-md-left mt-5">
            <div class="row bg-dark pt-4 shadow-none">
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold text-white">About Us</h6>
                    <hr class="bg-light mb-4 mt-0 d-inline-block mx-auto text-white" style="width: 125px; height: 2px">
                    <p class="mt-2 text-white">Book your room right now and start your amazing adventure full of
                        discoveries and experiences</p>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold text-white">We provide?</h6>
                    <hr class="bg-light mb-4 mt-0 d-inline-block mx-auto text-white" style="width: 85px; height: 2px">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#" class="text-white" style="text-decoration: none;">Simple
                                Rooms</a></li>
                        <li class="my-2"><a href="#" class="text-white" style="text-decoration: none;">Double
                                Rooms</a></li>
                        <li class="my-2"><a href="#" class="text-white" style="text-decoration: none;">Appartment</a>
                        </li>
                        <li class="my-2"><a href="#" class="text-white" style="text-decoration: none;">Bungalow</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold text-white">Useful Links</h6>
                    <hr class="bg-light mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; height: 2px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a class="text-white" href="index.php" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="my-2"><a class="text-white" href="#" style="text-decoration: none;">About Us</a>
                        </li>
                        <li class="my-2"><a class="text-white" href="gallery.php"
                                style="text-decoration: none;">Gallery</a></li>
                        <li class="my-2"><a class="text-white" href="#" style="text-decoration: none;">Contact
                                Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center text-white">
            Created with <i class="bi bi-heart-fill" style="color:blue;"></i> by Blue
        </div>
    </footer>
    <script src="Assets/Js/reservation.js"></script>
</body>

</html>