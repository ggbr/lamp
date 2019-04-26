@extends('layouts.blank',[
    'title' => "Redefinição de senha"
])

@section('PageScripts')
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
<div id="set-new-passsword-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form id="set-new-password-form" class="login-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="{{ asset('images/logo/logo-averbweb.png') }}" alt="" class="responsive-img valign">
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12 center">
                    <h4>Nova Senha</h4>
                    <p class="center">Redefinindo senha</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">mail_outline</i>
                    <input id="email" type="email" class="validate" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password" data-error="Senha já existente" data-success="Senha Válida">Nova senha</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input id="password" type="password" class="validate" name="password_confirmation" required>
                    <label for="password" data-error="Senha Incorreta" data-success="Senha Correta">Confirmar nova senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12 gradient-45deg-indigo-blue">Confirmar</button><br><br>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
