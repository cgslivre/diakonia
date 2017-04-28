<div class="panel panel-default panel-dashboard dashboard-material">
  <div class="panel-heading"><i class="fa fa-book" aria-hidden="true"></i> Material</div>
  <div class="panel-body">
      @if (count($data["material.ultimos-ensinos"]) > 0)
          <p>
              Últimos ensinos cadastrados:
          </p>
          <ul>

        @foreach ($data["material.ultimos-ensinos"] as $ensino)
            <li>
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <a href="{{URL::route('material.ensino.show', $ensino->slug)}}">
                {{$ensino->titulo}}</a>
                <span class="text-border">
                    Categoria: <span>{{$ensino->categoria->nome}}
                    </span>
                </span>

            </li>
        @endforeach
        </ul>
      @else
          <div class="alert alert-info alert-important">
              Nenhum ensino cadastrado.
          </div>
      @endif
  </div>
</div>
