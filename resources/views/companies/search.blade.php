@extends('templates.default')

@section('titlePage', 'Find your business here')

@section('content')
    <div class="row">
        <div class='row justify-content-md-center'>
            <form action="{{ route('companies.index') }}" method="GET" class="col-12">
                
                @if (request()->has('q') && empty(request()->input('q')))
                    <div class="alert alert-warning }}">
                        <i class="fas fa-exclamation-circle"></i> Please provide a text to search for the company's name
                    </div>          
                @endif

                <div class="form-group">
                    &nbsp;
                    <div class="input-group">
                        <input type="text" required class="form-control" name="q" placeholder="What are you looking for?" value="{{ old('q') ? old('q') : $termSearched }}">
                        <input type="submit" value="Search" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>

        @include('companies.list')
    </div><!-- -->
@endsection
