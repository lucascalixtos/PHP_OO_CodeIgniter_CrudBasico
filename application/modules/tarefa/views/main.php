<div class="container mt-5">    
    <?= $topo_pagina ?>
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <div class="row d-flex justify-content-end mt-5">
        <button class="btn btn-primary <?= isset($lista) ? '' : 'd-none' ?>" type="button" id="collapsebutton" 
        data-toggle="collapse" data-target="#<?= $form_subject ?>" aria-expanded="false" 
        aria-controls="<?= $form_subject ?>"><?= $rotulo_botao ?></button>
    </div>
    
    <div class="row"><?= $formulario ?></div>
    <div class="row mt-3"><?= isset($lista) ? $lista : '' ?></div>

</div>