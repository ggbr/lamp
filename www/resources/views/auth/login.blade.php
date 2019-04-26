@extends('layouts.blank', [
    'title'=>'Login'
])

@section('PageStyleSheets')
@endsection

@section('PageScripts')
    <script type="text/javascript" src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jquery-validation/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/auth/login.js') }}"></script>
    @if ($errors->has('email'))
        @component('global.alert', ['title' => 'Usuário não encontrado', 'type' => 'error'])
            Por favor, verifique os dados informados e tente novamente
        @endcomponent
    @endif
    @if ($errors->has('password'))
        @component('global.alert', ['title'=>'Dados incorretos','type' => 'error', 'html' => "true"])
            <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
        @endcomponent
    @endif
@endsection

@section('PageContent')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form id="login-form" class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="{{ asset('images/logo/logo-averbweb.png') }}" alt="" class="responsive-img valign">
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">mail_outline</i>
                        <label for="email" class="center-align">Digite seu email</label>
                        <input id="email" name="email" type="text" data-error=".erroEmail" value="{{ old('email') }}">
                        <div class="erroEmail"></div>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-5">lock_outline</i>
                        <label for="password">Digite sua senhaa</label>
                        <input id="password" name="password" type="password" class="validate" data-error=".erroSenha" required>
                        <div class="erroSenha"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-3">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <label for="remember">Manter senha salva</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12 gradient-45deg-indigo-blue">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  ml-2 mt-3 offset-s12 offset-m12 offset-l12">
                        <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Esqueceu sua senha?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
