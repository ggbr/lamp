<ul id="user-dropdown" class="dropdown-content"  >
    <li>
        <a href="{{ url('/admin/configuracoes') }}" class="grey-text text-darken-1">
        <i class="material-icons">settings</i> Configurações</a>
    </li>
    <li>
        <a href="#!" class="grey-text text-darken-1">
        <i class="material-icons">edit</i> Meus dados</a>
    </li>
    <li>
        <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="grey-text text-darken-1">
            <i class="material-icons">exit_to_app</i> Sair
        </a>
    </li>
</ul>

@if (!Auth::guest())
<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
@endif
