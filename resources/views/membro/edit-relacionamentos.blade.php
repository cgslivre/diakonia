<div class="row">
    <div class="col-md-12">
        <hr class="divider">
    </div>
    <div class="relacionamentos">

        <h3>Relacionamentos</h3>

        <h4>Família</h4>
        <p ng-show="relacionamentosFamilia.length == 0 ">
            Nenhum relacionamento familiar cadastrado.
        </p>
        <ul>
            <li ng-repeat="relacionamento in relacionamentosFamilia track by $index"
            class="relacionamento"
            ng-class="relacionamento.desc_geral">
                <span class="membro-de"><%membro.nome%></span> é
                <span class="relacionamento-desc" ng-class="relacionamento.desc_geral"
                ng-bind="membro.sexo == 'M' ? relacionamento.desc_masc : relacionamento.desc_fem"></span>
                de
                <span>
                    <a href="<%userShowLink(relacionamento.membro_para.id)%>">
                        <%relacionamento.membro_para.nome%></a>.
                </span>
                <a href="#" ng-click="actRemoveRelacionamento(relacionamento.id)">
                    <i class="fa fa-times" aria-hidden="true" ></i>
                </a>
            </li>
        </ul>
        <div class="add-relacionamento">
            <label for="" class="incluir-relacionamento">Incluir relacionamento: </label>
            <span class="membro"><%membro.nome%></span> é
            <select name="add_tipo_relacionamento" id="add_tipo_relacionamento"
            ng-model="add_tipo_relacionamento"
            ng-options="relFam as relFam.desc_geral for relFam in listaRelacionamentosFamilia track by relFam.id">
            </select>
            de
            <input
            	type="text"
            	ng-model="id_rel_familia_selected"
            	placeholder="escolher membro"
            	uib-typeahead="membroD.id as membroD.nome for membroD in getMembrosRelacionamento($viewValue)"
                typeahead-editable="false"
                typeahead-input-formatter="formatInput($model)"
            	typeahead-loading="carregandoMembrosRelFamilia"
            	typeahead-no-results="semResultadosMembrosRelFamilia"
            	class="">
            <i ng-show="carregandoMembrosRelFamilia" class="fa fa-circle-o-notch fa-spin fa-fw"></i>
            <div ng-show="semResultadosMembrosRelFamilia">
              <i class="fa fa-times" aria-hidden="true"></i> Nenhum membro encontrado
            </div>
            <button
                class="btn btn-info"
                ng-disabled="id_rel_familia_selected == null"
                title="Adicionar relacionamento"
                data-toggle="modal"
                data-target="#modalWarning"
                ng-click="actAddRelacionamento(membro.id,add_tipo_relacionamento.id,id_rel_familia_selected)">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
            </button>
            <span ng-show="loadingRelFamilia" class="text-info"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Atualizando...</span>
        </div>

            <br>
            {{--<%id_rel_familia_selected%>--}}



<hr class="divider">


{{-- +++++++++++++++++++ Igreja +++++++++++++++++++ --}}
<h4>Igreja</h4>
<p ng-show="relacionamentosIgreja.length == 0 ">
    Nenhum relacionamento na igreja cadastrado.
</p>
<ul>
    <li ng-repeat="relac in relacionamentosIgreja track by relac.id"
    class="relacionamento"
    ng-class="relac.desc_geral">
        <span class="membro-de"><%membro.nome%></span> é
        <span class="relacionamento-desc" ng-class="relac.desc_geral"
        ng-bind="membro.sexo == 'M' ? relac.desc_masc : relac.desc_fem"></span>
        de
        <span>
            <a href="<%userShowLink(relac.membro_para.id)%>">
                <%relac.membro_para.nome%></a>.
        </span>
        <a href="#" ng-click="actRemoveRelacionamento(relac.id)">
            <i class="fa fa-times" aria-hidden="true" ></i></a>

    </li>
</ul>
<div class="add-relacionamento">
    <label for="" class="incluir-relacionamento">Incluir relacionamento: </label>
    <span class="membro"><%membro.nome%></span> é
    <select name="add_tipo_relacionamento_igreja" id="add_tipo_relacionamento_igreja"
    ng-model="add_tipo_relacionamento_igreja"
    ng-options="relIgr as relIgr.desc_geral for relIgr in listaRelacionamentosIgreja track by relIgr.id">
    </select>
    de
    <input
        type="text"
        ng-model="id_rel_igreja_selected"
        placeholder="escolher membro"
        uib-typeahead="membroD.id as membroD.nome for membroD in getMembrosRelacionamento($viewValue)"
        typeahead-editable="false"
        typeahead-input-formatter="formatInput($model)"
        typeahead-loading="carregandoMembrosRelIgreja"
        typeahead-no-results="semResultadosMembrosRelIgreja"
        class="">
    <i ng-show="carregandoMembrosRelIgreja" class="fa fa-circle-o-notch fa-spin fa-fw"></i>
    <div ng-show="semResultadosMembrosRelIgreja">
      <i class="fa fa-times" aria-hidden="true"></i> Nenhum membro encontrado
    </div>
    <button
        class="btn btn-info"
        ng-disabled="id_rel_igreja_selected == null"
        title="Adicionar relacionamento"
        data-toggle="modal"
        data-target="#modalWarning"
        ng-click="actAddRelacionamento(membro.id,add_tipo_relacionamento_igreja.id,id_rel_igreja_selected)">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
    </button>
    <span ng-show="loadingRelFamilia" class="text-info"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Atualizando...</span>
</div>

</div>

</div>
@include('membro.modal-relacionamento')