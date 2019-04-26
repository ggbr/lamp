<aside id="left-sidebar-nav hide-on-large-only">
    <ul id="slide-out" class="side-nav leftside-navigation">
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan">
                        <i class="material-icons">dashboard</i>
                        <span>Administrativo</span>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="{{ url('/admin/corretores') }}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Corretores</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/embarcadores') }}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Embarcadores</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/financeiro') }}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Financeiro</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/seguradoras') }}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Seguradoras</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/transportadoras') }}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span>Transportadoras</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold">
                    <a href="{{ url('/admin/usuarios') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">group</i>
                        <span>Usuários</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{ url('/admin/configuracoes') }}" class="waves-effect waves-cyan">
                        <i class="material-icons">settings</i>
                        <span>Configurações</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out"  style="position:fixed" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only transparent">
            <i class="material-icons">menu</i>
        </a>
</aside>
