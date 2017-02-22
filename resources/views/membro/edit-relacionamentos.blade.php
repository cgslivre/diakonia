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
            <li ng-repeat="relacionamento in relacionamentosFamilia track by relacionamento.id"
            class="relacionamento"
            ng-class="relacionamento.desc_geral">
            <span class="membro-de"><%membro.nome%></span> é
            <span class="relacionamento-desc" ng-class="relacionamento.desc_geral"
            ng-bind="membro.sexo == 'M' ? relacionamento.desc_masc : relacionamento.desc_fem"></span>
            de
            <span>
                <a href="<%userShowLink(relacionamento.membro_para.id)%>">
                    <%relacionamento.membro_para.nome%></a>
                </span>.


            </li>
        </ul>
        <div class="add-relacionamento">
            <label for="" class="incluir-relacionamento">Incluir relacionamento: </label>
            <span class="membro"><%membro.nome%></span> é
            <select name="relacionamento_familia_id" id="relacionamento_familia_id"
            ng-model="add_rel_familia_relacionamento">
            <option ng-repeat="rel_familia in listaRelacionamentosFamilia" value="rel_familia.id">
                <%rel_familia.desc_geral%>
            </option>
        </select><%add_rel_familia_relacionamento%>
        de
        <input
        	type="text"
        	ng-model="id_rel_familia_selected"
        	placeholder="escolher membro"
        	uib-typeahead="membro.id as membro.nome for membro in getMembrosRelacionamento($viewValue)"
            typeahead-editable="false"
            typeahead-input-formatter="formatInput($model)"
        	typeahead-loading="carregandoMembrosRelFamilia"
        	typeahead-no-results="semResultadosMembrosRelFamilia"
        	class="">
                <i ng-show="carregandoMembrosRelFamilia" class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                <div ng-show="semResultadosMembrosRelFamilia">
                  <i class="fa fa-times" aria-hidden="true"></i> Nenhum membro encontrado
                </div>
                <button class="btn btn-info" ng-disabled="id_rel_familia_selected == null"
                    title="Adicionar relacionamento">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </button>
            </div>

            <br>
            {{--<%id_rel_familia_selected%>--}}

<hr class="divider">
<h4>Igreja</h4>
<p ng-show="relacionamentosIgreja.length == 0 ">
    Nenhum relacionamento na igreja cadastrado.
</p>
<ul>
    <li ng-repeat="relacionamento in relacionamentosIgreja track by relacionamento.id"
    class="relacionamento"
    ng-class="relacionamento.desc_geral">
    <span class="membro-de"><%membro.nome%></span> é
    <span class="relacionamento-desc" ng-class="relacionamento.desc_geral"
    ng-bind="membro.sexo == 'M' ? relacionamento.desc_masc : relacionamento.desc_fem"></span>
    de
    <span>
        <a href="<%userShowLink(relacionamento.membro_para.id)%>">
            <%relacionamento.membro_para.nome%></a>
        </span>.


    </li>
</ul>

</div>

</div>
