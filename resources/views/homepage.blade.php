@extends('layouts.main_layout')

@section('title', 'Homepage')

@section('home', 'active h5')

@section('content')
    <div class="container" style="margin-top:80px;font-size: 16px;">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="row mb-2">
                    <div class="col-lg-3">
                        <h3>On Sale</h3>
                    </div>
                    <div class="col-lg-9">
                        <button class="view-all-btn theme-color float-right"><span><a class="link-without-color" href="/shop">View All</a></span></button>
                    </div>
                </div>

                <div class="container">
                    <div class="row blog border">
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
                                                            <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title h6"><strong><a href=""
                                                                        class="book-title">Book Name</a></strong>
                                                            </p>
                                                            <i ><small>Author</small></i>
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
                                            @for ($i = 5; $i < 9; $i++)
                                                <div class="col-lg-3 col-md-12 my-3">
                                                    <div class="card h-100">
                                                        <div class="view overlay">
                                                            <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title h6"><strong><a href=""
                                                                        class="book-title">Book Name</a></strong>
                                                            </p>
                                                            <i ><small>Author</small></i>
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
                                            @for ($i = 7; $i < 11; $i++)
                                                <div class="col-lg-3 col-md-12 my-3">
                                                    <div class="card h-100">
                                                        <div class="view overlay">
                                                            <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title h6"><strong><a href=""
                                                                        class="book-title">Book Name</a></strong>
                                                            </p>
                                                            <i ><small>Author</small></i>
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
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Recommended</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Popular</a>
                        </div>
                    </nav>
                    <div class="container border">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @for ($i = 1; $i < 9; $i++)
                                                <div class="col-lg-3 col-md-12 mt-3 mb-3">
                                                    <div class="card h-100">
                                                        <div class="view overlay">
                                                            <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title h6"><strong><a href="{{ 'api/books/'.$i }}" class="book-title">Book Name</a></strong>
                                                            </p>
                                                            <i ><small>Author</small></i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <span class="float-left"><strong>Price</strong></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            @for ($i = 0; $i < 8; $i++)
                                                <div class="col-lg-3 col-md-12 mt-3 mb-3">
                                                    <div class="card h-100">
                                                        <div class="view overlay">
                                                            <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title"><strong><a href=""
                                                                        class="dark-grey-text">Book Name</a></strong>
                                                            </h5>
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
@endsection
