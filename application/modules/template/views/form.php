<div class="container mt-3" id="instalacao">
    <div class="card">
        <div class="card-header"><h4>Cadastro Instalação</h4></div>
        <div class="card-body">
            <form method="POST" class="text-center border border-light p-4" enctype="multipart/form-data">
                <div class="form-row mb-4">
                    <div class="col-md-6">
                        <input type="text" name="nome" value="<?= set_value('nome') ?>" class="form-control" placeholder="Nome">
                    </div>

                </div>
                <div class="form-row mb-4">
                <div class="col-md-6">
                        <input type="text" name="descricao" value="<?= set_value('descricao') ?>" class="form-control" placeholder="Descricao">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <p class="h4 mb-4">Selecione uma imagem:</p>
                    <input type="file" id="imagem" name="imagem" class="form-control mb-4" required>
                </div>
                <div class="text-center text-md-right">
                    <button class="btn btn-info btn-block" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>