@extends('templates.default')

@section('titlePage', 'Busque aqui o seu negocio')

@section('content')
    <h1>Business finder</h1>
    <div class="col-md-12">
        &nbsp;

        <div class="">
            <h3>Finder:</h3>
            
        </div>

        &nbsp;
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
    </div><!-- -->
@endsection
