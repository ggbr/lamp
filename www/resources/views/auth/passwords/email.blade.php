@extends('layouts.blank', [
    'title'=>'Recuperar senha'
])

@section('PageStyleSheets')
<script>
    $(document).ready(function() {
        Materialize.updateTextFields();
    });
</script>
@endsection

@section('PageScripts')
    <script type="text/javascript" src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jquery-validation/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/auth/forgot-password.js') }}"></script>
    @if ($errors->has('email'))
        @component('global.alert', ['title' => 'Usuário não encontrado', 'type' => 'error'])
            Por favor, verifique os dados informados e tente novamente
        @endcomponent
    @endif
    @if (session('status'))
        @component('global.alert', ['title' => 'Email enviado', 'type' => 'success'])
            O email para redefinição de senha foi enviado!
        @endcomponent
    @endif
@endsection

@section('PageContent')
<div id="forgot-password-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form id="forgot-password-form" class="login-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="{{ asset('images/logo/logo-averbweb.png') }}" alt="Logo {{ config('app.name') }}" class="responsive-img valign">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Recuperar conta</h4>
                    <p class="center">Você pode redefinir sua senha</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">email</i>
                    <label for="email" class="center-align">Digite seu email</label>
                    <input id="email" name="email" type="text" data-error=".erroEmail" value="{{ old('email') }}" required>
                    <div class="erroEmail"></div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12 gradient-45deg-indigo-blue"> Recuperar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
