<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-md my-4">
    <div class="row justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header text-center">
                    <h4 class="mb-0">Editar Evento</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('eventos/update/' . $evento->id) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($evento->nome) ?>" required placeholder="Digite o nome do evento">
                            <?php if (isset($errors['nome'])): ?>
                                <div class="text-danger"><?= $errors['nome'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo do Evento</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= esc($evento->tipo) ?>" required placeholder="Tipo do evento (ex: Workshop)">
                            <?php if (isset($errors['tipo'])): ?>
                                <div class="text-danger"><?= $errors['tipo'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= esc($evento->endereco) ?>" required placeholder="Endereço do evento">
                            <?php if (isset($errors['endereco'])): ?>
                                <div class="text-danger"><?= $errors['endereco'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data do Evento</label>
                            <input type="datetime-local" class="form-control" id="data" name="data" value="<?= esc(date('Y-m-d\TH:i', strtotime($evento->data))) ?>" required>
                            <?php if (isset($errors['data'])): ?>
                                <div class="text-danger"><?= $errors['data'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="capacidade_total" class="form-label">Capacidade Total</label>
                            <input type="number" class="form-control" id="capacidade_total" name="capacidade_total" value="<?= esc($evento->capacidade_total) ?>" required placeholder="Capacidade máxima do evento">
                            <?php if (isset($errors['capacidade_total'])): ?>
                                <div class="text-danger"><?= $errors['capacidade_total'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="gratuito" class="form-label">Gratuito?</label>
                            <select class="form-control" id="gratuito" name="gratuito" required>
                                <option value="1" <?= $evento->gratuito == 1 ? 'selected' : '' ?>>Sim</option>
                                <option value="0" <?= $evento->gratuito == 0 ? 'selected' : '' ?>>Não</option>
                            </select>
                            <?php if (isset($errors['gratuito'])): ?>
                                <div class="text-danger"><?= $errors['gratuito'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem (Opcional)</label>
                            <input type="file" class="form-control" id="imagem" name="imagem">
                            <?php if ($evento->imagem): ?>
                                <div class="mt-3">
                                    <p class="small text-muted">Imagem atual: </p>
                                    <img src="<?= base_url($evento->imagem) ?>" alt="Imagem do Evento" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                                </div>
                            <?php endif; ?>
                            <?php if (isset($errors['imagem'])): ?>
                                <div class="text-danger"><?= $errors['imagem'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Atualizar Evento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
