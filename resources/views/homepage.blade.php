<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookWorm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="css/app.css">
  <style>
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
	<a class="navbar-brand" href="#">
        <img src="bookworm_icon.svg" alt="icon" width="70%">
    </a>
  	{{-- <a class="navbar-brand" href="#"><strong>BOOKWORM</strong></a> --}}
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    	<span class="navbar-toggler-icon"></span>
  	</button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/cart">Cart(0)</a>
            </li>    
        </ul>
  </div>  
</nav>

<div class="container" style="margin-top:80px;font-size: 16px;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="row mb-2">
                <div class="col-lg-3">
                    <h3>On Sale</h3>
                </div>
                <div class="col-lg-9">
                    <button class="view-all-btn theme-color float-right"><span>View All </span></button>
                </div>
            </div>
            
            <div class="container">
                <div class="row blog border" >
                    <div class="col-md-1 ">
                        <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                            <i class="fas fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <div id="blogCarousel" class="carousel slide carousel-dark" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="col-lg-3 col-md-12 my-3">
                                                <div class="card h-100">
                                                    <div class="view overlay">
                                                        <img src="bookcover/book1.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><a href="" class="dark-grey-text">Book Name</a></strong></h5>
                                                        <span class="badge badge-warning">Author</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-left"><strong>Price</strong></span>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                                <div class="carousel-item">
                                    <div class="row">
                                        @for ($i = 4; $i < 8; $i++)
                                        <div class="col-lg-3 col-md-12 my-3">
                                            <div class="card h-100">
                                                <div class="view overlay">
                                                    <img src="bookcover/book1.jpg" class="img-fluid" alt="">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong><a href="" class="dark-grey-text">Book Name</a></strong></h5>
                                                    <span class="badge badge-warning">Author</span>
                                                    
                                                </div>
                                                <div class="card-footer">
                                                    <span class="float-left"><strong>Price</strong></span>
                        
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                                <div class="carousel-item">
                                    <div class="row">
                                        @for ($i = 6; $i < 10; $i++)
                                        <div class="col-lg-3 col-md-12 my-3">
                                            <div class="card h-100">
                                                <div class="view overlay">
                                                    <img src="bookcover/book1.jpg" class="img-fluid" alt="">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong><a href="" class="dark-grey-text">Book Name</a></strong></h5>
                                                    <span class="badge badge-warning">Author</span>
                                                    
                                                </div>
                                                <div class="card-footer">
                                                    <span class="float-left"><strong>Price</strong></span>
                        
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                            </div>
                            <!--.carousel-inner-->
                        </div>
                        <!--.Carousel-->
                    </div>
                    <div class="col-md-1">
                        <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                            <i class="fas fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <br>
        
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-center">Featured Books</h2>
            <section id="tabs" class="project-tab">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Recommended</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Popular</a>
                    </div>
                </nav>
                <div class="container border">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        @for ($i = 0; $i < 8; $i++)
                                            <div class="col-lg-3 col-md-12 mt-3 mb-3">
                                                <div class="card h-100">
                                                    <div class="view overlay">
                                                        <img src="bookcover/book1.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><a href="" class="dark-grey-text">Book Name</a></strong></h5>
                                                        <span class="badge badge-warning">Author</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-left"><strong>Price</strong></span>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        @for ($i = 0; $i < 8; $i++)
                                            <div class="col-lg-3 col-md-12 mt-3 mb-3">
                                                <div class="card h-100">
                                                    <div class="view overlay">
                                                        <img src="bookcover/book1.jpg" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong><a href="" class="dark-grey-text">Book Name</a></strong></h5>
                                                        <span class="badge badge-warning">Author</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-left"><strong>Price</strong></span>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="text-left bg-light mt-auto py-5 px-3">
    <a class="navbar-brand" href="#">
        <img src="bookworm_icon.svg" alt="icon" width="100%">
    </a>
</div>
</body>
</html>
