@extends('layouts/home_main')

@section('main')

<div class="col-md-8">

    @include('home.boxes')
    
</div>

<div class="col-md-4">

    @include('home.sidebar')

</div>


@endsection
