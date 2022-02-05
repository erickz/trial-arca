@extends('templates.default')

@section('titlePage', 'Busque o seu negocio')

@section('content')
    &nbsp;
    <h1 class='text-center'>Business finder</h1>
    <div class="col-md-12">
        &nbsp;

        <div class="">
            
            
        </div>

        &nbsp;

        @if($companies)
            <table class="table" id="listUrls">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Original URL</th>
                        <th>Shortened URL</th>
                        <th>NSFW</th>
                        <th>Number of access</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        @endif
    </div><!-- -->
@endsection
