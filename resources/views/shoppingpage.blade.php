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
<body>

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
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/shop">Shop</a>
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

<div class="container" style="margin-top:80px; font-size: 16px;">
    <div class="row">
        <div class="col-lg-12">
            <p><strong class="h3 font-weight-bold">Books</strong><i> (Filtered by )</i></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-2"><p class=" h3 font-weight-bold">Filter By </p></div>
        <div class="col-lg-3">
            <i>Showing 1 to 10 out of 100 books</i>
        </div>
        <div class="col-lg-7 text-right">
            <div class="row">
                <div class=" col-lg-10 dropdown">
                    <button class="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by on sale</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item " href="#">Sort by on sale</a>
                        <a class="dropdown-item" href="#">Sort by popularity</a>
                        <a class="dropdown-item" href="#">Sort by price: low to high</a>
                        <a class="dropdown-item" href="#">Sort by price: high to low</a>
                    </div>
                </div>
                <div class="dropdown col-lg-2">
                    <button class="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Show 20
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Show 5</a>
                        <a class="dropdown-item" href="#">Show 15</a>
                        <a class="dropdown-item" href="#">Show 20</a>
                        <a class="dropdown-item" href="#">Show 25</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2">
            <div class="row">
                <div class="col-md-6 col-lg-12 mb-3 border rounded">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title font-weight-bold" data-toggle="collapse" href="#collapse1">
                                    Category
                                </h5>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="list-group">
                                    <div class="divider"><hr></div>

                                    <p class="filter-item"><a>Default</a></p>

                                    <p class="filter-item"><a>Popularity</a></p>

                                    <p class="filter-item"><a>Average rating</a></p>

                                    <p class="filter-item"><a>Price: low to high</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter by category -->
                <div class="col-md-6 col-lg-12 mb-3 border rounded">

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title font-weight-bold" data-toggle="collapse" href="#collapse2">
                                    Author
                                </h5>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="list-group">
                                    <div class="divider"><hr></div>

                                    <p class="filter-item"><a>Default</a></p>

                                    <p class="filter-item"><a>Popularity</a></p>

                                    <p class="filter-item"><a>Average rating</a></p>

                                    <p class="filter-item"><a>Price: low to high</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Filter by category -->
            </div>
                
            <div class="row">
                <div class="col-md-6 col-lg-12 mb-3 border rounded">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title font-weight-bold" data-toggle="collapse" href="#collapse3">
                                    Rating Review
                                </h5>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="list-group">
                                    <div class="divider"><hr></div>

                                    <div class="row mb-3 filter-item">
                                        <div class="col-4">5 <i class="fas fa-star "></i></div>
                                        <div class="col-8 text-right"><i class="badge theme-color">10</i></div>
                                    </div>
            
                                    <div class="row mb-3 filter-item">
                                        <div class="col-4">4 <i class="fas fa-star "></i></div>
                                        <div class="col-8 text-right"><i class="badge theme-color">35</i></div>
                                    </div>
            
                                    <div class="row mb-3 filter-item">
                                        <div class="col-4">3 <i class="fas fa-star "></i></div>
                                        <div class="col-8 text-right"><i class="badge theme-color">52</i></div>
                                    </div>
                                    <div class="row mb-3 filter-item">
                                        <div class="col-4">2 <i class="fas fa-star "></i></div>
                                        <div class="col-8 text-right"><i class="badge theme-color">101</i></div>
                                    </div>
                                    <div class="row mb-3 filter-item">
                                        <div class="col-4">1 <i class="fas fa-star "></i></div>
                                        <div class="col-8 text-right"><i class="badge theme-color">98</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- Sidebar -->

      <!-- Content -->
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Book name</a></strong></h5>
                            <span class="badge badge-warning">Author</span>
                            
                        </div>
                        <div class="card-footer">
                            <span class="float-left"><strong>Price</strong></span>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card card-ecommerce">
                        <div class="view overlay">
                            <img src="book1.jpg" class="img-fluid"
                                alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
                                class="badge badge-danger mb-2">bestseller</span>
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left"><strong>1439$</strong></span>

                                    <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                                            class="fas fa-shopping-cart ml-3"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        
            <div class="row justify-content-center mb-4">
                <!-- Pagination -->
                <nav class="mb-4">
                    <ul class="pagination pagination-circle pg-blue mb-0">

                        <!-- First -->
                        <li class="page-item disabled clearfix d-none d-md-block"><a
                            class="page-link waves-effect waves-effect">First</a></li>

                        <!-- Arrow left -->
                        <li class="page-item disabled">

                        <a class="page-link waves-effect waves-effect" aria-label="Previous">

                            <span aria-hidden="true">«</span>

                            <span class="sr-only">Previous</span>

                        </a>

                        </li>

                        <!-- Numbers -->
                        <li class="page-item active"><a class="page-link waves-effect waves-effect">1</a></li>

                        <li class="page-item"><a class="page-link waves-effect waves-effect">2</a></li>

                        <li class="page-item"><a class="page-link waves-effect waves-effect">3</a></li>

                        <li class="page-item"><a class="page-link waves-effect waves-effect">4</a></li>

                        <li class="page-item"><a class="page-link waves-effect waves-effect">5</a></li>

                        <!-- Arrow right -->
                        <li class="page-item">

                        <a class="page-link waves-effect waves-effect" aria-label="Next">

                            <span aria-hidden="true">»</span>

                            <span class="sr-only">Next</span>

                        </a>

                        </li>

                        <!-- First -->
                        <li class="page-item clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">Last</a>

                        </li>

                    </ul>

                </nav>
                <!-- Pagination -->
            </div>
        </div>
      <!-- Content -->
    </div>
        
</div>

<div class="jumbotron text-left bg-light mb-0 mt-5">
    <a class="navbar-brand" href="#">
        <img src="bookworm_icon.svg" alt="icon" width="100%">
    </a>
</div>

</body>
</html>
