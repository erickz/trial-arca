@extends('templates.default')

@section('titlePage', 'Login to access the administration panel')

@section('content')
    <div class="row">
        <div class='row justify-content-md-center'>
            <form action="{{ route('login.doLogin') }}" method="POST" class="col-12">
                @csrf

                <h4 class="text-center mb-3">Please login to access the administration panel</h4>
                
                @if ($errors->has('email') || $errors->has('password') || $errors->has('authentication'))
                    <div class="alert alert-warning">
                        {!! $errors->has('email') ? $errors->first('email') . "<br />" : ''  !!}
                        {!! $errors->has('password') ? $errors->first('password') . "<br />" : ''  !!}
                        {!! $errors->has('authentication') ? $errors->first('authentication') : ''  !!}
                    </div>
                @endif

                <div class="mb-3 mt-5">
                    <label for="exampleFormControlInput1" class="form-label"><b>Email:</b></label>
                    <input type="email" required class="form-control" name="email" id="exampleFormControlInput1" value="{{ old('email') }}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Password:</b></label>
                    <input type="password" required class="form-control" name="password" id="exampleFormControlInput1" placeholder="">
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
