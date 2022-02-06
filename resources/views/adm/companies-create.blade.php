@extends('templates.adm')

@section('titlePage', 'Add a new company')

@section('content')
    <div class="row">
        <div class="position-relative">
            <h1>Add a new company</h1>
            <button type="button" class="position-absolute top-0 end-0 btn btn-info"><a href="{{ route('adm.companies.index') }}" class='text-decoration-none text-dark'>Back to listing</a></button>
        </div>
        
        <div class='row'>
            <form action="{{ route('adm.companies.store') }}" method="POST" class="col-9">
                @csrf

                <div class="col-md-6 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Name</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first("name") }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Categories</label>
                    <div class="input-group has-validation">
                        <select id="slCategories" name='categories[]' class='form-select form-control' multiple placeholder='Select the categories'>
                            @foreach( $categories as $category )
                                <option value='{{ $category->id }}' {{ old('categories') && is_array(old('categories')) ? (in_array($category->id, old('categories')) ? 'selected="selected"' : '') : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('categories'))
                            <div class="invalid-feedback">
                                {{ $errors->first("state") }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Phone</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" maxlength="16" value="{{ old('phone') }}" required>

                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first("phone") }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Address</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first("address") }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Zipcode</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" name="zipcode" maxlength="10" value="{{ old('zipcode') }}" required>
                        
                        @if($errors->has('zipcode'))
                            <div class="invalid-feedback">
                                {{ $errors->first("zipcode") }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-2 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">City</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                        @if($errors->has('city'))
                            <div class="invalid-feedback">
                                {{ $errors->first("city") }}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-md-4 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">State</label>
                    <div class="input-group has-validation">
                        <select name='state' class='form-select form-control {{ $errors->has('state') ? 'is-invalid' : '' }}'>
                            <option value='n'>Select a State</option>
                            @foreach( config()->get('constants.states') as $state )
                                <option value='{{ $state }}'  {{ old('state') == $state ? 'selected="selected"' : '' }} >{{ strtoupper($state) }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('state'))
                            <div class="invalid-feedback">
                                {{ $errors->first("state") }}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-md-6 form-group mt-2">
                    <label for="validationServerUsername" class="form-label">Description</label>
                    <div class="input-group has-validation">
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>

                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first("description") }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 form-group mt-2">
                    <div class="input-group">    
                        <input type="submit" value="Save" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>
    </div><!-- -->
@endsection
