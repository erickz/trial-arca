@if($companies)
    <div class="col-12">
        &nbsp;
        <h4 class="mb-5">{{ $totalSearch }} results for: "{{ $termSearched }}"</h2>
        
        @foreach($companies as $company)
            <div class="row mt-3 mb-3">
                <div class="col-6">
                    <h5><a href="{{ route('companies.details', [$company->slug]) }}">{{ $company->name }}</a></h4>
                    <span>in {{ $company->listCategories() }} </span>
                </div>
            </div>
        @endforeach

        <div class="mt-5 col-6">
            {{ $companies->withQueryString()->links() }}
        </div>
    </div>
@endif