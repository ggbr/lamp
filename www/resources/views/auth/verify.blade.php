@extends('layouts.blank', [
    'title' => 'Usuário não verificado'
])

@section('PageScripts')
    @if(session('resent'))
        @component('global.alert', ['title' => 'Email enviado', 'type' => 'success'])
        Um novo link de confirmação foi enviado!
        @endcomponent
    @endif
@endsection

@section('PageContent')
<div id="card-alert" class="card teal lighten-5">
    <div class="card-content teal-text darken-1">
        <span class="card-title teal-text darken-1">Usuário não verificado</span>
        <p>Antes de proceder com o acesso ao sistema, por favor confirme seu email através do link enviado.</p>
        <p>Caso não tenha recebido, ou o link expirou clique abaixo para reenviar a confirmação.</p>
    </div>
    <div class="card-action teal lighten-4">
        <a href="{{ route('verification.resend') }}" class="teal-text">Reenviar link</a>
        <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="teal-text">
            Cancelar
        </a>
    </div>
    <button type="button" class="close teal-text" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endsection
@if (!Auth::guest())
<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
@endif
