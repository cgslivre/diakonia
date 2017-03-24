@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Lista de Membros</li>')


@section('content')

<div ng-app="membrosRecord" ng-controller="membrosIndexController">

    <div class="form-group input-group-lg">
        <input type="text" ng-model="criterioDeBusca" class="form-control"
            placeholder="Quem você está buscando..."/>
    </div>

    <div class="buscaAvancada">

        <input id="cb_buscaAvancada" ng-class='{open:show}' class="collapse-input pointer" type=checkbox ng-model="collapse"/>
        <label class="pointer" for="cb_buscaAvancada">Busca Avançada</label>
        <div ng-show="collapse">
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group text-right">
                        <label class="lbl-margin-center" for="gruposFiltro">Grupos Caseiros</label>
                    </div>

                </div>
                <div class="col-md-4">
                    <tags-input track-by-expr="$index" placeholder="Adicione um grupo caseiro"
                        addFromAutocompleteOnly="true" on-tag-adding="validarTag($tag)"
                        replace-spaces-with-dashes="false"
                        ng-model="gruposFiltro" add-on-paste="true" key-property="id" display-property="nome">
                        <auto-complete min-length="2" load-on-focus="true" select-first-match="false"
                            debounceDelay="15" source="loadGruposTags($query)"
                            max-results-to-show="5"></auto-complete>
                    </tags-input>
                </div>

                <div class="col-md-1">
                    <div class="form-group text-right">
                        <label class="lbl-margin-center" for="regioesFiltro">Regiões</label>
                    </div>

                </div>
                <div class="col-md-4">
                    <tags-input track-by-expr="$index" placeholder="Adicione uma região"
                        addFromAutocompleteOnly="true" on-tag-adding="validarTag($tag)"
                        replace-spaces-with-dashes="false"
                        ng-model="regioesFiltro" add-on-paste="true" key-property="id" display-property="nome">
                        <auto-complete min-length="2" load-on-focus="true" select-first-match="false"
                            debounceDelay="15" source="loadRegioesTags($query)"
                            max-results-to-show="5"></auto-complete>
                    </tags-input>
                </div>
            </div>

        </div>

    </div>
    @can('membro-create')
    <div class="fixed-action-btn">
        <a href="{{ url('/membro/create') }}" title="Cadastrar novo membro"
        class="btn-floating btn-largbtn-floating btn-large">
            <i class="fa fa-user-plus fa-2x"></i>
        </a>
    </div>
    @endcan

    <hr/>
    <div>
        <div class="search-result">
            <p ng-show="!membrosFiltered.length">
                <span class="counter">Nenhum</span> membro encontrado.
            </p>
            <p ng-show="membrosFiltered.length == 1">
                <span class="counter">Um</span> membro encontrado.
            </p>
            <p ng-show="membrosFiltered.length >  1">
                <span class="counter"><%membrosFiltered.length%></span> membros encontrados.
            </p>
        </div>
        <table ng-show="membros.length > 0" class="table table-striped table-hover membros">
            <thead>
              <tr>
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-1"><i class="fa fa-user"></i></th>
                <th><a href="" ng-click="ordenarPor('nome')">Nome
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='nome' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='nome' && !direcaoDaOrdenacao"></i>
                </a></th>
                <th>Idade</th>
                <th><a href="" ng-click="ordenarPor('grupo.nome')">Grupo Caseiro
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='grupo.nome' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='grupo.nome' && !direcaoDaOrdenacao"></i>
                </a></th>
                <th><a href="" ng-click="ordenarPor('email')">Email
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='email' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='email' && !direcaoDaOrdenacao"></i>
                </a></th>
                <th>Telefone</th>
                <th><a href="" ng-click="ordenarPor('regiao')">Região
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='regiao' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='regiao' && !direcaoDaOrdenacao"></i>
                </a></th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="membro in membrosFiltered = ( membros | filter:criterioDeBusca | filter:filtroRegioes(regioesFiltro)| filter:filtroGrupos(gruposFiltro)| orderBy:criterioDeOrdenacao:direcaoDaOrdenacao) track by $index">
                    <th class="col-md-1 text-center middle-align" scope="row" title="<%membro.id%>"><%($index+1)%></th>
                    <td class="col-md-1 text-center">
                        <img alt="Foto de Perfil"
                            ng-src="<%avatarPathSmall(membro.avatar_path,membro.sexo)%>"
                            class="profile-img"/>
                    </td>
                    <td class="middle-align"><a
                        @can('user-view')
                            href="<%userShowLink(membro.id)%>"
                        @endcan
                        ng-bind-html="membro.nome | highlight:criterioDeBusca"></a></td>
                    <td class="middle-align" ng-bind-html="membro.idade" title="<%membro.data_nascimento%>"></td>
                    <td class="middle-align" ng-bind-html="membro.grupo.nome | highlight:criterioDeBusca"></td>
                    <td class="middle-align" ng-bind-html="membro.email | highlight:criterioDeBusca"></td>
                    <td class="middle-align" >
                        <p ng-repeat="tel in membro.telefones_json track by $index">
                            <i class="fa fa-phone" aria-hidden="true" title="<%tel.tipo%>" ></i>&nbsp;
                        <span ng-bind-html="tel.numero | highlight:criterioDeBusca | formatPhone "></span>
                        </p>

                    </td>
                    <td class="middle-align" ng-bind-html="membro.regiao | highlight:criterioDeBusca"></td>

                </tr>
            </tbody>
        </table>

    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/membro/app-membro-module.min.js') }}"></script>

    <script type="text/javascript">

        //console.log(tiposRelIgreja);
    </script>

@endsection
</div>
