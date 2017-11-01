<!--
    resources/views/users/login.blade.php
    view de la page de connexion
-->

@extends('templates.default')

@section('contenu')
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Connexion</h1>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="container">
                @if(Session::has('alert_error'))
                <div class="alert_error">
                    {{Session::get('alert_error')}}
                </div>
                @endif
            </div>
            <div class="container">
                @if(Session::has('alert_success'))
                <div class="alert_success">
                    {{Session::get('alert_success')}}
                </div>
                @endif
            </div>
            <div class="col-sm-12">
                {{Form::open(array('url' => 'connexion'))}}
                {{ csrf_field() }}
                <h2>Connexion</h2>
                <p>
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', old('email'))}}
                </p>
                @if($errors->has('email'))
                <p class = "error">{{$errors->first('email')}}</p>
                @endif
                <p>
                    {{Form::label('password', 'Mot de passe')}}
                    {{Form::password('password')}}
                </p>
                @if($errors->has('password'))
                <p class = "error">{{$errors->first('password')}}</p>
                @endif

                <p>
                    {{Form::submit('Se connecter')}}
                </p>

                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop