<li>
    <input id="group-material" type="checkbox" hidden />
    <label for="group-material">
        <span class="seta fa fa-angle-right"></span>
        <span class="icon fa fa-book"></span>Material
    </label>
    <ul class="group-list">
        @can('material-curriculo-edit')
        <li><a href="{{ URL::route('evento.create') }}">
            <span class="icon fa fa-plus-square-o"></span>Adicionar Ensino
        </a></li>
        @endcan

        <li><a href="{{ URL::route('evento.index') }}">
            <span class="icon fa fa-stack-overflow"></span>Currículo de Ensino
        </a></li>


    </ul>
</li>
