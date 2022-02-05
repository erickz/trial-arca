@if (session()->has('type') && session()->has('message'))
    <div class="alert alert-{{ session()->get('type') == 'error' ? 'danger' : 'success' }}">
        {!! session()->get('message') !!}
    </div>          
@endif