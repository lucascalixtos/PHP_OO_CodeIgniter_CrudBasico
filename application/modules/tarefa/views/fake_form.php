<div class="container mt-3 <?= $show_form ? '' : 'collapse' ?>" id="nova_turma">
    <div class="card">
        <div class="card-header"><h4>Dados da Turma</h4></div>
        <div class="card-body">
            <form method="POST" class="text-center border border-light p-4">
                <div class="form-row mb-4">
                    <div class="col-md-6">
                        <input type="text" name="nome" value="<?= set_value('nome') ?>" class="form-control" placeholder="Nome">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nivel" value="<?= set_value('nivel') ?>" class="form-control" placeholder="Nível">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-md-6">
                        <input type="text" name="identificador" value="<?= set_value('identificador') ?>" class="form-control mb-4" placeholder="Identificador">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="periodo" value="<?= set_value('periodo') ?>" class="form-control" placeholder="Período" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    </div>
                </div>
                <div class="text-center text-md-right">
                    <a class="btnupload-form btn btn-primary">Enviar</a>
                </div>
            </form>
        </div>
    </div>
</div>