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
  {{-- <script src="js/app.js"></script> --}}
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
                <a class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/cart">Cart (0)</a>
            </li>    
        </ul>
  </div>  
</nav>

<div class="container" style="margin-top:80px; font-size: 16px;">
    <div class="row">
        <div class="col-lg-12">
            <h3><strong>Category Name</strong></h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="bookcover/book1.jpg" class="card-img" alt="...">
                        <p class="card-text mb-5 text-center mt-3"><i class="text-muted"><small>By author: </small></i> <strong>Anna bella</strong></p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold h3 pl-5">Book Name</h5>
                            <div class="pl-3 card-text">
                                <p class="">This is a wider card with supporting text below as a natural lead-in to additional content.
                                    This content is a little bit longer.
                                </p>
                                <p class="">This is a wider card with supporting text below as a natural lead-in to additional content.
                                    This content is a little bit longer.
                                </p>
                                <p class="">This is a wider card with supporting text below as a natural lead-in to additional content.
                                    This content is a little bit longer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="m-3">
                    <p><strong class="h3 font-weight-bold">Customer Reviews</strong><i> (Filtered by 5 star)</i></p>
                </div>
                <div class="mx-3">
                    <p><strong class="h2 font-weight-bold">4.6 <i class="fas fa-star "></i></strong></p>
                    <p><small class="mr-5"><i>3,124 reviews</i></small><small><u>5 star</u> (<u>200</u>) 
                        | <u>4 star</u> (<u>100</u>) | <u>3 star</u> (<u>150</u>) 
                        | <u>2 star</u> (<u>10</u>) | <u>1 star</u> (<u>0</u>)</small></p>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-lg-6">
                        <small class="ml-3"><i>Showing 1 to 10 out of 100 books</i></small>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="row">
                            <div class="col-lg-6 dropdown">
                                <button class="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by date: newest to oldest
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item " href="#">Sort by date: newest to oldest</a>
                                    <a class="dropdown-item" href="#">Sort by date: oldest to newest</a>
                                </div>
                            </div>
                            <div class="dropdown col-lg-6">
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
                {{-- <hr class="mb-5 mx-3"> --}}
                <!-- Main wrapper -->
                <div class="comments-list text-center text-md-left">
                    <div class="row mx-3">
                        <!-- Content column -->
                        <div class="col-sm-12 col-12">
                            <p><strong class="h4 font-weight-bold">Review Title </strong>| 5 <i class="fas fa-star"></i></p>
                            <!-- Rating -->
                            <div class="card-data">
                
                            
                
                                <p class="text-gray article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis
                        
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur
                        
                                    sint occaecat cupidatat non proident.
                                </p>
                                <p class="float-right"><small><i class="fa fa-clock"></i> 05/10/2015</small></p>
                            </div>
                        </div>
                        <!-- Content column -->
                    </div>
                    <hr class="mx-3">

                    <div class="row mx-3">
                        <!-- Content column -->
                        <div class="col-sm-12 col-12">
                            <p><strong class="h4 font-weight-bold">Review Title </strong>| 5 <i class="fas fa-star"></i></p>
                            <!-- Rating -->
                            <div class="card-data">
                
                            
                
                                <p class="dark-grey-text article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis
                        
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur
                        
                                    sint occaecat cupidatat non proident.
                                </p>
                                <p class="float-right"><small><i class="fa fa-clock"></i> 05/10/2015</small></p>
                            </div>
                        </div>
                        <!-- Content column -->
                    </div>
                    <hr class="mx-3">
                    <div class="row mx-3">
                        <!-- Content column -->
                        <div class="col-sm-12 col-12">
                            <p><strong class="h4 font-weight-bold">Review Title </strong>| 5 <i class="fas fa-star"></i></p>
                            <!-- Rating -->
                            <div class="card-data">
                                <p class="dark-grey-text article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis
                        
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur
                        
                                    sint occaecat cupidatat non proident.
                                </p>
                                <p class="float-right"><small><i class="fa fa-clock"></i> 05/10/2015</small></p>
                            </div>
                        </div>
                        <!-- Content column -->
                    </div>
                    <hr class="mx-3">
                </div>
                <!-- Main wrapper -->
            </div>
            <div class="row justify-content-center my-4">
                <!-- Pagination -->
                <nav class="mb-4">
                    <ul class="pagination pagination-circle mb-0">

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
                        <li class="page-item clearfix d-none d-md-block">
                            <a class="page-link waves-effect waves-effect">Last</a>
                        </li>
                    </ul>
                </nav>
                <!-- Pagination -->
            </div>
        </div>
        
            
        <div class="col-lg-4">
            <div class="row mb-3">
                <div class="card col-lg-12">
                    {{-- <form action="{{ route('cart.add') }}" method="post">
                        @csrf --}}
                        <div class="card-header text-center font-weight-bold shadow">Price</div>
                        <div class="card-body ">
                            <div class="row text-left">
                                <i >Quantity</i>
                            </div>
                            {{-- <input type="number" value="1" name="id"> --}}
                            <div class="row text-center">
                                <input class="col-lg-8 col-sm-12 text-center" type="number" id="number" value="1" min="1" max="8" name="quantity"/>
                                <button class="col-lg-2 col-sm-6 btn  px-3" id="decrease" onclick="decreaseValue()" ><i class="fa fa-minus" aria-hidden="true"></i></button>
                                <button class="col-lg-2 col-sm-6 btn  px-3" id="increase" onclick="increaseValue()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="subit" class="btn theme-color my-3 border btn-block">Add to cart</button>
                        </div>
                    {{-- </form> --}}
                    <script>
                        function increaseValue() {
                            var value = parseInt(document.getElementById('number').value, 10);
                            if(isNaN(value)) {
                                value = 1;
                            }
                            else if(value >= 8) {
                                value = 8;
                            }
                            else {
                                value++;
                            }
                           
                            document.getElementById('number').value = value;
                        }
                        
                        function decreaseValue() {
                            var value = parseInt(document.getElementById('number').value, 10);
                            if(isNaN(value)) {
                                value = 1;
                            }
                            else if(value <= 1) {
                                value = 1;
                            }
                            else {
                                value--;
                            }
                           
                            document.getElementById('number').value = value;
                        }
                    </script>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-12 card">
                    <div class="card-header text-center font-weight-bold shadow">Write a review</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                              <label for="title-review"><small>Add a title</small></label>
                              <input type="text" class="form-control" id="title-review"  placeholder="Enter title">
                            </div>
                            <div class="form-group">
                              <label for="detail-review"><small>Details please! Your review help other shoppers</small></label>
                              <input type="text" class="form-control" id="detail-review" placeholder="Detail review">
                            </div>
                            <div class="form-group">
                                <label for="rating-review"><small>Select a rating star</small></label>
                                <select class="form-control" id="rating-review">
                                    <option>5 star</option>
                                    <option>4 star</option>
                                    <option>3 star</option>
                                    <option>2 star</option>
                                    <option>1 star</option>
                                </select>
                              </div>
                            <div class="text-center">
                                <button class="btn theme-color my-3 border btn-block" type="submit">Submit Review</button>
                            </div>
                            
                          </form>
                        
                    </div>
                </div>
            </div>
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
