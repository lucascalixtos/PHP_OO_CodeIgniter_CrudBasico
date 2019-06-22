<div class="container mt-3 <?= $show_form ? '' : 'collapse' ?>" id="nova_tarefa">
    <div class="card">
        <div class="card-header"><h4>Descrição da Atividade</h4></div>
        <div class="card-body">
            <form method="POST" class="text-center border border-light p-4" id="task-form">
                <div class="form-row mb-4">
                    <div class="col-md-6">
                        <input type="text" name="titulo" value="<?= set_value('titulo') ?>" class="form-control" placeholder="Tema">
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="prazo" value="<?= set_value('prazo') ?>" class="form-control" placeholder="Data de Entrega (aaaa-mm-dd)" maxlength="8">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-md-12"><textarea name="descricao" class="form-control" id="descricao" rows="4" placeholder="Descrição da Atividade"><?= set_value('descricao') ?></textarea></div>
                </div>

                <div class="text-center text-md-right">
                    <a class="btnupload-form btn btn-primary" onclick="document.getElementById('task-form').submit();">Enviar</a>
                </div>
            </form>
        </div>
    </div>
</div>