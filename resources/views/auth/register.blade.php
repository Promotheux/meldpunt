@extends('layouts.app')

@section('pageTitle') Registreren
@endsection

@section('bodyClass')
    login
@endsection

@section('content')
<div class="bg-wrapper">
    <div class="container">
        <div class="row">
            <form class="col s12" id="reg-form" method="POST" action="{{ route('register') }}">
                @csrf
            <div class="input-field col s12">
                <input id="name" name="name" type="text" class="validate">
                <label for="name">Naam</label>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-field col s12">
                <input id="email" name="email" type="text" class="validate">
                <label for="email">E-mailadres</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate" min-length="6">
                <label for="password">Wachtwoord</label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-field col s6 offset-s6">
                <button class="btn btn-large btn-register waves-effect waves-light" type="submit">
                    Registreer <i class="material-icons right">done</i>
                </button>
            </div>
            </form>
        </div>
        <a title="Login" class="ngl btn-floating btn-large waves-effect waves-light blue" href="/login"><i class="material-icons">input</i></a>
    </div>
</div>
@endsection
