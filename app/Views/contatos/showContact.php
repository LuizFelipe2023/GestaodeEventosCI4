<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>
<div class="container-md my-4">
    <div class="row justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header text-center p-4">
                    <h2 class="mb-0 text-dark">Detalhes do Contato</h2>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('errors') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($contato)) : ?>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Nome do Contato:</p>
                                    <p class="fs-5 text-dark"><?= esc($contato->nome) ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">CPF do Contato:</p>
                                    <p class="fs-5 text-dark"><?= esc($contato->cpf) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Telefone:</p>
                                    <p class="fs-5 text-dark"><?= esc($contato->telefone) ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Email do Contato:</p>
                                    <p class="fs-5 text-dark"><?= esc($contato->email) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="p-3 border rounded">
                                    <p class="fs-5 text-muted">Corpo da Mensagem:</p>
                                    <p class="fs-5 text-dark"><?= esc($contato->corpo) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <a href="<?= site_url('contatos') ?>" class="btn btn-outline-secondary btn-lg px-4 py-2">Voltar</a>
                            <button class="btn btn-danger btn-lg px-4 py-2" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $contato->id ?>">Excluir</button>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza de que deseja excluir o contato de <strong><?= esc($contato->nome) ?></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="<?= site_url('contatos/delete/' . $contato->id) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning">
                            <p>Contato não encontrado.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection()?>
