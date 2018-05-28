@extends('layouts.auth')

@section('content')
<div class="middle-box text-center loginColumns animated fadeInDown ">

    <div class="col-md-12">

        <div class="ibox-content">
            <div>

                <h1 class="logo-name">{{ config('app.name', 'Laravel') }}</h1>

            </div>           
            
            <p>Login in.</p>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif            
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="{{ __('app.mail') }}" required name="email" value="admin@admin.com">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="{{ __('app.contraseña') }}" required name="password" value="secret">
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">{{ __('app.login') }}</button>
                <a href="#"><small>{{ __('app.olvido_contraseña') }}</small></a>

            </form>
            <p class="m-t"> <small>{{__('app.welcome_login')}} {{ config('app.name', 'Laravel') }}</small> </p>
        </div>
    </div>
</div>
@endsection