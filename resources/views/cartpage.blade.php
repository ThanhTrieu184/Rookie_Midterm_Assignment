@extends('layouts.main_layout')

@section('title', 'Cart')

@section('cart', 'active h5')

@section('content')

    <div class="container" style="margin-top:80px; font-size: 16px;">
        <div class="row mb-5">
            <div class="col-lg-12">
                <h3><strong>Your cart: 0 items</strong></h3>
                <hr>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <tr class="text-center card-header">
                                <th class="cart-img"></th>
                                <th class="font-weight-bold">
                                    <strong>Book Title</strong>
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
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $book)
                                        <tr class="text-center">
                                            <td>
                                                <a><img src="{{ 'bookcover/'.$book['book_cover_photo'].'.jpg' }}" alt=""
                                                        class="img-fluid mx-auto d-block"></a>
                                            </td>
                                            <td>
                                                <p class="h6">{{ $book['book_title'] }}</p>
                                            </td>
                                            <td>${{ $book['book_price'] }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <button class="btn float-left" id="decrease"
                                                            onclick="decreaseValue('{{ 'number' . $book['book_id'] }}')"><i
                                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input class="w-100 text-center" type="number"
                                                            id="{{ 'number' . $book['book_id'] }}" value="1" min="0" max="8"
                                                            disabled />
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <button class="btn float-right" id="increase"
                                                            onclick="increaseValue('{{ 'number' . $book['book_id'] }}')"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <strong>${{ $book['book_price'] }}</strong>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <script>
                            function increaseValue($id) {
                                var value = parseInt(document.getElementById($id).value, 10);
                                if (isNaN(value)) {
                                    value = 1;
                                } else if (value >= 8) {
                                    value = 8;
                                } else {
                                    value++;
                                }

                                document.getElementById($id).value = value;
                            }

                            function decreaseValue($id) {
                                var value = parseInt(document.getElementById($id).value, 10);
                                if (isNaN(value)) {
                                    value = 1;
                                } else if (value <= 1) {
                                    value = 1;
                                } else {
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
@endsection
