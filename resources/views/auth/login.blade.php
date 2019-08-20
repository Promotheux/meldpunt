@extends('layouts.app')

@section('pageTitle') Inloggen
@endsection

@section('bodyClass')
    login
@endsection

@section('content')
    <div class="bg-wrapper">
        <div class="container">
            <div class="row">
                <form class="col s12" id="reg-form" method="POST" action="{{ route('login') }}">
                    @csrf
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
                        <input id="password" type="password" name="password" class="validate" min-length="6">
                        <label for="password">Wachtwoord</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Onthoud mij</span>
                        </label>
                    </div>
                    <div class="input-field col s6">
                        <button class="btn btn-large btn-register waves-effect waves-light" type="submit">
                            Login <i class="material-icons right">done</i>
                        </button>
                    </div>
                </form>
            </div>
            <a title="Registreer" class="ngl btn-floating btn-large waves-effect waves-light blue" href="/register"><i class="material-icons">assignment_ind</i></a>
        </div>
    </div>
@endsection
