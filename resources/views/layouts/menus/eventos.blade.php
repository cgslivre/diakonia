<li>
    <input id="group-eventos" type="checkbox" hidden />
    <label for="group-eventos">
        <span class="seta fa fa-angle-right"></span> <span class="icon fa fa-calendar-check-o"></span>Eventos
    </label>
    <ul class="group-list">
        <li><a href="{{ URL::route('evento.create') }}">
            <span class="icon fa fa-calendar-plus-o"></span>Criar Evento
        </a></li>

        <li><a href="{{ URL::route('evento.index') }}">
            <span class="icon fa fa-th-list"></span>Listar Eventos
        </a></li>


    </ul>
</li>
