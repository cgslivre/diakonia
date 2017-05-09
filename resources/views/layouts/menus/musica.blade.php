<li>
    <input id="group-musica" type="checkbox" hidden />
    <label for="group-musica">
        <span class="seta fa fa-angle-right"></span>
        <span class="icon fa fa-music"></span>Música
    </label>
    <ul class="group-list">

        <li><a href="{{ URL::route('musica.colaborador.index') }}">
            <span class="icon fa fa-users"></span>Colaboradores
        </a></li>

        <li><a href="{{ URL::route('musica.eventos') }}">
            <span class="icon fa fa-calendar-check-o"></span>Escalas
        </a></li>

    </ul>
</li>
