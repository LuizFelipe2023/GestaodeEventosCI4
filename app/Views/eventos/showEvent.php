<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-md my-4">
    <div class="row justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header text-center p-4">
                    <h2 class="mb-0 text-dark">Detalhes do Evento</h2>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('errors') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($evento)) : ?>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Nome do Evento:</p>
                                    <p class="fs-5 text-dark"><?= esc($evento->nome) ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Tipo de Evento:</p>
                                    <p class="fs-5 text-dark"><?= esc($evento->tipo) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Endereço:</p>
                                    <p class="fs-5 text-dark"><?= esc($evento->endereco) ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Data do Evento:</p>
                                    <p class="fs-5 text-dark">
                                        <?= esc(date('d/m/Y', strtotime($evento->data))) ?>
                                        <?php
                                        $eventDate = strtotime($evento->data);
                                        if ($eventDate > time()) {
                                            echo "<span class='badge bg-success ms-2'>Futuro</span>";
                                        } else {
                                            echo "<span class='badge bg-secondary ms-2'>Passado</span>";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Capacidade Total:</p>
                                    <p class="fs-5 text-dark"><?= esc($evento->capacidade_total) ?> pessoas</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Gratuito:</p>
                                    <p class="fs-5 text-dark">
                                        <?php if ($evento->gratuito == 1) : ?>
                                            <span class="badge bg-success">Sim</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Não</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="p-3 border rounded">
                                <p class="fs-5 text-muted">Imagem:</p><br>
                                <?php if (!empty($evento->imagem)) : ?>
                                    <img src="<?= base_url($evento->imagem) ?>" alt="Imagem do Evento" class="img-fluid rounded-3 shadow-sm mb-4" style="max-width: 100%; height: auto;">
                                <?php else : ?>
                                    <p class="fs-5 text-muted"><em>Sem imagem disponível.</em></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <a href="<?= site_url('eventos') ?>" class="btn btn-outline-secondary btn-lg px-4 py-2">Voltar</a>
                            <a href="<?= site_url('eventos/edit/' . $evento->id) ?>" class="btn btn-warning btn-lg text-dark mx-3 px-4 py-2">Editar</a>
                            <button class="btn btn-danger btn-lg px-4 py-2" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $evento->id ?>">Excluir</button>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza de que deseja excluir o evento <strong><?= esc($evento->nome) ?></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="<?= site_url('eventos/delete/' . $evento->id) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning">
                            <p>Evento não encontrado.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>