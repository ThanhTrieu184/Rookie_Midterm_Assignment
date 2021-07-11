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
                <a class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/about">About</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/cart">Cart(0)</a>
            </li>    
        </ul>
  </div>  
</nav>

<div class="container" style="margin-top:80px; font-size: 16px;">
    <div class="row mb-5">
        <div class="col-lg-12 mb-3">
            <h3><strong>About us</strong></h3>
            <hr>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-10 shadow">
            <h1 class="text-center mb-5"><strong class="filter-item">Welcome to Boookworm</strong></h1>
            <p>"Bookworm is an independent New York bookstore and language school with locations in Mahattan and Brooklyn.
                We specialize in travel books and language classes."
            </p>

            <div class="row mt-5">
                <div class="col-lg-6 ">
                    <h3><strong class="filter-item">Our story</strong></h3> 
                    <p>The name Bookworm was taken from the original name for New York International Airport
                        Which was renamed JFK in December 1963.
                    </p>
                    <p>Our Mahattan store has just moved to the West Village. Our new location is 170 7th Avenue
                        South at the corner of Perry Street.
                    </p>
                    <p>
                        From March 2008 through May 2016, the store was located in the Flatiron District.
                    </p>
                </div>
                <div class="col-lg-6 ">
                    <h3><strong class="filter-item">Our vision</strong></h3> 
                    <p>One of the last travel bookstoresin the country, our Mahattan store carries a range of 
                        guidebooks (all 10% off) to suit the needs and tastes of every traveller and budget.
                    </p>
                    <p>
                        We believe that a novel or travelogue can be just a valuable a key to a place as any guidebook,
                         and our well-read, well-travelled staff is happy to make reading recommendations for any traveller, 
                         book lover or gift giver.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>

    </div>
</div>

<div class="text-left bg-light mt-auto py-5 px-3">
    <a class="navbar-brand" href="#">
        <img src="bookworm_icon.svg" alt="icon" width="100%">
    </a>
</div>

</body>
</html>
