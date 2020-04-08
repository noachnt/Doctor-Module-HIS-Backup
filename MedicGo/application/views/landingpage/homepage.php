<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- MY CSS -->
    <link href=" <?= base_url('assets/'); ?>css/style.css" rel="stylesheet" type="text/css">

    <title>Medic Go</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?= base_url('assets/'); ?>images/LOGOproject2.jpg.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Contact</a>
                    <a class="nav-item nav-link" href="#">How it Works?</a>
                    <a class="nav-item nav-link" href="#">Supported Hospital</a>
                    <a class="nav-item btn btn-success custom-button" href="<?= base_url('auth') ?>">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <!-- JUMBOTRON -->

    <div class="jumbotron jumbotron-fluid">

        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="container">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <h1>Free, easy to use software for developing <span> world healthcare </span>.</h1>
                                <a class="btn btn-warning mt-3" href="<?= base_url('auth') ?>">Try it now</a>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <h1> <span id="medicGo">MedicGo</span> is an offline-first EHR/HIS application.</h1>
                            </div>
                            <div class="col-4 offset-1"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <h1>Built to provide <span> modern HIS</span> to the least resources environtment.</h1>
                            </div>
                            <div class="col-4 offset-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Carousel -->
    </div>
    <!-- END JUMBOTRON -->

    <!-- CONTAINER -->
    <div class="container">

        <!-- INFO PANEL -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <img src="<?= base_url('assets/'); ?>images/icon/doctor.png" class="float-left">
                        <h4>Profesional Doctor</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-lg">
                        <img src="<?= base_url('assets/'); ?>images/icon/hospital.png" class="float-left">
                        <h4>Profesional Doctor</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-lg">
                        <img src="<?= base_url('assets/'); ?>images/icon/pills.png" class="float-left">
                        <h4>Profesional Doctor</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF PANEL -->

        <!-- Description -->

        <div class="row Description1">
            <div class="col-lg-6">
                <img src="<?= base_url('assets/'); ?>images/icon/care.png" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h3 class="">We serve you with heart</h3>
                <p class="pt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi assumenda a,
                    exercitationem ratione
                    aut soluta!</p>
                <a href="#" class="btn btn-warning ">Learn more</a>
                <p class="pt-3">Don't have an account yet? <a href="<?= base_url('auth/registration') ?>">Get started</a>.</p>
            </div>
        </div>
        <!-- END OF DESCRIPTION -->

        <!-- TESTIMONIAL -->
        <section class="testimonial">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h5>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptas eligendi et illo quia
                        odit!"</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <figure class="figure">
                        <img src="https://images.unsplash.com/photo-1521225099409-8e1efc95321d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="figure-img img-fluid rounded-circle" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                    <figure class="figure">
                        <img src="https://images.unsplash.com/photo-1580281658626-ee379f3cce93?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="figure-img img-fluid rounded-circle utama" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption">
                            <h5>Denny Raymond</h5>
                            <p>Doctor</p>
                        </figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="https://images.unsplash.com/photo-1552374196-c4e7ffc6e126?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="figure-img img-fluid rounded-circle" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                </div>
            </div>
        </section>
        <!-- END OF TESTIMONIAL -->
    </div>
    <!-- END OF CONTAINER -->

    <!-- FOOTER -->
    <footer>
        <div class="row">
            <div class="col text-center">
                <h5> ©2020 MedicGo - All rights reserved.</h5>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>