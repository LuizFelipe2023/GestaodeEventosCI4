<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>
<div class="container-md my-5">
     <div class="row d-flex justify-content-center flex-wrap mb-4">
          <div class="col-lg-12">
               <div class="card rounded-4 shadow border-light">
                    <div class="card-header">
                         <h4 class="text-center mb-0">
                             Formulário de Contato
                         </h4>
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
                    <form method="POST" action="<?= route_to('contatos.insert') ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= old('nome') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= old('cpf') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= old('telefone') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="corpo" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="corpo" name="corpo" rows="5" required><?= old('corpo') ?></textarea>
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

<?= $this->endSection()?>
