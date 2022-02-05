@extends('templates.default')

@section('titlePage', 'Login to access the administration panel')

@section('content')
    <div class="row loginView">
        <div class='row justify-content-md-center'>
            <form action="{{ route('login.doLogin') }}" method="POST" class="col-5">

                <h4 class="mb-5 text-center">Please login to access the administration panel</h4>
                
                @include('elements.alert')

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Username:</b></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Password:</b></label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    &nbsp;
                    <div class="input-group justify-content-md-center">
                        <input type="submit" value="Login" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div><!-- -->
@endsection
