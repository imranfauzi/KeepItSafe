@extends('/template/main')

@section('title','Welcome toKeepitSafe')


@section('container')
<div class="container">
<div class="jumbotron text-center mt-5">

    <h1>Welcome To KeepitSafe</h1>
    <p></p>
    <p>This is an official app by KopiHitam. Please have a look at our other projects :)</p>
    <p>Please report any bugs or problems you are having while using this app.</p>
    <p>

     @guest
        
        <a class="btn btn-primary btn-small" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
       
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-success btn-small" role="button">{{ __('Register') }}</a>
        @endif  
     @else 
     

     @endguest



    </p>
    </div>
</div>

@endsection
