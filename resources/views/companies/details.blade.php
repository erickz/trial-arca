@extends('templates.default')

@section('titlePage', 'Find your business here')

@section('content')
    <div class="row">
        <h1>{{ $company->name }}</h1>
        <span>in {{ $company->city }} -  {{ $company->state }}</span>
        
        <div class="row mt-3">
            <h2>About</h2>
            <span class="d-block"><b>Description:</b> {{ $company->description }}</span>
            <span class="d-block"><b>Address:</b> {{ $company->address }}, {{ $company->city }} - {{ $company->state }}, {{ $company->zipcode }} </span>
            <span class="d-block"><b>Phone:</b> {{ $company->phone }}</span>
        </div>
    </div><!-- -->
@endsection
