<div class="container mt-5">
    <?= $topo_pagina ?>
    <div class="row mt-5">
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <h3 class="card-title">Confirmação de remoção</h3><br>
                <p class="card-text">Deseja, realmente, remover a tarefa <b>"<?= $titulo ?>"</b> ?</p><br>

                <form id="delete-task-form" method="POST">
                    <input type="hidden" name="delete" value="true">
                    <div class="text-right">
                        <a href="<?= base_url('tarefa/criar/'.$turma_id) ?>" class="btn btn-light cancel-btn">Cancelar</a>
                        <a class="delete-btn btn btn-primary" onclick="document.getElementById('delete-task-form').submit();">
                            Remover
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>