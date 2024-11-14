<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-md my-4">
    <div class="row d-flex justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Lista de Contatos</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <?php if (!empty($contatos)): ?>
                            <?php foreach ($contatos as $contato): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <h5 class="mb-0"><?= esc($contato->nome) ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>CPF do Contato:</strong> <?= esc($contato->cpf) ?></p>
                                            <p><strong>Email do Contato:</strong> <?= esc($contato->email) ?></p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="<?= site_url('contato/'.$contato->id) ?>" class="btn btn-sm btn-info">Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <p class="fs-5 text-muted">Nenhum contato encontrado.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
