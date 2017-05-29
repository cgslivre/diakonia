@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.colaborador.index')}}">
    Equipe de Música</a></li>
@stop
@section('nivel3')<li class="active">{{$colaborador->user->name}}</li>@stop


    @section('content')

        <div class="container-fluid">
                <div class="form-group row table">
                    <div class="col-sm-2 text-right">
                    <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
                    </div>
                  <div class="col-sm-4 name-title-2">
                      {{ $colaborador->user->name }}
                      @if ($colaborador->lider)
                          <span class="lider btn btn-primary">
                              <i class="fa fa-star" aria-hidden="true"></i> Líder
                          </span>
                      @endif
                  </div>
                </div>

                <div class="row table">
                    <div class="col-sm-2 text-right">
                        <strong>Serviços:</strong>
                    </div>
                    <div class="col-sm-4">
                        {{$colaborador->servicos->map( function( $i ){return $i->descricao;})->implode(', ')}}
                    </div>
                </div>

                <div class="row table">
                    <div class="col-sm-2 text-right">
                        <strong>Histórico:</strong>
                    </div>
                    <div class="col-sm-10">
                        <div class="historico"
                        data-url="{{route('musica.colaborador.historico', $colaborador->id)}}">
                            <span class="loading">
                                <i class="fa fa-spin fa-spinner" aria-hidden="true"></i>
                                Carregando
                            </span>
                            <table>
                                <tr>
                                    <th>Data</th>
                                    <th>Participação</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

        </div>




    @endsection

    @section('scripts')

        <script type="text/javascript">
            $(document).ready(function () {
                $('.historico').each( function(){

                    var url = $(this).attr("data-url");
                    var table = $(this).children('table');
                    $.getJSON(url, function( data ){
                        for( var i = 0 ; i < data.length ; i++){
                            var escalado = "";
                            if( data[i].escalado == "escalado"){
                                escalado = '<i class="fa fa-check" aria-hidden="true"></i>';
                            } else if (data[i].escalado == "nao-escalado"){
                                escalado = '<i class="fa fa-circle-thin" aria-hidden="true"></i>';
                            } else if (data[i].escalado == "lider"){
                                escalado = '<i class="fa fa-star" aria-hidden="true"></i>';
                            }

                            table.append("<tr class='" + data[i].escalado + "'><td>"+ data[i].data
                            + "</td><td class='status'>"
                            + escalado +"</td></tr>")
                        }
                    });

                    // console.log(id_escala + "**" + id_colaborador);
                    $(this).children('.loading').hide();
            });
        });
        </script>

    @endsection
