@extends('templates.adm')

@section('titlePage', 'List of Companies')

@section('content')
    <div class="row">
        @if($companies)
            <div class="col-12">
                &nbsp;
                <div class="mb-5 position-relative">
                    <h4><b>Total:</b> {{ $total }} records</h2>
                    <button type="button" class="position-absolute top-0 end-0 btn btn-info"><a href="{{ route('adm.companies.create') }}" class='text-decoration-none text-dark'>Add company</a></button>
                </div>
                
                @foreach($companies as $company)
                    <div class="row mt-3 mb-3">
                        <div class="col-6">
                            <h5><a href="{{ route('adm.companies.edit', [$company->id]) }}">{{ $company->name }}</a></h4>
                            <span>in {{ $company->listCategories() }} </span>
                        </div>
                    </div>
                @endforeach

                <div class="mt-5 col-6">
                    {{ $companies->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div><!-- -->
@endsection
