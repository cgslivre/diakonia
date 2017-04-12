<li>
    <input id="group-eventos" type="checkbox" hidden />
    <label for="group-eventos">
        <span class="seta fa fa-angle-right"></span> <span class="icon fa fa-calendar-check-o"></span>Eventos
    </label>
    <ul class="group-list">
        <li><a href="{{ URL::route('evento.create') }}">
            <span class="icon fa fa-calendar-plus-o"></span>Criar Evento
        </a></li>


    </ul>
</li>
