@extends('templates.default')

@section('titlePage', 'Find your business here')

@section('content')
    <div class="row searchCompaniesView">
        <div class='row justify-content-md-center'>
            <form action="{{ route('companies.index') }}" method="GET" class="col-6">
                
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

        @if($companies)
            <div class="col-6">
                &nbsp;
                <h4 class="mb-5">{{ $totalSearch }} results for: "{{ $termSearched }}"</h2>
                
                @foreach($companies as $company)
                    <div class="row mt-3 mb-3">
                        <div class="col-6 offset-md-1">
                            <h5><a href="{{ route('companies.details', [$company->getSlug()]) }}">{{ $company->name }}</a></h4>
                            <span>in {{ $company->city }} -  {{ $company->state }}</span>
                            <div class="">

                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-5 col-6 offset-md-1">
                    {{ $companies->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div><!-- -->
@endsection
