@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome!!!

                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="col-lg-3" id="selltoany">
            <div class="card">
                <div class="card-header">Sell To Any</div>

                <div class="card-body"></div>
            </div>

        </div>
        <div class="col-lg-3" id="buyfromany">

            <div class="card">
                <div class="card-header">Buy From Any</div>

                <div class="card-body">

                </div>
            </div>

        </div>
        <div class="col-lg-3" id="sellerdeal">
            <div class="card">
                <div class="card-header">Seller Deal</div>

                <div class="card-body">

                </div>
            </div>

        </div>
        <div class="col-lg-3" id="visitoroffer">

            <div class="card">
                <div class="card-header">Visitor Offer</div>

                <div class="card-body">
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection
