@extends('layouts.main_layout')

@section('title', 'About us')

@section('about', 'active h5')


@section('content')

    <div class="container" style="margin-top:80px; font-size: 16px;">
        <div class="row mb-5">
            <div class="col-lg-12 mb-3">
                <h3><strong>About us</strong></h3>
                <hr>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10 shadow">
                <h1 class="text-center my-5"><strong class="filter-item">Welcome to Boookworm</strong></h1>
                <p>"Bookworm is an independent New York bookstore and language school with locations in Mahattan and
                    Brooklyn.
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
                            We believe that a novel or travelogue can be just a valuable a key to a place as any
                            guidebook,
                            and our well-read, well-travelled staff is happy to make reading recommendations for any
                            traveller,
                            book lover or gift giver.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
@endsection
