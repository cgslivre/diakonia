<!-- Modal -->
<div class="modal fade modal-warning bs-example-modal-sm" id="modalWarning" tabindex="-1"
      role="dialog" aria-labelledby="modal-ativacao" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" ng-class="tipo_modal_classe">
                <button type="button" class="close"
                  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 ng-if="tipo_modal == 'aviso'" class="modal-title" id="modal-ativacao">Aviso</h4>
                <h4 ng-if="tipo_modal == 'erro'" class="modal-title" id="modal-ativacao">Erro</h4>
                <h4 ng-if="tipo_modal == 'sucesso'" class="modal-title" id="modal-ativacao">Sucesso</h4>
            </div>
            <div ng-if="erros_add_relacionamento.length > 0" class="modal-body">
                <strong>Não foi possível completar sua requisição:</strong>
                <ul>
                    <li ng-repeat="erro in erros_add_relacionamento">
                        <%erro%>
                    </li>
                </ul>
            </div>
            <div ng-if="!erros_add_relacionamento" class="modal-body">
                Relacionamento adicionado com sucesso.
            </div>
        </div>
    </div>
</div>

{{-- +++++++++++++++++ Modal Pergunta Exclusão +++++++++++++++++ --}}
<div class="modal fade modal-warning" id="modalWarningExclusaoRelacionamento"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close"
                  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aviso</h4>
            </div>
            <div class="modal-body">
                Deseja realmente remover esse relacionamento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger">Remover relacionamento</button>
            </div>
        </div>
    </div>
</div>
