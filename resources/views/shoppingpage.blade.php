@extends('layouts.main_layout')

@section('title', 'Shopping page')

@section('shop', 'active h5')

@section('content')
    <div class="container" style="margin-top:80px; font-size: 16px;">
        <div class="row">
            <div class="col-lg-12">
                <p><strong class="h3">Books</strong><i> (Filtered by )</i></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-2">
                <p class=" h3">Filter By </p>
            </div>
            <div class="col-lg-3">
                {{-- <i>Showing {{ $books->firstItem() }} to {{ $books->lastItem()}} out of {{ $books->total() }} books</i> --}}
                <i>Showing 1 - 10 out of 294 books</i>
            </div>
            <div class="col-lg-7 text-right">
                <div class="row">
                    <div class=" col-lg-10 dropdown">
                        <button class="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by on sale</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item " href="#">Sort by on sale</a>
                            <a class="dropdown-item" href="#">Sort by popularity</a>
                            <a class="dropdown-item" href="#">Sort by price: low to high</a>
                            <a class="dropdown-item" href="#">Sort by price: high to low</a>
                        </div>
                    </div>
                    <div class="dropdown col-lg-2">
                        <button class="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <p class="panel-title h6" data-toggle="collapse" href="#collapse1">
                                        Category
                                    </p>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="list-group">
                                        <div class="divider">
                                            <hr>
                                        </div>

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
                                    <p class="panel-title h6" data-toggle="collapse" href="#collapse2">
                                        Author
                                    </p>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="list-group">
                                        <div class="divider">
                                            <hr>
                                        </div>

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
                                    <p class="panel-title h6" data-toggle="collapse" href="#collapse3">
                                        Rating Review
                                    </p>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="list-group">
                                        <div class="divider">
                                            <hr>
                                        </div>

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
                    @for ($i = 1; $i < 9; $i++)
                        <div class="col-lg-3 col-md-12 mb-4">
                            <div class="card h-100">
                                <div class="view overlay">
                                    <img src="{{ 'bookcover/book'.$i.'.jpg' }}" class="img-fluid card-img-fit" alt="">
                                </div>
                                
                                <div class="card-body">
                                    <p class="card-title h6"><strong><a href="{{ url('cart/' . $i) }}"
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
                            <li class="page-item clearfix d-none d-md-block"><a
                                    class="page-link waves-effect waves-effect">Last</a>

                            </li>

                        </ul>

                    </nav>
                    <!-- Pagination -->

                </div>
                {{-- <div class="row justify-content-center mb-4">
                {{ $books->links() }}
            </div> --}}
            </div>
            <!-- Content -->
        </div>
    </div>
@endsection

