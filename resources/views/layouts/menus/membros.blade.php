<li>
    <input id="group-membros" type="checkbox" hidden />
    <label for="group-membros">
        <span class="seta fa fa-angle-right"></span> <span class="icon fa fa-address-book-o"></span>Membros
    </label>
    <ul class="group-list">
        <li><a href="{{ URL::route('membros.lista') }}">
            <span class="icon fa fa-th-list"></span>Lista
        </a></li>
        @can('membro-list')
        <li><a href="{{ URL::route('consulta.index') }}">
            <span class="icon fa fa-search"></span>Consultas
        </a></li>
        @endcan
        @can('membro-grupo-create')
        <li><a href="{{ URL::route('membros.grupo-caseiro') }}">
            <span class="icon fa fa-users"></span>Grupos Caseiros
        </a></li>
        @endcan
        @can('membro-regiao-create')
        <li><a href="{{ URL::route('regiao.index') }}">
            <span class="icon fa fa-map-signs"></span>Regiões
        </a></li>
        @endcan

    </ul>
</li>
