<nav id="horizontal-nav" class="white hide-on-med-and-down">
        <div class="nav-wrapper">
            <ul id="ul-horizontal-nav" class="left hide-on-med-and-down">
                <li>
                    <a class="dropdown-menu" href="#!" data-activates="administrativoSubMenu">
                        <i class="material-icons">dashboard</i>
                        <span>
                            Administrativo
                            <i class="material-icons right">keyboard_arrow_down</i>
                        </span>
                    </a>
                    {{-- administrativoSubMenu --}}
                    <ul id="administrativoSubMenu" class="dropdown-content dropdown-horizontal-list">
                        <li>
                            <a href="{{ url('/admin/corretores') }}">
                                Corretores
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/embarcadores') }}">
                                Embarcadores
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/financeiro') }}">
                                Financeiro
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/seguradoras') }}">
                                Seguradoras
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/transportadoras') }}">
                                Transportadora
                            </a>
                        </li>
                    </ul>
                    {{-- FIM administrativoSubMenu --}}
                </li>
                <li>
                    <a href="{{ url('/admin/uploadTn') }}">
                        <i class="material-icons prefix">file_upload</i>
                        <span>Upload RCTR-C/TN</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/uploadDc') }}">
                        <i class="material-icons prefix">file_upload</i>
                        <span>Upload RCF/DC</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/listTn') }}">
                        <i class="material-icons prefix">file_upload</i>
                        <span>Verificação RCTR-C/TN</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/listDc') }}">
                        <i class="material-icons prefix">file_upload</i>
                        <span>Verificação RCF/DC</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
