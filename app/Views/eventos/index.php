<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-md my-4">
    <div class="row d-flex justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header">
                    <h4 class="mb-0">Lista de Eventos</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <a href="<?= site_url('eventos/create') ?>" class="btn btn-primary">Novo Evento</a>
                    </div>

                    <div class="row">
                        <?php if (!empty($eventos)): ?>
                            <?php foreach ($eventos as $evento): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <h5 class="mb-0"><?= esc($evento->nome) ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($evento->imagem)): ?>
                                                <img src="<?= base_url($evento->imagem) ?>" alt="Imagem do Evento" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                                            <?php endif; ?>
                                            
                                            <p><strong>Tipo:</strong> <?= esc($evento->tipo) ?></p>
                                            <p><strong>Data:</strong> <?= esc(date('d/m/Y H:i', strtotime($evento->data))) ?></p>
                                            <p><strong>Capacidade:</strong> <?= esc($evento->capacidade_total) ?></p>
                                            <p><strong>Gratuito:</strong> <?= $evento->gratuito == 1 ? 'Sim' : 'Não' ?></p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="<?= site_url('eventos/show/'.$evento->id) ?>" class="btn btn-sm btn-info">Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <p>Nenhum evento encontrado.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
