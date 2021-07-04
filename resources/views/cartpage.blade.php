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
                <a class="nav-link " href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/about">About</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active" href="/cart">Cart(0)</a>
            </li>    
        </ul>
  </div>  
</nav>

<div class="container" style="margin-top:80px; font-size: 16px;">
    <div class="row">
        <div class="col-lg-12">
            <h3><strong>Your cart: 0 items</strong></h3>
            <hr>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <!-- Shopping Cart table -->
                <div class="table-responsive">
                    <table class="table">
                    <!-- Table head -->
                        <tr class="text-center card-header">
                            <th class="cart-img"></th>
                            <th class="font-weight-bold">
                                <strong>Product</strong>
                            </th>
                            <th class="font-weight-bold">
        
                                <strong>Price</strong>
        
                            </th>
        
                            <th class="font-weight-bold">
        
                                <strong>Quantity</strong>
        
                            </th>
        
                            <th class="font-weight-bold">
        
                                <strong>Total</strong>
        
                            </th>
                
                        </tr>
                        <!-- Table head -->
                            <!-- Table body -->
                        <tbody class="card-body">
                            <!-- First row -->
                            <tr class="text-center">
                                <td>
                                    <a><img src="book1.jpg" alt="" class="img-fluid mx-auto d-block"></a>
                                </td>
                                <td>
            
                                    <h5 class="mt-3">
            
                                    <strong>iPhone</strong>
            
                                    </h5>
            
                                    <p class="text-muted">Apple</p>
            
                                </td> 
                                <td>$800</td>
            
                                <td >
                                    <div class="row">
                                        <button class="col-lg-2 btn  px-3" id="decrease" onclick="decreaseValue('number1')" ><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input class="col-lg-8 text-center" type="number" id="number1" value="1" min="1" max="8" disabled/>
                                        <button class="col-lg-2 btn  px-3" id="increase" onclick="increaseValue('number1')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </td>
            
                                <td class="font-weight-bold">
            
                                    <strong>$800</strong>
            
                                </td>
            
                            </tr>
                            <!-- First row -->
        
                            <!-- Second row -->
                            <tr class="text-center">
                                <td>
                                    <a><img src="book1.jpg" alt=""class="img-fluid mx-auto d-block"></a>
                                </td>
                                <td>
            
                                    <h5 class="mt-3">
            
                                    <strong>Headphones</strong>
            
                                    </h5>
            
                                    <p class="text-muted">Sony</p>
            
                                </td>
            
                                <td>$200</td>
                                <td >
                                    <div class="row">
                                        <button class="col-lg-2 btn  px-3" id="decrease" onclick="decreaseValue('number2')" ><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input class="col-lg-8 text-center" type="number" id="number2" value="1" min="1" max="8" disabled/>
                                        <button class="col-lg-2 btn  px-3" id="increase" onclick="increaseValue('number2')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </td>
                                <td class="font-weight-bold">
            
                                    <strong>$600</strong>
            
                                </td>
                            </tr>
                            <!-- Second row -->
        
                            <!-- Third row -->
                            <tr class="text-center">
        
                                <td>
                                    <img src="book1.jpg" alt="" class="img-fluid mx-auto d-block">
                                </td>
                                <td>
            
                                    <h5 class="mt-3">
            
                                    <strong>iPad Pro</strong>
            
                                    </h5>
            
                                    <p class="text-muted">Apple</p>
            
                                </td>
            
                                <td>$600</td>
                                <td >
                                    <div class="row">
                                        <button class="col-lg-2 btn  px-3" id="decrease" onclick="decreaseValue('number3')" ><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input class="col-lg-8 text-center" type="number" id="number3" value="1" min="1" max="8" disabled/>
                                        <button class="col-lg-2 btn  px-3" id="increase" onclick="increaseValue('number3')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </td>
                                <td class="font-weight-bold">
                                    <strong>$1200</strong>
                                </td>
            
                            </tr>
                        </tbody>
                    </table>
                    <script>
                        function increaseValue($id) {
                            var value = parseInt(document.getElementById($id).value, 10);
                            if(isNaN(value)) {
                                value = 1;
                            }
                            else if(value >= 8) {
                                value = 8;
                            }
                            else {
                                value++;
                            }
                           
                            document.getElementById($id).value = value;
                        }
                        
                        function decreaseValue($id) {
                            var value = parseInt(document.getElementById($id).value, 10);
                            if(isNaN(value)) {
                                value = 1;
                            }
                            else if(value <= 1) {
                                value = 1;
                            }
                            else {
                                value--;
                            }
                           
                            document.getElementById($id).value = value;
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Cart Totals</div>
                <div class="card-body">
                    <h1>$100</h1>
                    <button class="btn theme-color mt-5 border btn-block"> Place order</button>
                </div>
                
            </div>
        </div>

    </div>
</div>

<div class="jumbotron text-left bg-light mb-0  mt-5">
    <a class="navbar-brand" href="#">
        <img src="bookworm_icon.svg" alt="icon" width="100%">
    </a>
</div>

</body>
</html>
