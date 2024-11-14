<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-md my-4">
    <div class="row d-flex justify-content-center flex-wrap mb-4">
        <div class="col-lg-12">
            <div class="card shadow rounded border-light">
                <div class="card-header">
                    <h4 class="mb-0">Inserir Evento</h4>
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
                    <form method="POST" action="<?= route_to('eventos.store') ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= old('nome') ?>" required>
                            <?php if (isset($errors['nome'])): ?>
                                <div class="text-danger"><?= $errors['nome'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo do Evento</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= old('tipo') ?>" required>
                            <?php if (isset($errors['tipo'])): ?>
                                <div class="text-danger"><?= $errors['tipo'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= old('endereco') ?>" required>
                            <?php if (isset($errors['endereco'])): ?>
                                <div class="text-danger"><?= $errors['endereco'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data do Evento</label>
                            <input type="datetime-local" class="form-control" id="data" name="data" value="<?= old('data') ?>" required>
                            <?php if (isset($errors['data'])): ?>
                                <div class="text-danger"><?= $errors['data'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="capacidade_total" class="form-label">Capacidade Total</label>
                            <input type="number" class="form-control" id="capacidade_total" name="capacidade_total" value="<?= old('capacidade_total') ?>" required>
                            <?php if (isset($errors['capacidade_total'])): ?>
                                <div class="text-danger"><?= $errors['capacidade_total'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="gratuito" class="form-label">Gratuito?</label>
                            <select class="form-control" id="gratuito" name="gratuito" required>
                                <option value="1" <?= old('gratuito') == '1' ? 'selected' : '' ?>>Sim</option>
                                <option value="0" <?= old('gratuito') == '0' ? 'selected' : '' ?>>Não</option>
                            </select>
                            <?php if (isset($errors['gratuito'])): ?>
                                <div class="text-danger"><?= $errors['gratuito'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem do Evento</label>
                            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
                            <?php if (isset($errors['imagem'])): ?>
                                <div class="text-danger"><?= $errors['imagem'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Salvar Evento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
