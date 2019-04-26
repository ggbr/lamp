@extends('layouts.blank', [
    'title' => 'Registrar-se'
])
@section('PageScripts')
    @if ($errors->has('name'))
        @component('global.alert', ['type' => 'error'])
            {{ $errors->first('name') }}
        @endcomponent
    @endif
    @if ($errors->has('email'))
        @component('global.alert', ['type' => 'error'])
            {{ $errors->first('email') }}
        @endcomponent
    @endif
    @if ($errors->has('password'))
        @component('global.alert', ['type' => 'error'])
            {{ $errors->first('password') }}
        @endcomponent
    @endif
@endsection

@section('PageContent')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form"  method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Registrar</h4>
                    <p class="center">Cadastro de usuários</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">person_outline</i>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    <label for="name" class="center-align">Nome</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">email</i>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    <label for="email" class="center-align">Email</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password" type="password" name="password" required>
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                    <label for="password-confirm">Confirmar Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
