    <html lang="en" id="home">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIADAM</title>
        
        <!-- Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/') . 'bootstrap-4.1.3-dist/css/bootstrap.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/') . 'landing_page.css'?>">

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Popper -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <!-- Script -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/') . 'landing_page.js'?>"></script>

        <link rel="icon" type="image/x-icon" sizes="48x48" href="<?php echo base_url('assets/img/') . 'siadampng.png'?>">
        </head>

        <body data-spy="scroll" data-target="#navbarResponsive">

            <!--- start home section -->
            <div>
                <!--- navigation -->
                <nav class="navbar navbar-expand-md navbar-light bg-transparant fixed-top">
                <a class="navbar-brand" href="#home"><img src="<?php echo base_url('assets/img/landing_page/') . 'siadam.png'?>" ><img src="<?php echo base_url('assets/img/landing_page/') . 'Asset5.png'?>" ></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto page-scroll">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class=" btn btn-primary tombol" href="<?php echo site_url('Autentikasi')?>">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--- end navigation -->
                
                <!--- start image slider -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide="2"></li>
                        </ol>
                        
                        <div class="carousel-inner" role="listbox">
                            <!--- slide 1 -->
                            <div class="carousel-item active" style="background-image: url(<?php echo base_url('assets/img/landing_page/') . 'slider1.jpg'?>)">
                                <div class="carousel-caption text-center">
                                    <!-- <h1>SIADAM</h1>
                                    <h3>Sistem Informasi</h3>
                                    <h3>Access Data Management</h3>
                                    <br><br><br><br><br><br><br><br><br><br> -->
                                    <!-- <a class="btn btn-outline-light btn-lg" href="#"> Login</a> -->
                                </div>
                            </div>
                            <!--- slide 2 -->
                            <div class="carousel-item" style="background-image: url(<?php echo base_url('assets/img/landing_page/') . 'slider2.jpg'?>)">
                            </div>
                            <!--- slide 3 -->
                            <div class="carousel-item" style="background-image: url(<?php echo base_url('assets/img/landing_page/') . 'slider3.jpg'?>)">
                            </div>
                        </div> <!--- end carousel inner -->
                        <!--- prev & next buttons -->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                </div>

                <!--- end image slider -->
            </div>
            <!--- end home section -->

            <!-- - about section -->
            <div id="about" class="offset">
                <div class="col-12 text-center">
                    <h3 class="heading">About</h3>
                    <div class="heading-underline"></div>
                </div>
                <div class="row padding">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img class="card-img-top" src=<?php echo base_url('assets/img/landing_page/') . 'phone-book.png'?>>
                            <div class="card-body">
                                <h4>Contact</h4>
                                <hr class="socket">
                                <div class="text-center">
                                    <p>
                                        Phone 024 56789
                                    </p>
                                    <p>
                                    Email telkom@indonesia
                                    </p>
                                    <p>
                                        Fax 021 3456789
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img id="" class="card-img-top" src=<?php echo base_url('assets/img/landing_page/') . 'hour.png'?>>
                            <div class="card-body">
                                <h4>Business Hours</h4>
                                <hr class="socket">
                                <div class="text-center">
                                    <p>
                                        Senin - Jumat
                                    </p>
                                    <p>
                                        08.00 - 17.00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img class="card-img-top" src="<?php echo base_url('assets/img/landing_page/') . 'placeholder.png'?>">
                            <div class="card-body">
                                <h4>Address</h4>
                                <hr class="socket">
                                <div class="text-center">
                                    <p>
                                        Telkom Witel Semarang
                                    </p>
                                    <p>
                                        Jalan Singotoro 22 Kec. Candisari
                                    </p>
                                    <p>
                                        Kota Semarang, Jawa Tengah, Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of row -->
            </div> 
            <!--- end team section -->
            
            <div id="" class="offset">
                <footer>
                    <div class="row justify-content-center">
                        &copy; Copyright 2020
                    </div> <!--- end of row -->
                </footer>
            </div>
            
            <!--- Script Source Files -->
        
        <!-- Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Popper -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <!-- Script -->
        <link rel="stylesheet" href="../../assets/css/landing_page.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        
            <script src="https://use.fontawesome.com/releases/v5.6.1/js/all.js"></script>
            <script type="text/javascript" src="js/landing_page.js"></script>
            <!--- End of Script Source Files -->
        </body>
    </html>
