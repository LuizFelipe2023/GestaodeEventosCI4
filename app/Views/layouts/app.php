<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column vh-100 bg-light">

    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <i class="bi bi-calendar-event" style="font-size: 30px;"></i> 
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="/eventos">Início</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="/sobre">Sobre</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="/contato">Contato</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="/perfil">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">Sair</a>
                </li>
            </ul>
        </div>
    </div>


    <header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <nav class="container-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="<?= site_url('eventos') ?>" class="navbar-brand">
                <i class="bi bi-calendar-event" style="font-size: 30px; color: #fff;"></i>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="/eventos">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/contato">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/perfil">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/logout">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container-lg my-4 flex-grow-1">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer py-3 bg-dark text-white mt-auto">
        <div class="container text-center">
            <p class="mb-0">© 2024 Todos os direitos reservados</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
